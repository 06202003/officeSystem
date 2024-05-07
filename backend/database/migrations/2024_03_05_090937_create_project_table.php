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
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->char('project_name', 100);
            $table->string('description')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->enum('status', ['ongoing', 'finished', 'deleted'])->default('ongoing');
            $table->char('project_category_guid', 36)->index();
            $table->char('project_manager_guid', 36)->index();
            $table->foreign('project_category_guid')->references('guid')->on('project_categories')->onDelete('cascade');
            $table->foreign('project_manager_guid')->references('guid')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('project');
    }
};
