<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tontine_participant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idTontine')->constrained('tontines')->onDelete('cascade');
            $table->foreignId('idUser')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::table('tontines', function (Blueprint $table) {
            $table->softDeletes(); // Ajoute la colonne deleted_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tontine_participant');
    }
};
