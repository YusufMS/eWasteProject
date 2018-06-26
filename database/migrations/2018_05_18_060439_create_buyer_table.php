<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone', 15);
            $table->boolean('phone_privacy')->default(0);
            $table->string('type');

            $table->integer('rating')->nullable();
            // $table->unsignedInteger('level')->default(0);
            $table->text('description')->nullable();
            $table->unsignedInteger('user_id');

            $table->timestamps();
            $table->rememberToken();
            
            $table->softDeletes();


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
        Schema::dropIfExists('buyer');
    }
}
