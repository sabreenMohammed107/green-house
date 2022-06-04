<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_features_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_id')->unsigned()->nullable();
            $table->bigInteger('item_category_features_id')->unsigned()->nullable();
            $table->bigInteger('feature_list_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_features_values');
    }
};
