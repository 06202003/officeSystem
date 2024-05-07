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
        Schema::create('cards', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->char('card_name', 100);
            $table->string('description')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->integer('order');
            $table->string('img_url')->nullable();
            $table->enum('status', ['active', 'deleted'])->default('active');
            $table->char('catalog_guid', 36)->index();
            $table->foreign('catalog_guid')->references('guid')->on('catalogs')->onDelete('cascade');
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
        Schema::dropIfExists('card');
    }
};
