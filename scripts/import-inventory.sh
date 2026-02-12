#!/usr/bin/env bash
set -euo pipefail

XLSX_PATH="${1:-/Users/Himanshu/Downloads/Gemstone Inventory.xlsx}"
CSV_PATH="${2:-database/seeders/data/gemstone_inventory.csv}"

python3 "scripts/convert-inventory-xlsx-to-csv.py" "${XLSX_PATH}" "${CSV_PATH}"
php artisan db:seed --class=InventorySeeder
php artisan optimize:clear

echo "Inventory import complete."
