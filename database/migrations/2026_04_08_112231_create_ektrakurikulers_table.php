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
        Schema::create('ektrakurikuler', function (Blueprint $table) {
            $table->id('id_ektrakurikuler');

            // Manual foreign key karena primary key di tabel users adalah 'id_user'
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                ->references('id_user') // Nama kolom di tabel users
                ->on('users')           // Nama tabel tujuan
                ->onDelete('cascade');

            $table->string('namaeskul', 150);
            $table->string('pembina', 100);
            $table->text('deskripsi');
            $table->string('gambar', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // DISESUAIKAN: Nama tabel harus sama dengan yang di fungsi up
        Schema::dropIfExists('ektrakurikuler');
    }
};