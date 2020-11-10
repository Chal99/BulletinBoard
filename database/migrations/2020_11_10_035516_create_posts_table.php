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
            $table->increments('id');
            $table->string('title', 255)->unique()->nullable();
            $table->string('description')->nullable();
            $table->integer('status')->default('1')->nullable();
            $table->unsignedInteger('create_user_id')->nullable();
            $table->unsignedInteger('updated_user_id')->nullable();
            $table->integer('deleted_user_id');
            $table->date('deleted_at');
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
