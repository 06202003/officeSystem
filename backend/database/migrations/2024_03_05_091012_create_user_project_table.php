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
        Schema::create('user_projects', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->char('user_guid', 36)->index();
            $table->char('project_guid', 36)->index();
            $table->enum('status', ['active', 'deleted'])->default('active');
            $table->foreign('user_guid')->references('guid')->on('users')->onDelete('cascade');
            $table->foreign('project_guid')->references('guid')->on('projects')->onDelete('cascade');
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
        Schema::dropIfExists('user_project');
    }
};
