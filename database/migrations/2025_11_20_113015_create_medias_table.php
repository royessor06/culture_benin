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
        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->string('chemin');
            $table->text('description');
            $table->foreignId('contenu_id')->constrained('contenus')->onDelete('cascade');
            $table->foreignId('type_media_id')->constrained('type_medias')->onDelete('cascade');
            $table->foreignId('langue_id')->nullable()->constrained('langues')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias');
    }
};
