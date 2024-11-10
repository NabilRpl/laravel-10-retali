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
        Schema::create('tugas_ceklis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('tugas_type');
            $table->string('tasks');
            $table->text('title');
            $table->unsignedBigInteger('kloter_id');
            $table->foreign('kloter_id')->references('id')->on('kloter');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persiapan_keberangkatan');
    }
};
