<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Category;
use App\Models\Certification;
use App\Models\Product;
use App\Models\Tag;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\Csv\Reader;
use League\Csv\Writer;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('exportCsv')
                ->label('Export CSV')
                ->action(function () {
                    $writer = Writer::createFromString('');
                    $writer->insertOne([
                        'title',
                        'slug',
                        'product_type',
                        'status',
                        'price_cad',
                        'gem_type',
                        'carat',
                        'origin',
                        'color',
                        'clarity',
                        'cut',
                        'shape',
                        'treatment',
                        'certificate_lab',
                        'certificate_number',
                        'certificate_url',
                        'short_description',
                        'description',
                        'image',
                        'is_featured',
                        'category',
                        'tags',
                        'certifications',
                    ]);

                    Product::query()->orderBy('id')->chunk(200, function ($products) use ($writer) {
                        foreach ($products as $product) {
                            $writer->insertOne([
                                $product->title,
                                $product->slug,
                                $product->product_type,
                                $product->status,
                                $product->price_cad,
                                $product->gem_type,
                                $product->carat,
                                $product->origin,
                                $product->color,
                                $product->clarity,
                                $product->cut,
                                $product->shape,
                                $product->treatment,
                                $product->certificate_lab,
                                $product->certificate_number,
                                $product->certificate_url,
                                $product->short_description,
                                $product->description,
                                $product->image,
                                $product->is_featured ? '1' : '0',
                                $product->category?->name,
                                $product->tags->pluck('name')->implode('|'),
                                $product->certifications->pluck('name')->implode('|'),
                            ]);
                        }
                    });

                    $csv = $writer->toString();

                    return response()->streamDownload(function () use ($csv) {
                        echo $csv;
                    }, 'products.csv');
                }),
            Actions\Action::make('importCsv')
                ->label('Import CSV')
                ->form([
                    FileUpload::make('file')
                        ->acceptedFileTypes(['text/csv', 'text/plain'])
                        ->required()
                        ->disk('local')
                        ->directory('imports'),
                ])
                ->action(function (array $data) {
                    $path = Storage::disk('local')->path($data['file']);
                    $csv = Reader::createFromPath($path)->setHeaderOffset(0);

                    foreach ($csv->getRecords() as $record) {
                        $categoryId = null;
                        if (! empty($record['category'])) {
                            $category = Category::firstOrCreate(
                                ['slug' => Str::slug($record['category'])],
                                ['name' => $record['category']]
                            );
                            $categoryId = $category->id;
                        }

                        $product = Product::updateOrCreate(
                            ['slug' => $record['slug'] ?: Str::slug($record['title'])],
                            [
                                'title' => $record['title'] ?? '',
                                'product_type' => $record['product_type'] ?: 'gemstone',
                                'status' => $record['status'] ?: 'active',
                                'price_cad' => $record['price_cad'] ?: null,
                                'gem_type' => $record['gem_type'] ?: null,
                                'carat' => $record['carat'] ?: null,
                                'origin' => $record['origin'] ?: null,
                                'color' => $record['color'] ?: null,
                                'clarity' => $record['clarity'] ?: null,
                                'cut' => $record['cut'] ?: null,
                                'shape' => $record['shape'] ?: null,
                                'treatment' => $record['treatment'] ?: null,
                                'certificate_lab' => $record['certificate_lab'] ?: null,
                                'certificate_number' => $record['certificate_number'] ?: null,
                                'certificate_url' => $record['certificate_url'] ?: null,
                                'short_description' => $record['short_description'] ?: null,
                                'description' => $record['description'] ?: null,
                                'image' => $record['image'] ?: null,
                                'is_featured' => ($record['is_featured'] ?? '0') === '1',
                                'category_id' => $categoryId,
                            ]
                        );

                        if (! empty($record['tags'])) {
                            $tags = collect(explode('|', $record['tags']))
                                ->map(fn ($name) => trim($name))
                                ->filter();
                            $tagIds = $tags->map(function ($name) {
                                return Tag::firstOrCreate(
                                    ['slug' => Str::slug($name)],
                                    ['name' => $name]
                                )->id;
                            });
                            $product->tags()->sync($tagIds->all());
                        }

                        if (! empty($record['certifications'])) {
                            $certs = collect(explode('|', $record['certifications']))
                                ->map(fn ($name) => trim($name))
                                ->filter();
                            $certIds = $certs->map(function ($name) {
                                return Certification::firstOrCreate(
                                    ['slug' => Str::slug($name)],
                                    ['name' => $name]
                                )->id;
                            });
                            $product->certifications()->sync($certIds->all());
                        }
                    }
                }),
            Actions\CreateAction::make(),
        ];
    }
}
