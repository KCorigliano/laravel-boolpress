<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("tags_id");
            $table->unsignedBigInteger("posts_id");
            $table->timestamps();

            $table->foreign("tags_id")
                ->references("id")
                ->on("tags");
            $table->foreign("posts_id")
                ->references("id")
                ->on("post");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_post');
    }
}
