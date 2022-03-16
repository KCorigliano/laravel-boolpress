<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public function post_tags() {
        return $this->belongsToMany("App\Posts_tags");
    }
}
