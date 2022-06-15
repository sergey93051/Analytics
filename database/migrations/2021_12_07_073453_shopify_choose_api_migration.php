<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShopifyChooseApiMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopifyApi', function (Blueprint $table) {
            $table->id();
            $table->string('APIkey')->unique()->nullable();
            $table->string('SHOPIFY_DOMAIN')->unique()->nullable();
            $table->string('Password')->unique()->nullable();
            $table->string('APIversion')->nullable();
            $table->string('protocol')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopifyApi');
    }
}
