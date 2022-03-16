<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignPostKeyInPostTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_tags', function (Blueprint $table) {
            $table->foreignId("posts_id")
                ->nullable()
                ->references("post_id")
                ->on("post");

            $table->foreignId("tags_id")
            ->nullable()
            ->references("tags_id")
            ->on("tags");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_tags', function (Blueprint $table) {
            $table->dropForeign("post_tags_post_id_foreign");
            $table->dropForeign("post_tags_tags_id_foreign");

        });
    }
}
