<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Cache\CacheManager;

class ProductRepositoryCache implements ProductInterface
{
    protected $model;

    protected $cache;

    public function __construct(Product $model, CacheManager $cache)
    {
        $this->cache = $cache;

        $this->model = $model;
    }

    public function model()
    {

        return $this->model;
    }

    public function query()
    {
        return $this->model->query();
    }

    public function all()
    {
        return $this->cache->remember('all_products_cache', $this->timeToLive(), function () {
            return $this->model->all();
        });
    }

    public function showInNav()
    {
        return $this->cache->remember('products_cache_navbar', $this->timeToLive(), function () {
            return $this->model->showInNavbar();
        });
    }

    public function getProduct($slug, $with = null)
    {
        $sluger = json_encode($slug);

        if (isset($with) && is_array($with)) {
            return $this->cache->remember("single_product_cache_{$sluger}", $this->timeToLive(), function () use ($slug, $with) {
                return $this->model->whereSlug($slug)->whereActive(true)
                    ->with($with)
                    ->firstOrFail();
            });
        }

        return $this->cache->remember("single_product_cache_{$sluger}", $this->timeToLive(), function () use ($slug) {
            return $this->model->whereSlug($slug)->whereActive(true)
                ->firstOrFail();
        });
    }

    public function activeItems()
    {
        return $this->cache->remember('products_cache_active', $this->timeToLive(), function () {
            return $this->model->active();
        });
    }

    public function withRelated(array $related)
    {
        return $this->cache->remember('products_cache_related', $this->timeToLive(), function () use ($related) {
            return $this->model->withRelated($related);
        });
    }

    public function randomsHome()
    {
        return $this->cache->remember('products_cache_random', $this->timeToLive(), function () {

            return $this->model->randoms();
        });
    }

    public function bestSearched()
    {
        return $this->cache->remember('products_cache_topsearch', $this->timeToLive(), function () {
            return $this->model()->topSearched();
        });
    }

    public function explore()
    {

        return $this->model()->exploreProducts();
    }

    public function similaire()
    {
        $products = $this->model()->pluck('slug');

        /*return $products->all();*/

        $resultat = $products->map(function ($item, $key) {
            return url(route('products.single', $item));
        });

        return $resultat->all();
    }

    private function timeToLive()
    {
        return \Carbon\Carbon::now()->addDays(30);
    }
}
