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
        Schema::create('employees', function (Blueprint $table) {
            $table->string('nomor_induk')->primary();
            $table->string('nama');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->date('tanggal_bergabung');
            $table->timestamps();
        });

        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_induk_id');
            $table->foreign('nomor_induk_id')->references('nomor_induk')->on('employees')->onDelete('cascade');
            $table->date('tanggal_cuti');
            $table->integer('lama_cuti');
            $table->string('keterangan');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('cuti');
    }
};
