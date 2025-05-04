<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gerants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('tontine_id'); // Ajoute cette ligne pour la colonne tontine_id
            $table->date('dateNaissance');
            $table->string('cni')->unique();
            $table->string('adresse');            $table->string('imageCni')->nullable();
            $table->timestamps();

            // Déclaration de la clé étrangère
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tontine_id')->references('id')->on('tontines')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gerants');
    }
};
