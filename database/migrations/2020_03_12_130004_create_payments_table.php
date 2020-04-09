<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_id');
            
            $table->string('nama_transfer',100)->nullable();
            $table->string('bank_transfer',100)->nullable();
            $table->string('tanggal_transfer',100)->nullable();
            $table->string('rekening_transfer',100)->nullable();
            $table->string('bukti_transfer',100)->nullable();
            $table->string('approved_by',100)->nullable();
            $table->string('approved_date',100)->nullable();
            $table->string('payment_status')->nullable();
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
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
}
