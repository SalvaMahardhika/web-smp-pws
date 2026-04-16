<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id('id_guru');
            $table->string('nama_guru', 35); // dari 100 → 35
            $table->string('mata_pelajaran', 30)->nullable(); // dari 100 → 30
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
        Schema::dropIfExists('guru');
    }
};