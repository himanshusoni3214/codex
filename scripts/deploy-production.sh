#!/usr/bin/env bash
set -euo pipefail

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
php artisan optimize
php artisan horizon:terminate || true

# Optional: run migrations if needed
# php artisan migrate --force

