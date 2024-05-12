<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Clients extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getType(){
        return $this->hasOne(ClientType::class,'id','client_type_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($client) {
            Storage::disk('public')->delete($client->img);
        });
    }
}
