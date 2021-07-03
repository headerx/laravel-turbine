#!/bin/bash

rm -rf ./laravel-turbine/vendor
rm -rf ./laravel-turbine/node_modules

cp -rn ./laravel-turbine/* .
cp -rn ./laravel-turbine/app/* ./src/App
rm -rf ./app
rm ./composer.lock
rm ./package-lock.json
rm ./yarn.lock


composer update