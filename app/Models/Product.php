<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function images(){
        return $this->hasMany('App\Models\ProductImage','product_id');
    }
    public function tags(){
        return $this->belongsToMany('App\Models\Tag','product_tags', 'product_id', 'tag_id')->withTimestamps();
    }
    public function category(){
        return $this->belongsTo('App\Models\Caterory','category_id');
    }
}
