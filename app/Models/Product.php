<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $with = ['video','images', 'inventory'];
    public function media() {
        return $this->belongsToMany('App\Models\Media', 'product_media', 'product_id', 'media_id');
    }
    public function video() {
        return $this->media()->where('type', 'video');
    }
    public function images() {
        return $this->media()->where('type', 'image');
    }
    public function inventory() {
        return $this->hasOne('App\Models\Inventory', 'product_id', 'id');
    }
}
