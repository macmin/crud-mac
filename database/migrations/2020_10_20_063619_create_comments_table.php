<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id_comment');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_article');
            $table->text("body_comment");
            $table->timestamps();
            $table->foreign('id_user')
                ->references('id_user')
                ->on('users');
            $table->foreign('id_article')
                ->references('id_article')
                ->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
