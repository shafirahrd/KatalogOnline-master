<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoleksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koleksis', function (Blueprint $table) {
            $table->increments('id_koleksi');
            $table->string('jenis_koleksi',30)->nullable();
            $table->text('deskripsi_koleksi',500)->nullable();
            $table->json('att_khusus')->nullable();
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
        Schema::dropIfExists('koleksis');
    }
}
