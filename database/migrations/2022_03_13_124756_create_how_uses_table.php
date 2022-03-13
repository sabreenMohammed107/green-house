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
        Schema::create('how_uses', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->dateTime('use_date',0)->nullable();
            $table->text('text')->nullable();
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
        Schema::dropIfExists('how_uses');
    }
};
