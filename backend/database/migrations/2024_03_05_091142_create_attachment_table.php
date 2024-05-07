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
        Schema::create('attachments', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->char('attachment_name', 100);
            $table->string('file_url');
            $table->string('file_type');
            $table->integer('file_size');
            $table->enum('status', ['active', 'deleted'])->default('active');
            $table->char('card_guid', 36)->index();
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
        Schema::dropIfExists('attachment');
    }
};
