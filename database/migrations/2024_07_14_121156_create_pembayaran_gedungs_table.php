<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayaran_gedungs', function (Blueprint $table) {
            $table->id();
            $table->decimal('jumlah', 10, 2);
            $table->enum('status_pembayaran', ['sudahdibayar', 'belumdibayar', 'menunggu'])->default('menunggu');
            $table->enum('status', ['menungguverfikasi', 'sudahdiverifikasi'])->default('menungguverfikasi');
            $table->dateTime('tanggal_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran_gedungs');
    }
};
