<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita'); 
            $table->unsignedBigInteger('id_user'); // dari integer → unsignedBigInteger
            $table->foreign('id_user')
                  ->references('id_user')
                  ->on('users')
                  ->onDelete('cascade');

            $table->string('judul', 30); // dari 200 → 30
            $table->text('isi');
            $table->string('gambar', 30); // dari 255 → 30
            $table->date('tanggal');

            // tambahan dari ERD
            $table->boolean('status')->default(1);

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