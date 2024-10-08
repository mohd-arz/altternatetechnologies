<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HomeBanner extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        // Listen for the 'deleting' event of the model
        static::deleting(function ($homeBanner) {
            // Extract the filename from the banner_img attribute
            $fileName = basename($homeBanner->banner_img);

            // Delete the associated image from storage
            Storage::disk('public')->delete('home_banner/' . $fileName);
        });
    }
}
