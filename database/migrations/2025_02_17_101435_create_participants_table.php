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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('tontine_id'); // ✅ Ajouté pour la clé étrangère
            $table->date('dateNaissance');
            $table->string('cni')->unique();
            $table->string('adresse');
            $table->string('imageCni')->nullable();
            $table->timestamps();

            // Définir les clés étrangères
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tontine_id')->references('id')->on('tontines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
