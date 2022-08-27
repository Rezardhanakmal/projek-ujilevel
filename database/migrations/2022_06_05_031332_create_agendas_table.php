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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_id');
            $table->bigInteger('mps_id');
            $table->string('materi');
            $table->enum('jp',['PJJ','PTM']);
            $table->string('link');
            $table->string('absen_siswa');
            $table->string('dokumentasi');
            $table->bigInteger('kelazs_id');
            $table->string('absen_guru');
            $table->string('jam_mulai');
            $table->string('jam_berakhir');
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
        Schema::dropIfExists('agendas');
    }
};
