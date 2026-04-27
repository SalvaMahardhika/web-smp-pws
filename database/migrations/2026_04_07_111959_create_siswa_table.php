<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa'); 
            $table->string('kelas', 3); // dari 10 → 3
            $table->integer('jumlah_siswa');
            $table->integer('jumlah_laki');
            $table->integer('jumlah_perempuan');
            $table->unsignedBigInteger('id_user')->nullable(); 
            $table->timestamps();
            $table->foreign('id_user')
                  ->references('id_user')
                  ->on('users')
                  ->onDelete('set null'); // tetap seperti punyamu
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};