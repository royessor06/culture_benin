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
        Schema::create('contenus', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->longText('texte')->nullable();
            $table->foreignId('region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->foreignId('langue_id')->nullable()->constrained('langues')->onDelete('set null');
            $table->foreignId('type_contenu_id')->nullable()->constrained('type_contenus')->onDelete('set null');
            $table->foreignId('auteur_id')->nullable()->constrained('utilisateurs')->onDelete('set null');
            $table->foreignId('moderateur_id')->nullable()->constrained('utilisateurs')->onDelete('set null');
            $table->string('statut')->default('en attente');
            $table->foreignId('parent_id')->nullable()->constrained('contenus')->onDelete('set null');
            $table->timestamp('date_validation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenus');
    }
};
