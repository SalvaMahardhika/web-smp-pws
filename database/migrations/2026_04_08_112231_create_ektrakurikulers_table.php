<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ekstrakurikuler', function (Blueprint $table) {
            $table->id('id_eskul'); // disesuaikan ERD

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_guru')->nullable();
            $table->foreign('id_guru')
                ->references('id_guru')
                ->on('guru')
                ->onDelete('set null');

            $table->string('nama_eskul', 30); // dari namaeskul → nama_eskul
            $table->text('deskripsi')->nullable();
            $table->string('gambar', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikuler'); // harus sama dengan up()
    }
};