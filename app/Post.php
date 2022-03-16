<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ["title", "content", "category_id"];

    public function user() {
        return $this->belongsTo("App\User");
    }

    public function post_tags() {
        return $this->belongsToMany("App\Posts_tags");
    }
}
