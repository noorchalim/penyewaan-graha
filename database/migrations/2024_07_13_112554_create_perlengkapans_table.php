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
        Schema::create('perlengkapans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perlengkapan');
            $table->string('deskripsi')->nullable();
            $table->integer('jumlah');
            $table->decimal('harga_sewa', 10, 2);
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
        Schema::dropIfExists('perlengkapans');
    }
};
