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
        Schema::create('activities', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->string('description');
            $table->enum('status', ['active', 'deleted'])->default('active');
            $table->char('card_guid', 36)->index();
            $table->char('user_guid', 36)->index();
            $table->foreign('user_guid')->references('guid')->on('users')->onDelete('cascade');
            $table->foreign('card_guid')->references('guid')->on('cards')->onDelete('cascade');
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
        Schema::dropIfExists('activity');
    }
};
