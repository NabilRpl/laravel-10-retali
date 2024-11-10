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
        Schema::create('kloter', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal');
            $table->unsignedBigInteger('tourguide_id');
            $table->foreign('tourguide_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kloter');
    }
};
