<?php

namespace App\Http\Controllers;

use App\Repositories\GemstoneRepository;
use App\Repositories\PageRepository;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    public function index(PageRepository $pages): Response
    {
        $posts = $pages->paginatePublishedBySection('blog', 9);

        return response()->view('pages.blog.index', [
            'page' => (object) [
                'title' => 'Natural Gem Store Blog',
                'hero_title' => 'Gemstone Education Blog',
                'hero_subtitle' => 'Canada-first gemstone insights covering certification, pricing, treatments, and buying strategies.',
                'meta_title' => 'Gemstone Blog Canada | Natural Gem Store',
                'meta_description' => 'Read gemstone education articles for Canadian buyers, including certification and disclosure guides.',
            ],
            'posts' => $posts,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Blog', 'url' => route('blog.index')],
            ],
        ])->header('Cache-Control', app()->environment('production')
            ? 'public, max-age=900, stale-while-revalidate=120'
            : 'no-cache, private');
    }

    public function show(string $slug, PageRepository $pages, GemstoneRepository $gemstones): Response
    {
        $post = $pages->getPublishedBySectionAndSlug('blog', $slug);
        abort_if(! $post, 404);

        $relatedPosts = $pages->publishedBySection('blog')
            ->where('slug', '!=', $slug)
            ->take(4)
            ->values();

        return response()->view('pages.blog.show', [
            'page' => $post,
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'relatedTypes' => $gemstones->availableTypes()->take(6),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Blog', 'url' => route('blog.index')],
                ['label' => $post->title, 'url' => route('blog.show', ['slug' => $post->slug])],
            ],
            'canonical' => route('blog.show', ['slug' => $post->slug]),
            'isIndexable' => (bool) ($post->is_indexable ?? true),
        ])->header('Cache-Control', app()->environment('production')
            ? 'public, max-age=900, stale-while-revalidate=120'
            : 'no-cache, private');
    }
}
