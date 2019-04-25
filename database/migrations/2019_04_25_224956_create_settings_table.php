<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name')->default('abc');
            $table->string('address')->default('xyz');
            $table->string('email')->default('abcd@gmail.com');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('logo')->default('logo.png');
            $table->string('city')->default('savar');
            $table->string('country')->default('Bangladesh');
            $table->integer('zip_code')->default(1000);
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
