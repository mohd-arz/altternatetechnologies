<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ServiceSub extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getProducts(){
        return $this->hasMany(ServiceSubProduct::class,'sub_id','id');
    }
}
