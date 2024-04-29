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
        Schema::create('barangs', function (Blueprint $table) {
            $table->string('id')->primary()->unique();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('kd_kategori_barang');
            $table->string('satuan_barang');
            $table->string('jumlah');
            $table->string('created_by');
            $table->timestamps();

            $table->foreign('kd_kategori_barang')
                ->references('kode')
                ->on('kategori_barangs');

            $table->foreign('satuan_barang')
                ->references('kode')
                ->on('satuan_barangs');

            $table->foreign('created_by')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
