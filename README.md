# Natural Gem Store (Laravel 10)

Canada-first gemstone brand experience focused on certification, transparency, and education.

## Requirements
- PHP 8.1+
- Composer
- Node.js + npm
- SQLite (default) or MySQL

## Setup
1. Copy env file:

```bash
cp .env.example .env
```

2. Install dependencies:

```bash
composer install
npm install
```

3. Generate app key:

```bash
php artisan key:generate
```

4. Run migrations + seeders:

```bash
php artisan migrate --seed
```

5. Build assets:

```bash
npm run dev
```

6. Start the local server:

```bash
php artisan serve
```

## Admin Login (Seeded)
- Email: `admin@naturalgem.com`
- Password: `password`

## Core Pages
- Home: `/`
- Gemstones: `/gemstones`
- Gemstone detail: `/gemstones/{slug}`
- Education hub: `/education`
- Consultation: `/consultation`
- Purchase request: `/purchase-request`
- Legal: `/terms`, `/privacy`, `/refunds`, `/disclaimer`

## Notes
- All pricing is CAD. GST/HST notes are included on gemstone pages.
- Traditional consultation is optional and separate from purchases.
- No guarantees or outcomes are implied.

## Tests
```bash
php artisan test
```
# codex
