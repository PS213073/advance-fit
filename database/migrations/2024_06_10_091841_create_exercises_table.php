<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void  // Definieert de up methode om de migratie uit te voeren
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('video_tutorial')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // Definieert de down methode om de migratie terug te draaien
    {
        Schema::dropIfExists('exercises');// Verwijdert de 'exercises' tabel als deze bestaat
    }
};
