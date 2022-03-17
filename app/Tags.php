<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';

    public function posts() {
        return $this->belongsToMany("App\Post");
    }
}
