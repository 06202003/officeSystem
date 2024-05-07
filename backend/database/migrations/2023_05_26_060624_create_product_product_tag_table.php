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
        Schema::create('product_product_tag', function (Blueprint $table) {
            $table->increments("id");
            $table->char('product_guid', 36)->index();
            $table->char('product_tag_guid', 36)->index();

            $table->foreign('product_guid')->references('guid')->on('products')->onDelete('cascade');
            $table->foreign('product_tag_guid')->references('guid')->on('product_tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_product_tag');
    }
};
