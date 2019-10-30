<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasis', function (Blueprint $table) {
            $table->increments('id_lokasi');
            $table->string('departemen',100)->nullable();
            $table->string('fakultas',100)->nullable();
            $table->string('alamat',200)->nullable();
            $table->string('tautan',300)->nullable();
            $table->timestamps();
        });

        Schema::table('users',function($table){
            $table->foreign('user_lokasi')->references('id_lokasi')->on('lokasis')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lokasis');
    }
}
