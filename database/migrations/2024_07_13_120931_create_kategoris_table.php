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
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('paket');
            $table->string('deskripsi');
            $table->decimal('harga', 10, 2);
            $table->time('jam_mulai'); // Waktu mulai paket
            $table->time('jam_selesai'); // Waktu selesai paket
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
        Schema::dropIfExists('kategoris');
    }
};
