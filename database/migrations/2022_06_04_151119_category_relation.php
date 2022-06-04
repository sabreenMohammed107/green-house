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
        //  This is Realations for the item_category_features Table ..
        Schema::table('item_category_features', function (Blueprint $table) {
            $table->foreign('item_category_id')->references('id')->on('item_categories');

        });

         //  This is Realations for the features_lists Table ..
         Schema::table('features_lists', function (Blueprint $table) {
            $table->foreign('item_category_features_id')->references('id')->on('item_category_features');

        });

         //  This is Realations for the items_features_values Table ..
         Schema::table('items_features_values', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('item_category_features_id')->references('id')->on('item_category_features');
            $table->foreign('feature_list_id')->references('id')->on('features_lists');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
