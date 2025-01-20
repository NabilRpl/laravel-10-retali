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
        Schema::create('jamaah', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('name');
            $table->unsignedBigInteger('groups_id');
            $table->foreign('groups_id')->references('id')->on('groups');
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('catatan_kesehatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamaah');
    }
};
