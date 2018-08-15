<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reply_text');
            $table->unsignedInteger('comment_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();




            $table->foreign('comment_id')
                ->references('id')->on('comment')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('user')
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
        Schema::dropIfExists('reply');
    }
}
