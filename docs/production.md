# Natural Gem – Production Deployment (Canada)

## Phase 1 — PHP 8.3 + OPcache

```bash
sudo apt update
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.3 php8.3-fpm php8.3-cli php8.3-curl php8.3-mbstring php8.3-xml php8.3-zip php8.3-gd php8.3-redis
```

Copy the tuned OPcache config:
```bash
sudo cp deploy/php83-opcache.ini /etc/php/8.3/fpm/conf.d/99-opcache.ini
sudo systemctl restart php8.3-fpm
```

## Phase 2 — Redis (Cache + Session + Queue)

```bash
sudo apt install -y redis-server
sudo systemctl enable redis-server
sudo systemctl start redis-server
```

Update `.env`:
```
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis
REDIS_CLIENT=phpredis
```

## Phase 3 — Horizon (Queue Monitoring)

```bash
php artisan horizon:install
php artisan migrate
```

Supervisor (example):
```bash
sudo cp deploy/supervisor-horizon.conf /etc/supervisor/conf.d/laravel-horizon.conf
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start laravel-horizon
```

## Phase 4 — Nginx (Performance)

Example config:
```
/deploy/nginx-naturalgem.conf
```

Enable Brotli module if available, and enable HTTP/2. Then reload:
```bash
sudo nginx -t
sudo systemctl reload nginx
```

## Phase 5 — Cloudflare Settings

1. Add DNS A record pointing to server IP
2. Enable CDN
3. Enable Brotli
4. Enable Auto Minify (CSS/JS/HTML)
5. Enable HTTP/3 (QUIC)
6. Enable Polish (WebP)
7. Enable Tiered Caching
8. Enable Early Hints
9. Page rule: Cache Everything **except** `/admin`, `/login`, `/horizon`

## Phase 6 — Image Optimization

Use `spatie/laravel-image-optimizer` and conversions to WebP. Install binaries:
```bash
sudo apt install -y jpegoptim optipng pngquant gifsicle webp
```

## Phase 7 — Deployment Script

```bash
./scripts/deploy-production.sh
```

## Phase 8 — Monitoring

- Health check endpoint: `/health`
- UptimeRobot: monitor `/health`
- Sentry: set `SENTRY_LARAVEL_DSN` in production
- Telescope: leave disabled in production (`TELESCOPE_ENABLED=false`)

