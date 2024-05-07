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
        Schema::create('checklist_items', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->string('checklist_item_name');
            $table->boolean('checked');
            $table->enum('status', ['active', 'deleted'])->default('active');
            $table->char('checklist_guid', 36)->index();
            $table->foreign('checklist_guid')->references('guid')->on('checklists')->onDelete('cascade');
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
        Schema::dropIfExists('checklist_item');
    }
};
