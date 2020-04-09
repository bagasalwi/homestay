<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // Basic Register
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            // Pemesanan
            $table->string('address')->nullable();
            $table->string('nik')->nullable();
            $table->string('paspor')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('telepon')->nullable();
            $table->string('national')->nullable();
            $table->string('profile_pic')->default('default.png')->nullable();
            $table->string('attachment')->nullable();
            $table->string('tempat_kerja')->nullable();
            // Kerabat (Optional)
            $table->string('nama_kerabat')->nullable();
            $table->string('no_kerabat')->nullable();
            // TimeStamps
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->datetime('last_login_at')->nullable();
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
        Schema::dropIfExists('transaction');
        Schema::dropIfExists('kamar');
        Schema::dropIfExists('users');
    }
}
