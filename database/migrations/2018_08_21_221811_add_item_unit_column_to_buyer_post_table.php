<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemUnitColumnToBuyerPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buyer_post', function (Blueprint $table) {
            $table->string('item_unit')->after('no_of_items')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buyer_post', function (Blueprint $table) {
            $table->dropColumn('item_unit');
        });
    }
}
