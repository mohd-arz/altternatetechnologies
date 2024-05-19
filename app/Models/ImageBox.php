<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ImageBox extends Model
{
    use HasFactory;
    protected $guarded= [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($imageBox) {
            Storage::disk('public')->delete($imageBox->image);
        });
    }
}
