<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_gedungs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('permohonan_sewa_id')->constrained('permohonan_sewas')->onDelete('cascade');
            $table->enum('status', ['disewa', 'tersedia'])->default('tersedia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_gedungs');
    }
};
