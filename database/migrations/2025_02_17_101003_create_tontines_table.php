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
        Schema::create('tontines', function (Blueprint $table) {
            $table->id();
            $table->enum('frequence',
            [
                'JOURNALIERE',
                'HEBDOMADAIRE',
                'MENSUEL'
            ]);
            $table->string('libelle');
            $table->date('dateDeb');
            $table->date('dateFin');
            $table->text('description');
            $table->integer('montantTotal');
            $table->integer('nbr_participant');
            $table->integer('montantBase');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tontines');
    }
};
