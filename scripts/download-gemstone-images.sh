#!/usr/bin/env bash
set -euo pipefail

mkdir -p "public/images/gemstones/curated"

# Clean out tiny/failed downloads if they exist.
find "public/images/gemstones/curated" -type f -size -10k -print -delete || true

# Curated, royalty-free gemstone images (Wikimedia Commons).
# Licenses include CC0, Public Domain, and CC-BY/CC-BY-SA (attribution required).
# Format: filename|url
downloads=$(cat <<'EOF'
amethyst-facet-cut.jpg|https://upload.wikimedia.org/wikipedia/commons/c/cc/Facet_Cut_Amethyst.jpg
emerald-cut.jpg|https://upload.wikimedia.org/wikipedia/commons/3/3e/Cut_Emerald.jpg
sapphire-gem.jpg|https://upload.wikimedia.org/wikipedia/commons/f/f9/Sapphire_Gem.jpg
tanzanite-marquise.jpg|https://upload.wikimedia.org/wikipedia/commons/f/f9/Tanzanite_marquise_%28navette%29_cut.jpg
ruby-cut.jpg|https://upload.wikimedia.org/wikipedia/commons/c/c4/Cut_Ruby.jpg
diamond-emerald-cut.jpg|https://upload.wikimedia.org/wikipedia/commons/c/c2/Emerald_Cut_Diamond.jpg
ametrine-cut.jpg|https://upload.wikimedia.org/wikipedia/commons/4/4c/Ametrine_cut.jpg
EOF
)

echo "${downloads}" | while IFS='|' read -r filename url; do
  [ -z "${filename}" ] && continue
  echo "Downloading ${filename}"
  curl -L --fail --retry 3 --retry-delay 1 "${url}" -o "public/images/gemstones/curated/${filename}"
  if [ ! -s "public/images/gemstones/curated/${filename}" ]; then
    echo "Download failed for ${filename}"
    exit 1
  fi
done

python3 "scripts/remove-gemstone-backgrounds.py"

printf '\nDone. Images saved to public/images/gemstones/curated/\n'
