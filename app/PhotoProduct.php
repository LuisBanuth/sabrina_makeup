<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoProduct extends Model
{
    protected $fillable = ['path'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
