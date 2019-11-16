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
            $table->string('username')->unique();
            $table->string('nama');
            $table->string('nip',20);
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('user_lokasi')->unsigned()->nullable();
            $table->integer('user_role')->unsigned()->nullable();
            // $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users',function($table){
            $table->foreign('user_role')->references('id')->on('user_role')->onUpdate('cascade')->onDelete('set null');
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
