<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('katalogs', function (Blueprint $table) {
            $table->increments('id_katalog');
            $table->string('judul',200)->nullable();
            $table->integer('jenis')->unsigned()->nullable();
            $table->string('penulis',100)->nullable();
            $table->string('penerbit',100)->nullable();
            $table->string('kota_penerbit',50)->nullable();
            $table->integer('tahun_terbit')->nullable();
            $table->string('bahasa',30)->nullable();
            $table->text('deskripsi',30)->nullable();
            $table->integer('lokasi')->unsigned()->nullable();
            $table->string('att_value',1000)->nullable();
            $table->timestamps();
        });

        Schema::table('katalogs',function($table){
            $table->foreign('jenis')->references('id_koleksi')->on('koleksis')->onUpdate('cascade')->onDelete('set null');
        });

        Schema::table('katalogs',function($table){
            $table->foreign('lokasi')->references('id_lokasi')->on('lokasis')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('katalogs');
    }
}
