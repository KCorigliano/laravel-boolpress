<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts_tags extends Model
{
    public function posts() {
        return $this->hasMany("App\Post");
    }

    public function tags() {
        return $this->hasMany("App\Tag");
    }
}
