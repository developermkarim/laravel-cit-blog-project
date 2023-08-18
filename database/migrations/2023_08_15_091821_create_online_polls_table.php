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
        Schema::create('online_polls', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('vote_for_1')->nullable();
            $table->string('vote_for_2')->nullable();
            $table->integer('yes')->default('0');
            $table->integer('no')->default('0');
            $table->integer('no_opinion')->default('0');
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
        Schema::dropIfExists('online_polls');
    }
};
