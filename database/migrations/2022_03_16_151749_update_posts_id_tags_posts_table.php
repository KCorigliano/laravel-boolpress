<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsIdTagsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tags_posts', function (Blueprint $table) {
            $table->bigInteger('posts_id')->change();
            $table->bigInteger('tags_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tags_posts', function (Blueprint $table) {
            $table->integer('posts_id')->change();
            $table->integer('tags_id')->change();
        });
    }
}
