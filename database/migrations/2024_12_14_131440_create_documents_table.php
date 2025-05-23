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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom du document
            $table->text('description')->nullable(); // Description facultative
            $table->string('url_fichier'); // URL publique du fichier
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Auteur du document
            $table->json('visibilite')->nullable(); // IDs des utilisateurs ayant accès
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
