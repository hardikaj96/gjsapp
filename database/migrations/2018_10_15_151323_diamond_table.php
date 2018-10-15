<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiamondTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diamond', function (Blueprint $table) {
            $table->increments('id');
            $table->string('diamond_size');
            $table->string('VS2-SI1');
            $table->string('SI2');
            $table->string('Color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('diamond');
    }
}
