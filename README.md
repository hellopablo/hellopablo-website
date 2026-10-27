# An easy to use LAMP environment using Docker

![license](https://img.shields.io/badge/license-MIT-green.svg)
[![CircleCI branch](https://img.shields.io/circleci/project/github/nails/skeleton-docker-lamp.svg)](https://circleci.com/gh/nails/skeleton-docker-lamp)

A _slightly_ opinionated, but **really easy to use** Docker LAMP stack with out-of-the-box support for some common frameworks.


https://docker.nailsapp.co.uk

## Node.js

Asset compilation uses the exact Node.js version in the repository root `.nvmrc`. `nvm use` from the repo root selects it. GitHub Actions reads the same file via `actions/setup-node`.

`docker/webserver/Dockerfile` cannot read `.nvmrc` (`nails/docker-env-webserver` installs Node from a NodeSource major). The image installs the exact version instead: an official nodejs.org tarball checked against `SHASUMS256.txt`, then `node -v` must match that full version. `NODE_VERSION` defaults to the `.nvmrc` value, and `docker/scripts/build.sh` passes the version it reads from `.nvmrc` when it builds containers. `.agents/scripts/check-node-pin.sh` fails if those copies drift. Yarn in that image is classic `1.22.22`, matching `www/yarn.lock`.