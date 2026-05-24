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
        Schema::create('resource_kits', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Ex: "Affiche Officielle C4 - Format A3"
            $table->string('slug',191)->unique(); // Pour des URLs propres
            $table->text('description')->nullable(); // Brève explication du contenu
            
            // Type de ressource pour le filtrage (Réseaux Sociaux, Print, Référence)
            $table->string('type')->default('social_media'); 
            
            $table->string('file_path'); // Chemin vers le fichier (PDF, PNG, etc.)
            $table->string('thumbnail_path')->nullable(); // Image d'aperçu pour la carte UI
            $table->string('file_size')->nullable(); // Ex: "2.4 Mo" (pour rassurer sur la data)
            
            $table->unsignedBigInteger('download_count')->default(0); // Compteur de clics
            $table->boolean('is_active')->default(true); // Pour masquer/publier rapidement
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resource_kits');
    }
};