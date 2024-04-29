<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama_jalan');
            $table->string('angka_kurang');
            $table->string('angka_lebih');
            $table->string('profesi');
            $table->json('plain_json')->nullable();
            $table->timestamps();

            $table->foreign('jenis_kelamin')
            ->references('kode_JK')
            ->on('genders');

            $table->foreign('profesi')
            ->references('kode_profesi')
            ->on('profesis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
