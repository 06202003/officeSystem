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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->char('user_requested_guid', 36)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->char('leave_type_guid', 36)->nullable();
            $table->date('date_requested')->nullable();
            $table->string('description')->nullable();
            $table->enum('status' , ['yes', 'no', 'waiting','canceled'])->default('waiting');
            $table->string('reason')->nullable();
            $table->date('date_actioned')->nullable();
            $table->char('approved_by_guid', 36)->nullable();
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
        Schema::dropIfExists('leave_request');
    }
};
