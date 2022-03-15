<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyInPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post', function (Blueprint $table) {
            $table->unsignedBigInteger("user_id");

            $table->foreign("user_id") // indichiamo che user_id è una foreign key
                ->references("id") // indichiamo che fa riferimento alla colonna id
                ->on("users"); // sulla tabella users
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post', function (Blueprint $table) {
            $table->dropForeign("posts_user_id_foreign");
            $table->dropColumn("user_id");
        });
    }
}
