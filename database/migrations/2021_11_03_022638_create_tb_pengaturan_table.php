<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPengaturanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengaturan', function (Blueprint $table) {
            $table->id();
            $table->string('whatsapp')->nullable();
            $table->string('web_lion_parcel')->nullable();
            $table->string('nama_bank_lion_parcel')->nullable();
            $table->string('bank_lion_parcel')->nullable();
            $table->string('nomor_bank_lion_parcel')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pengaturan');
    }
}
