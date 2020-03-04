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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('nik')->nullable();
            $table->string('paspor')->nullable();
            $table->string('telepon')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('national')->nullable();
            $table->string('profile_pic')->default('default-user.png')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
