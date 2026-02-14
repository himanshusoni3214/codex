<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnforceCanonicalUrl
{
    public function handle(Request $request, Closure $next): Response
    {
        if (
            ! config('seo.redirect.enabled')
            || ! $request->isMethodSafe()
            || $request->expectsJson()
        ) {
            return $next($request);
        }

        $targetScheme = $request->getScheme();
        $targetHost = $request->getHost();
        $targetPath = $request->getPathInfo();
        $queryString = $request->getQueryString();
        $changed = false;
        $rawPath = parse_url((string) ($request->server('REQUEST_URI') ?? $request->getRequestUri()), PHP_URL_PATH) ?: $targetPath;

        if (
            config('seo.redirect.strip_trailing_slash')
            && $rawPath !== '/'
            && str_ends_with($rawPath, '/')
        ) {
            $targetPath = rtrim($rawPath, '/');
            $changed = true;
        }

        if ($this->shouldForceHttps($request)) {
            $targetScheme = 'https';
            $changed = true;
        }

        $canonicalHost = trim((string) config('seo.redirect.canonical_host'));
        if ($canonicalHost !== '' && strcasecmp($targetHost, $canonicalHost) !== 0) {
            $targetHost = $canonicalHost;
            $changed = true;
        }

        if (! $changed) {
            return $next($request);
        }

        $url = $targetScheme . '://' . $targetHost . $targetPath;
        if ($queryString) {
            $url .= '?' . $queryString;
        }

        return redirect()->to($url, 301);
    }

    private function shouldForceHttps(Request $request): bool
    {
        if (! config('seo.redirect.force_https')) {
            return false;
        }

        if ($request->isSecure()) {
            return false;
        }

        if (app()->environment('local', 'testing')) {
            return false;
        }

        return true;
    }
}
