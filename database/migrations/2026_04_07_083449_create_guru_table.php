<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guru', function (Blueprint $table) {

            // primary key
            $table->id('id_guru');

            // field utama
            $table->string('nama_guru', 100);
            $table->string('mata_pelajaran', 100)->nullable();

            // relasi ke users (boleh null)
            $table->unsignedBigInteger('id_user')->nullable();

            // timestamps
            $table->timestamps();

            // optional: foreign key (kalau mau dipakai)
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};