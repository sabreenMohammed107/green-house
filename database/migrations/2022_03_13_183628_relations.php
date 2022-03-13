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
        //  This is Realations for the users Table ..
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('companies');

        });

         //  This is Realations for the items Table ..
         Schema::table('items', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('item_categories');
            $table->foreign('user_id')->references('id')->on('users');

        });

         //  This is Realations for the orders Table ..
         Schema::table('orders', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('order_statuses');
            $table->foreign('user_id')->references('id')->on('users');

        });

         //  This is Realations for the order_items Table ..
         Schema::table('order_items', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('item_id')->references('id')->on('items');

        });

         //  This is Realations for the user_prizes Table ..
         Schema::table('user_prizes', function (Blueprint $table) {
            $table->foreign('prize_id')->references('id')->on('prizes_points');
            $table->foreign('user_id')->references('id')->on('users');

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
