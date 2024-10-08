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
        Schema::create('permohonan_sewas', function (Blueprint $table) {
            $table->id();
            // Identitas diri
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('pekerjaan');
            $table->string('no_hp', 20);
            $table->text('alamat');
            // Keperluan
            $table->string('keperluan');
            // Kategori paket
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            // Vendor
            $table->foreignId('vendor_id')->nullable()->constrained('vendors')->onDelete('cascade');
            // Tanggal
            $table->json('tanggal');
            // Status
            $table->enum('status', ['ditinjau', 'disetujui', 'ditolak'])->default('ditinjau');
            // Waktu pembuatan dan pembaruan otomatis
            $table->timestamps(); // Ini akan menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan_sewas');
    }
};
