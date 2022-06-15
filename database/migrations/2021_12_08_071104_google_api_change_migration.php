<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GoogleApiChangeMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('googleApi', function (Blueprint $table) {
            $table->id();
            $table->string('view_id')->unique()->nullable();
            $table->string('service_account_credentials_json')->unique()->nullable();
            $table->string('shopify_domen')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('googleApi');
    }
}
