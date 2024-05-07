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
        Schema::create('parameter_details', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->char('parameter_master_guid', 36);
            $table->char('parameter_detail_guid', 36)->nullable();
            $table->text('parameter_detail_name');
            $table->text('detail')->nullable();
            $table->enum('status', ['active', 'deleted'])->default('active');
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
        Schema::dropIfExists('parameter_details');
    }
};
