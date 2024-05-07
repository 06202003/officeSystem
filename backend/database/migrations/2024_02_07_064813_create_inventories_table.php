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
        Schema::create('inventories', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->char('inventory_name', 100);
            $table->char('brand', 45);
            $table->date('purchase_date');
            $table->integer('price');
            $table->integer('residual_value')->nullable();
            $table->integer('useful_life')->nullable();
            $table->integer('depreciation')->nullable();
            $table->string('description');
            $table->enum('status', ['normal', 'damage', 'maintenance', 'deleted'])->default('normal');
            $table->char('category_guid', 50);
            $table->char('user_guid', 50)->nullable();
            $table->char('room_guid', 50)->nullable();
            $table->integer('price_in_year_1')->nullable();
            $table->integer('price_in_year_2')->nullable();
            $table->integer('price_in_year_3')->nullable();
            $table->integer('price_in_year_4')->nullable();
            $table->string('img_url')->nullable();
            $table->char('vendor_guid', 100);
            $table->foreign('vendor_guid')->references('guid')->on('vendors')->onDelete('cascade');
            $table->foreign('category_guid')->references('guid')->on('categories')->onDelete('cascade');
            $table->foreign('user_guid')->references('guid')->on('users')->onDelete('cascade');
            $table->foreign('room_guid')->references('guid')->on('rooms')->onDelete('cascade');
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
        Schema::dropIfExists('inventory');
    }
};
