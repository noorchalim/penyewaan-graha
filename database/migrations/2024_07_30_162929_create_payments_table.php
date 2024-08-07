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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique(); // ID transaksi dari Midtrans
            $table->unsignedBigInteger('permohonan_sewa_id'); // Foreign key ke permohonan sewa
            $table->decimal('amount', 10, 2); // Jumlah pembayaran
            $table->string('status'); // Status transaksi (e.g., 'pending', 'success', 'failed')
            $table->text('response')->nullable(); // Response dari Midtrans, jika diperlukan
            $table->timestamps();

            $table->foreign('permohonan_sewa_id')->references('id')->on('permohonan_sewas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
