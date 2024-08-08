#!/bin/bash
set -e
composer install
exec docker-php-entrypoint "$@"

