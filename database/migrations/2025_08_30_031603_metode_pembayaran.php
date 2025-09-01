<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('metode_pembayarans', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED
            $table->string('nama');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('metode_pembayarans');
    }
};
