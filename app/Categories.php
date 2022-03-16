<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    
    public function posts() {
        return $this->hasMany("App\Post");
    }
}
