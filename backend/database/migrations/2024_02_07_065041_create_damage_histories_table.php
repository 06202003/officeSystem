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
        Schema::create('damage_histories', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->date('repair_date')->nullable();
            $table->integer('repair_cost')->nullable();
            $table->string('description');
            $table->date('date_of_damage');
            $table->enum('status', ['active', 'deleted'])->default('active');
            $table->date('completion_date_of_repair')->nullable();
            $table->char('inventory_guid', 50)->index();
            $table->char('user_repair_guid', 50)->nullable();
            $table->char('user_last_guid', 50)->index();
            $table->char('vendor_guid', 100);
            $table->foreign('vendor_guid')->references('guid')->on('vendors')->onDelete('cascade');
            $table->foreign('inventory_guid')->references('guid')->on('inventories')->onDelete('cascade');
            $table->foreign('user_repair_guid')->references('guid')->on('users')->onDelete('cascade');
            $table->foreign('user_last_guid')->references('guid')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('history_perbaikan');
    }
};
