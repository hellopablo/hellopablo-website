#!/bin/bash -e
echo 'Composer Install'
composer --no-interaction --optimize-autoloader --no-dev install
echo 'Composer Permissions'
chmod -R 0755 vendor
echo 'Bower Install'
bower install --config.interactive=false
echo 'Nails Migrate'
chmod +x nails.php
./nails.php migrate --no-interaction
echo 'NPM Install'
npm install
echo 'Compile Assets'
gulp build
