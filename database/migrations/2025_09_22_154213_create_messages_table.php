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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade'); // Expéditeur
            $table->foreignId('group_id')->nullable()->constrained('groups')->onDelete('cascade'); // Message de groupe
            $table->foreignId('receiver_id')->nullable()->constrained('users')->onDelete('cascade'); // Message privé

            // Contenu
            $table->text('content')->nullable(); // Message texte
            $table->string('file_path')->nullable(); // Chemin du fichier (image, doc, audio...)
            $table->enum('file_type', ['image', 'video', 'audio', 'document'])->nullable(); // Type du fichier
            $table->integer('file_size')->nullable(); // Taille en Ko

            // Statut
            $table->enum('status', ['sent', 'delivered', 'read'])->default('sent'); // Statut du message

            // Horodatage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
