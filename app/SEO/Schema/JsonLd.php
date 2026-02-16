<?php

namespace App\SEO\Schema;

final class JsonLd
{
    private function __construct()
    {
    }

    public static function encode(array $schema): string
    {
        $json = json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return $json === false ? '{}' : $json;
    }
}

