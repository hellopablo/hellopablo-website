#!/bin/bash -e

# --------------------------------------------------------------------------
# Use PHPUnit to run tests
# --------------------------------------------------------------------------
TEST_DB_MODE="${1}" ./vendor/bin/phpunit
