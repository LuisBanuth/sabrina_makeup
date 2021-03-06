<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug;
    protected $fillable = ['name', 'description', 'body', 'price', 'frontpage', 'position', 'slug'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function categories(){
        return $this->belongsToMany(ProductCategory::class);
    }

    public function photos(){
        return $this->hasMany(PhotoProduct::class);
    }
}
