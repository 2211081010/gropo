<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('member_sip', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED
            $table->string('nama');
            $table->string('nohp');
            $table->string('metode_pembayaran'); // ganti spasi menjadi underscore
            $table->string('foto');
            $table->timestamps(); // otomatis created_at & updated_at

            $table->engine = 'InnoDB'; // penting untuk FK
        });
    }

    public function down()
    {
        Schema::dropIfExists('member_sip');
    }
};
