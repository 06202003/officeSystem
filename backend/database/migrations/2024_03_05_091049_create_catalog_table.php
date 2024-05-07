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
        Schema::create('catalogs', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->char('list_name', 100);
            $table->string('description')->nullable();
            $table->char('board_guid', 36)->index();
            $table->integer('order');
            $table->enum('status', ['active', 'deleted'])->default('active');
            $table->foreign('board_guid')->references('guid')->on('boards')->onDelete('cascade');
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
        Schema::dropIfExists('catalog');
    }
};
