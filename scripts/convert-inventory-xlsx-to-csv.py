#!/usr/bin/env python3
import sys
from pathlib import Path
import pandas as pd


def main():
    if len(sys.argv) < 2:
        print("Usage: convert-inventory-xlsx-to-csv.py <xlsx_path> [csv_path]")
        sys.exit(1)

    xlsx_path = Path(sys.argv[1])
    csv_path = Path(sys.argv[2]) if len(sys.argv) > 2 else Path('database/seeders/data/gemstone_inventory.csv')
    if not xlsx_path.exists():
        print(f"Missing {xlsx_path}")
        sys.exit(1)

    df = pd.read_excel(xlsx_path)
    # Keep only rows with a SKU (inventory is SKU-driven)
    mask = df['SKU No'].notna()
    df = df[mask].copy()

    for col in df.columns:
        df[col] = df[col].astype(str).replace({'nan': ''}).str.strip()

    cols = ['SKU No','Name','Rate/crt','Total Weight','Total Quantity','Weight (crt)/pc','S.No/Quantity','Notes']
    # Ensure missing columns exist
    for col in cols:
        if col not in df.columns:
            df[col] = ''
    csv_path.parent.mkdir(parents=True, exist_ok=True)
    df.to_csv(csv_path, index=False, columns=cols)
    print(f"Wrote {csv_path} rows {len(df)}")


if __name__ == '__main__':
    main()
