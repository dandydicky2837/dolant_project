<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progres', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->string('jenis_pekerjaan');
            $table->string('nama_channel');
            $table->string('judul_seri');
            $table->string('keterangan_kerja');
            $table->string('link');
            $table->integer('validasi')->default('0');
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
        Schema::dropIfExists('progres');
    }
};
