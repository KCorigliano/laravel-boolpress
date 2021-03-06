<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ["title", "content"];

    public function user() {
        return $this->belongsTo("App\User");
    }

    public function tags() {
        return $this->belongsToMany("App\Tags");
    }
}
