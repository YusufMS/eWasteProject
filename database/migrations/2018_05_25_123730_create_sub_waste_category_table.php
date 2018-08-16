<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubWasteCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_waste_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category')->unique;
            $table->string('description')->nullable();;
            $table->unsignedInteger('main_category_id');
            $table->timestamps();
            $table->rememberToken();
            
            $table->foreign('main_category_id')
                ->references('id')->on('main_waste_category')
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
        Schema::dropIfExists('subWasteCategory');
    }
}
















