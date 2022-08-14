<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPaketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_paket', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->unsigned();
            $table->string('nama_penerima')->nullable();
            $table->string('telepon_penerima')->nullable();
            $table->string('kota_penerima')->nullable();
            $table->longText('alamat_penerima')->nullable();
            $table->string('jenis_paket')->nullable();
            $table->integer('jumlah_paket')->nullable();
            $table->integer('berat_paket')->nullable();
            $table->integer('panjang_paket')->nullable();
            $table->integer('lebar_paket')->nullable();
            $table->integer('tinggi_paket')->nullable();
            $table->integer('volume_paket')->nullable();
            $table->longText('gambar_bukti_transfer')->nullable();

            $table->integer('harga')->nullable();
            $table->string('no_resi')->nullable();
            $table->longText('gambar_no_resi')->nullable();

            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_paket');
    }
}
