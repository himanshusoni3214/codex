#!/usr/bin/env python3
from pathlib import Path
from PIL import Image

SRC_DIR = Path("public/images/gemstones/curated")

# Adjustable thresholds for background removal
LOW = 10   # distance where pixels become transparent
HIGH = 35  # distance where pixels become fully opaque
MAX_DIMENSION = 900  # downscale large images for faster processing

# Padding as fraction of max dimension after crop
PADDING_FRACTION = 0.12


def avg_color(colors):
    r = sum(c[0] for c in colors) / len(colors)
    g = sum(c[1] for c in colors) / len(colors)
    b = sum(c[2] for c in colors) / len(colors)
    return (r, g, b)


def process_image(path: Path) -> Path:
    img = Image.open(path).convert("RGBA")
    w, h = img.size
    max_dim = max(w, h)
    if max_dim > MAX_DIMENSION:
        scale = MAX_DIMENSION / max_dim
        img = img.resize((int(w * scale), int(h * scale)), Image.LANCZOS)
    w, h = img.size

    # Sample background from corners
    pixels = img.load()
    corners = [pixels[0, 0], pixels[w - 1, 0], pixels[0, h - 1], pixels[w - 1, h - 1]]
    br, bgc, bb = avg_color(corners)

    low2 = LOW * LOW
    high2 = HIGH * HIGH

    new_data = []
    for (r, g, b, a) in img.getdata():
        d2 = (r - br) ** 2 + (g - bgc) ** 2 + (b - bb) ** 2
        if d2 <= low2:
            alpha = 0
        elif d2 >= high2:
            alpha = 255
        else:
            alpha = int(255 * (d2 - low2) / (high2 - low2))
        new_data.append((r, g, b, alpha))

    img.putdata(new_data)

    # Crop to non-transparent bounding box
    bbox = img.getbbox()
    if bbox:
        left, upper, right, lower = bbox
        width = right - left
        height = lower - upper
        pad = int(max(width, height) * PADDING_FRACTION)
        left = max(0, left - pad)
        upper = max(0, upper - pad)
        right = min(w, right + pad)
        lower = min(h, lower + pad)
        img = img.crop((left, upper, right, lower))

    out_path = path.with_suffix(".png")
    img.save(out_path, "PNG")
    return out_path


def main():
    if not SRC_DIR.exists():
        print(f"Missing {SRC_DIR}")
        return

    images = [p for p in SRC_DIR.iterdir() if p.suffix.lower() in {".jpg", ".jpeg"}]
    if not images:
        print("No JPGs found to process.")
        return

    for path in images:
        print(f"Processing {path.name}")
        process_image(path)

    print("Done. Transparent PNGs created.")


if __name__ == "__main__":
    main()
