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
        Schema::create('courriers', function (Blueprint $table) {
            $table->id();
            $table->string('motif');
            $table->text('contenu');
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade'); // Expéditeur
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade'); // Destinataire
            $table->string('fichier_joint')->nullable(); // Chemin du fichier joint
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courriers');
    }
};
