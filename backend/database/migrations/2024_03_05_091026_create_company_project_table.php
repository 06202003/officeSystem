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
        Schema::create('company_projects', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->char('company_guid', 36)->index();
            $table->char('project_guid', 36)->index();
            $table->enum('status', ['active', 'deleted'])->default('active');
            $table->foreign('company_guid')->references('guid')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('company_project');
    }
};
