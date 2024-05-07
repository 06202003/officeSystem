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
        Schema::create('project_histories', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->string('project_name')->nullable();
            $table->year('year')->nullable();
            $table->enum('platform', ['Mobile', 'Web', 'Desktop', ''])->default('');
            $table->char('role_guid', 36)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('project_histories');
    }
};
