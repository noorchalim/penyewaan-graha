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
        Schema::create('permohonan_sewa_perlengkapans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permohonan_sewa_id')->constrained('permohonan_sewas')->onDelete('cascade');
            $table->foreignId('perlengkapan_id')->constrained('perlengkapans')->onDelete('cascade');
            $table->integer('quantity')->default(1);
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
        Schema::dropIfExists('permohonan_sewa_perlengkapan');
    }
};
