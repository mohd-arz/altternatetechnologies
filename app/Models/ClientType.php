<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ClientType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getClients(){
        return $this->hasMany(Clients::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($client) {
            foreach($client->getClients as $client){
                Storage::disk('public')->delete($client->img);
            }
        });
    }
}
