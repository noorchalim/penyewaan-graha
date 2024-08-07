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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permohonan_sewa_id');
            $table->string('status'); // e.g., 'pending', 'paid'
            $table->decimal('total_biaya', 10, 2);
            $table->timestamps();

            $table->foreign('permohonan_sewa_id')
                ->references('id')->on('permohonan_sewas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};
