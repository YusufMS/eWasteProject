<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostBuyerCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_buyer_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('buyer_category');
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
        Schema::dropIfExists('post_buyer_category');
    }
}
