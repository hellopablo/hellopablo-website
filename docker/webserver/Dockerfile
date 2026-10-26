FROM nails/docker-env-webserver:apache-php84-nails

# The base image installs a NodeSource major. Replace it with the exact
# version from the repository root .nvmrc. docker/scripts/build.sh passes
# that file as NODE_VERSION; the default below must stay identical to it.
ARG NODE_VERSION=24.22.1

RUN set -eu \
 && arch="$(dpkg --print-architecture)" \
 && case "$arch" in \
      amd64) node_arch="x64" ;; \
      arm64) node_arch="arm64" ;; \
      *) echo "unsupported architecture: ${arch}" >&2; exit 1 ;; \
    esac \
 && tarball="node-v${NODE_VERSION}-linux-${node_arch}.tar.gz" \
 && curl -fsSL -o "/tmp/${tarball}" "https://nodejs.org/dist/v${NODE_VERSION}/${tarball}" \
 && curl -fsSL -o /tmp/SHASUMS256.txt "https://nodejs.org/dist/v${NODE_VERSION}/SHASUMS256.txt" \
 && grep " ${tarball}\$" /tmp/SHASUMS256.txt > /tmp/node.sha256 \
 && test -s /tmp/node.sha256 \
 && (cd /tmp && sha256sum -c node.sha256) \
 && tar -xzf "/tmp/${tarball}" -C /usr/local --strip-components=1 \
 && rm -f "/tmp/${tarball}" /tmp/SHASUMS256.txt /tmp/node.sha256 \
 && node -v | grep -qx "v${NODE_VERSION}" \
 && npm install -g yarn@1.22.22
