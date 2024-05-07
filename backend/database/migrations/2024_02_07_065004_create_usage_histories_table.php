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
        Schema::create('usage_histories', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->char('old_user_guid', 50)->nullable();
            $table->char('new_user_guid', 50)->index();
            $table->char('old_room_guid', 50)->nullable();
            $table->char('new_room_guid', 50);
            $table->date('date');
            $table->enum('status', ['active', 'deleted'])->default('active');
            $table->char('inventory_guid', 50)->index();
            $table->foreign('inventory_guid')->references('guid')->on('inventories')->onDelete('cascade');
            $table->foreign('old_user_guid')->references('guid')->on('users')->onDelete('cascade');
            $table->foreign('new_user_guid')->references('guid')->on('users')->onDelete('cascade');
            $table->foreign('old_room_guid')->references('guid')->on('rooms')->onDelete('cascade');
            $table->foreign('new_room_guid')->references('guid')->on('rooms')->onDelete('cascade');
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
        Schema::dropIfExists('history_pemakaian');
    }
};
