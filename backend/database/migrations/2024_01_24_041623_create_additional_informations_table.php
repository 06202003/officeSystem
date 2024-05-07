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
        Schema::create('additional_information', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->string('connection')->nullable();
            $table->string('name')->nullable();
            $table->string('birth_city')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('adress')->nullable();
            $table->string('phone_number')->nullable();   
            $table->string('work')->nullable();
            $table->char('user_guid', 36)->nullable();
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
        Schema::dropIfExists('additional_informations');
    }
};
