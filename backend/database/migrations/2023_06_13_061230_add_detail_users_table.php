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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nik', 36)->nullable();
            $table->string('birth_city')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['male', 'female', ''])->default('');
            $table->char('religion', 36)->nullable();
            $table->string('npwp')->nullable();
            $table->text('information')->nullable();
            $table->integer('bank_account')->nullable();
            $table->string('signature_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nik');
            $table->dropColumn('birth_city');
            $table->dropColumn('birth_date');
            $table->dropColumn('gender');
            $table->dropColumn('religion');
            $table->dropColumn('npwp');
            $table->dropColumn('information');
            $table->dropColumn('gender');
            $table->dropColumn('bank_account');
            $table->dropColumn('signature_url');
        });
    }
};
