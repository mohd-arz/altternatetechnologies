<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            Storage::disk('public')->delete($product->img1);
            Storage::disk('public')->delete($product->img2);
            Storage::disk('public')->delete($product->img3);
        });
    }
    public function getProductAttr(){
        return $this->hasMany(ProductAttribute::class,'product_id','id');
    }
}
