<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caterory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','parent_id','slug'];

    public function categoryChildren(){
        return $this->hasMany(Caterory::class,'parent_id');
    }

    public function getProductByCategoryId(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
