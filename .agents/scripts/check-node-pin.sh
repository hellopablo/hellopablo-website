#!/usr/bin/env bash
# Fail when any Node pin in this repo disagrees with the root .nvmrc.
set -euo pipefail

root="$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)"
cd "$root"

if [[ ! -f .nvmrc ]]; then
  echo "ERROR: .nvmrc is missing" >&2
  exit 1
fi

expected="$(tr -d '[:space:]' < .nvmrc)"
expected="${expected#v}"

if [[ ! "$expected" =~ ^[0-9]+\.[0-9]+\.[0-9]+$ ]]; then
  echo "ERROR: .nvmrc must be an exact x.y.z version, found '${expected}'" >&2
  exit 1
fi

errors=0
fail() {
  echo "ERROR: $*" >&2
  errors=$((errors + 1))
}

if command -v node >/dev/null 2>&1; then
  actual="$(node -v | sed 's/^v//')"
  if [[ "$actual" != "$expected" ]]; then
    fail "running Node is ${actual}, .nvmrc is ${expected}"
  fi
else
  fail "node is not on PATH"
fi

shopt -s nullglob

for file in docker/*/Dockerfile docker/**/Dockerfile; do
  [[ -f "$file" ]] || continue
  if [[ "$file" == "docker/webserver/Dockerfile" ]]; then
    if ! grep -qE "^ARG NODE_VERSION=${expected}$" "$file"; then
      fail "${file} must default ARG NODE_VERSION to ${expected}"
    fi
    if ! grep -qF 'v${NODE_VERSION}' "$file"; then
      fail "${file} must check the installed Node version against the full NODE_VERSION"
    fi
  fi
  while IFS= read -r ver; do
    if [[ "$ver" != "$expected" ]]; then
      fail "${file} pins Node ${ver}, .nvmrc is ${expected}"
    fi
  done < <(grep -E '^[[:space:]]*ARG[[:space:]]+NODE_VERSION=' "$file" | sed -E 's/^[[:space:]]*ARG[[:space:]]+NODE_VERSION=//; s/["'\'']//g' || true)
done

for file in docker-compose.yml docker-compose.*.yml docker-compose.yaml docker-compose.*.yaml; do
  [[ -f "$file" ]] || continue
  while IFS= read -r ver; do
    if [[ "$ver" != "$expected" ]]; then
      fail "${file} defaults NODE_VERSION to ${ver}, .nvmrc is ${expected}"
    fi
  done < <(grep -oE 'NODE_VERSION:-[0-9]+\.[0-9]+\.[0-9]+' "$file" | sed 's/NODE_VERSION:-//' || true)
done

if [[ -d .github/workflows ]]; then
  for file in .github/workflows/*.yml .github/workflows/*.yaml; do
    [[ -f "$file" ]] || continue
    if grep -q 'actions/setup-node' "$file" && ! grep -qE 'node-version-file:[[:space:]]*\.nvmrc' "$file"; then
      fail "${file} must set node-version-file: .nvmrc"
    fi
    while IFS= read -r ver; do
      if [[ "$ver" != "$expected" ]]; then
        fail "${file} hardcodes node-version ${ver}, .nvmrc is ${expected}"
      fi
    done < <(grep -E '^[[:space:]]*node-version:' "$file" | sed -E 's/^[[:space:]]*node-version:[[:space:]]*//; s/["'\'']//g' || true)
  done
fi

while IFS= read -r file; do
  while IFS= read -r line; do
    kind="${line%%|*}"
    ver="${line#*|}"
    ver="${ver#v}"
    if [[ "$ver" != "$expected" ]]; then
      fail "${file} ${kind} is ${ver}, .nvmrc is ${expected}"
    fi
  done < <(python3 -c '
import json, sys
path = sys.argv[1]
with open(path, encoding="utf-8") as handle:
    data = json.load(handle)
engines = data.get("engines") or {}
if "node" in engines:
    print("engines.node|" + str(engines["node"]))
volta = data.get("volta") or {}
if "node" in volta:
    print("volta.node|" + str(volta["node"]))
' "$file")
done < <(find . -name package.json -not -path '*/node_modules/*' -not -path '*/vendor/*')

if [[ -f .node-version ]]; then
  ver="$(tr -d '[:space:]' < .node-version)"
  ver="${ver#v}"
  if [[ "$ver" != "$expected" ]]; then
    fail ".node-version is ${ver}, .nvmrc is ${expected}"
  fi
fi

if [[ -f .tool-versions ]]; then
  while IFS= read -r ver; do
    ver="${ver#v}"
    if [[ "$ver" != "$expected" ]]; then
      fail ".tool-versions node is ${ver}, .nvmrc is ${expected}"
    fi
  done < <(awk '$1 == "nodejs" || $1 == "node" { print $2 }' .tool-versions)
fi

if [[ "$errors" -ne 0 ]]; then
  exit 1
fi

echo "Node pin OK: ${expected}"
