<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->unique();
            $table->string('description');
            $table->integer('status')->default('1');
            $table->unsignedBigInteger('create_user_id');
            $table->unsignedBigInteger('updated_user_id');
            $table->integer('deleted_user_id')->nullable();
            $table->date('deleted_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
