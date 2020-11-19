<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public function permissionChildren(){
        return $this->hasMany(Permission::class , 'parent_id');
    }
}
