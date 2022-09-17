<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_website');
            $table->string('description');
            $table->string('logo');
            $table->string('favicon');
            $table->string('email_website');
            $table->string('phone_website');
            $table->string('address_website');
            $table->string('facebook_website')->nullable();
            $table->string('twitter_website')->nullable();
            $table->string('instagram_website')->nullable();
            $table->string('youtube_website')->nullable();
            $table->string('tiktok_website')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
