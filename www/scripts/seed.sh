#!/bin/bash -e

# --------------------------------------------------------------------------
# Seed the database
# --------------------------------------------------------------------------
rm -rf ./assets/uploads/* && \
nails db:seed -n --fresh