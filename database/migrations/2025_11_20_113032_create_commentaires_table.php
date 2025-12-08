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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->text('texte');
            $table->tinyInteger('note')->nullable();
            $table->unsignedBigInteger('utilisateur_id')->nullable();
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs')->onDelete('set null');
            $table->unsignedBigInteger('contenu_id')->nullable();
            $table->foreign('contenu_id')->references('id')->on('contenus')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};
