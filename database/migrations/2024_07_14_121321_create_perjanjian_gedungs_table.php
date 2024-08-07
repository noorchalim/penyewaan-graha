<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('perjanjian_gedungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permohonan_sewa_id')->constrained('permohonan_sewas')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->foreignId('vendor_id')->nullable()->constrained('vendors')->onDelete('cascade');
            $table->foreignId('jadwal_gedung_id')->constrained('jadwal_gedungs')->onDelete('cascade');
            $table->date('tanggal_perjanjian');
            $table->string('status')->default('aktif'); // Bisa ada status lain seperti 'selesai' atau 'dibatalkan'
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perjanjian_gedungs');
    }
};
