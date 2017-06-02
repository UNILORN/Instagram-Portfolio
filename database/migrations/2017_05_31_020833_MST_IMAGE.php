<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MSTIMAGE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MST_IMAGE', function (Blueprint $table) {
            $table->incriments('id')->unique();
            $table->string('url');
            $table->integer('instagram_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('MST_IMAGE');
    }
}
