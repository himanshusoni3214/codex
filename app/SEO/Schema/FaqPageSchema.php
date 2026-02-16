<?php

namespace App\SEO\Schema;

final class FaqPageSchema
{
    /**
     * @param  array<int, array{question?: string, answer?: string}>  $qaPairs
     */
    public function build(array $qaPairs): ?array
    {
        $mainEntity = collect($qaPairs)
            ->filter(fn ($item) => ! empty($item['question']) && ! empty($item['answer']))
            ->map(function ($item) {
                return [
                    '@type' => 'Question',
                    'name' => trim(strip_tags((string) $item['question'])),
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => trim(strip_tags((string) $item['answer'])),
                    ],
                ];
            })
            ->values()
            ->all();

        if ($mainEntity === []) {
            return null;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $mainEntity,
        ];
    }
}

