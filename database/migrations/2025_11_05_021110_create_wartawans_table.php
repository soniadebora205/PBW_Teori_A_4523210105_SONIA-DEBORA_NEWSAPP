<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

# record buat history tabel
return new class extends Migration
{
    /**
     * Run the migrations. UP jalan pas migrasi baru. Istilahnya table wartawans ini tercipta di database
     */
    public function up(): void
    {
        Schema::create('wartawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. DOWN jalan pas rollback. Istilahnya table wartawans ini dihapus dari database
     */
    public function down(): void
    {
        Schema::dropIfExists('wartawans');
    }
};

