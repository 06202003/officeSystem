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
        Schema::create('education', function (Blueprint $table) {
            $table->uuid('guid')->primary();
            $table->year('entry_year')->nullable();
            $table->year('out_year')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('department')->nullable();
            $table->enum('qualification', ['1', '2', '3', '4', ''])->default('');
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
        Schema::dropIfExists('education');
    }
};
