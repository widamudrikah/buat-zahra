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
        Schema::create('kursuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_id');
            $table->string('nama_kursus');
            $table->string('slug');
            $table->integer('harga');
            $table->text('deskripsi');
            $table->string('thumbnail');
            $table->integer('kuota')->nullable();
            $table->integer('status')->default(1);

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
        Schema::dropIfExists('kursuses');
    }
};
