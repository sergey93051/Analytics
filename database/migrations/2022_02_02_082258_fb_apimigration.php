<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FbApimigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fbApi', function (Blueprint $table) {
            $table->id();
            $table->string('FCAPP_ID')->unique()->nullable();
            $table->string('FCAPP_SECRET')->nullable();
            $table->string('FCGRAPH_VERSION')->nullable();
            $table->string('FCACCAUNT')->nullable();
            $table->string('FCToken')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fbApi');
    }

}
