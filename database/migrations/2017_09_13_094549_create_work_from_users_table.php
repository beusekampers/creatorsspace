<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkFromUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_from_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('like');
            $table->string('title', 150);
            $table->text('description');
            $table->integer('active');
            $table->string('category', 100);
            $table->string('tag', 100);
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
        Schema::dropIfExists('work_from_users');
    }
}
