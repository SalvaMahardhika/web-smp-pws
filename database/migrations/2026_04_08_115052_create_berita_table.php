<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint; // Pastikan ini ter-import
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ganti 'Table $table' menjadi 'Blueprint $table'
        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita'); 
            $table->integer('id_user'); 
            $table->string('judul', 200);
            $table->text('isi');
            $table->string('gambar', 255);
            $table->date('tanggal');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};