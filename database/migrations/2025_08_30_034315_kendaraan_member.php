<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kendaraan_member', function (Blueprint $table) {
            $table->id();

            // Foreign key ke member_sip
            $table->foreignId('id_member_sip')
                  ->constrained('member_sip')  // pastikan nama tabel sama persis
                  ->onDelete('cascade');

            // Foreign key ke jenis_kendaraan (perhatikan nama tabel singular)
            $table->foreignId('id_jenis_kendaraan')
                  ->constrained('jenis_kendaraan') // sesuai tabel yang dibuat
                  ->onDelete('cascade');

            $table->string('nopol', 20);
            $table->timestamps();

            // Pastikan tabel menggunakan InnoDB
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('kendaraan_member');
    }
};
