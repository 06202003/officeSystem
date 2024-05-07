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
        Schema::create('reference_contacts', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('connection')->nullable();
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
        Schema::dropIfExists('reference_contact');
    }
};
