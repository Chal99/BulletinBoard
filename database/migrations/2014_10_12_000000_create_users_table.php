<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->string('name')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password')->nullable();
            $table->string('profile', 255)->nullable();
            $table->string('type')->default('1')->nullable();
            $table->string('phone', 20);
            $table->string('address', 255);
            $table->date('dob');
            $table->unsignedInteger('create_user_id')->nullable();
            $table->unsignedInteger('updated_user_id')->nullable();
            $table->integer('deleted_user_id');
            $table->datetime('deleted_at');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('create_user_id')->references('id')->on('users');
            $table->foreign('updated_user_id')->references('id')->on('users');
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
