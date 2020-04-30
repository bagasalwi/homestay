<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->unsignedBigInteger('jeniskamar_id');
            $table->unsignedBigInteger('location_id');
            $table->string('name');
            $table->string('description');
            $table->string('number');
            $table->string('floor');
            $table->string('harga');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('jeniskamar_id')->references('id')->on('jeniskamars')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamars');
    }
}
