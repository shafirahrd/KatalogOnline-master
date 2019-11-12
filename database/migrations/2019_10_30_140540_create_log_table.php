<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id_log');
            $table->integer('id_user')->unsigned();
            $table->string('log_change',100);
            $table->integer('id_katalog')->unsigned();
            $table->timestamps();
        });

        Schema::table('logs',function($table){
            $table->foreign('id_katalog')->references('id_katalog')->on('katalogs');
        });

        Schema::table('logs',function($table){
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
