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
        Schema::create('pembangunans', function (Blueprint $table) {
            $table->id();
            $table->string('rancangan');
            $table->string('jasa');
            $table->string('penanggungjawab');
            $table->string('tanggal');
            $table->string('estimasi');
            $table->decimal('jumlah',18, 2);
            $table->decimal('realisasi',18, 2);
            $table->decimal('lebihkurang',18, 2);
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembangunans');
    }
};
