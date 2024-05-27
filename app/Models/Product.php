<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    public static function getSlug($value, $exclude = '')
    {
        if (static::whereSlug($slug = Str::slug($value, '-'))->exists()) {
            $slug = self::incrementSlug($slug, $exclude);
        }
        return $slug;
    }
    public static function incrementSlug($slug, $exclude = '')
    {
        $original = $slug;
        $count = 1;
        if ($exclude) {
            while (static::whereSlug($slug)->where('id', '!=', $exclude)->exists()) {
                $slug = "{$original}-" . $count++;
            }
        } else {
            while (static::whereSlug($slug)->exists()) {
                $slug = "{$original}-" . $count++;
            }
        }
        return $slug;

    }
}
