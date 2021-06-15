<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;
use App\Traits\Language;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{

    use HasFactory, Translatable, Language;

    protected $translatable = ['name', 'description', 'content'];


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }


    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Models\Color', 'product_color', 'product_id', 'color_id');
    }

    public function scopeActive($query)
    {

        return $query->whereActive(true)->get();
    }

    public function scopeWithRelated($query, $related)
    {
        return $query->whereActive(true)->with($related)->get();
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getFirstPhotoAttribute()
    {
        $images =  json_decode($this->images);
        $image = isset($images);
        return Voyager::image($image ? array_shift($images) : setting('portfolio.portfolio_default_image'));
    }

    public function getAllPhotosAttribute()
    {
        $images =  json_decode($this->images);
        return $images;
    }

    public function singlePhoto($value)
    {

        return Voyager::image($value);
    }

    public function getUrlAttribute()
    {
        return route('products.single',$this->slug);
    }

    /*******Filters */
    public function scopeFiltersCategory(Builder $query, $category)
    {
        $categoryy = Category::whereSlug($category)->firstOrFail()->id;

        return $query
            ->where('category_id', $categoryy)
            ->orWhere('category_parent', $categoryy);
    }

    public function scopeFiltersBrand(Builder $query, $brand)
    {
        $brandd = Brand::whereSlug($brand)->firstOrFail()->id;

        return $query
            ->where('brand_id', $brandd);
    }

    public function scopeFiltersColor(Builder $query, $color)
    {
        $colorId = Color::whereSlug($color)->firstOrFail()->id;

        $query->whereHas('colors', function ($q) use ($colorId) {
            $q->where('color_id', $colorId);
        });
    }
}
