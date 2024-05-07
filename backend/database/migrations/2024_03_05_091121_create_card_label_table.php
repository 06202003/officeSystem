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
        Schema::create('card_labels', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->char('label_guid', 36)->index();
            $table->char('card_guid', 36)->index();
            $table->enum('status', ['active', 'deleted'])->default('active');
            $table->foreign('label_guid')->references('guid')->on('labels')->onDelete('cascade');
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
        Schema::dropIfExists('card_label');
    }
};