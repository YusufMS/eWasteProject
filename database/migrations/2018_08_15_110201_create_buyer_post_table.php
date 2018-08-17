<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyerPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_of_items')->nullable();
            $table->string('model')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('post_id');

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('user')
                ->onDelete('cascade');

            $table->foreign('post_id')
                ->references('id')->on('post')
                ->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyer_post');
    }
}
