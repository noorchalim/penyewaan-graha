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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->decimal('gross_amount', 15, 2);
            $table->string('transaction_status');
            // $table->foreign('permohonan_sewa_id')->references('id')->on('permohonan_sewas')->onDelete('cascade');
            $table->foreignId('permohonan_sewa_id')->constrained('permohonan_sewas')->onDelete('cascade');
            // tambahkan field lain jika diperlukan
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
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['permohonan_sewa_id']);
            $table->dropColumn('permohonan_sewa_id');
        });
    }
};
