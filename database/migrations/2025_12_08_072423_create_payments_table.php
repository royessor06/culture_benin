<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('contenu_id')->constrained()->onDelete('cascade');
            $table->string('transaction_id');
            $table->integer('amount');
            $table->string('currency', 3)->default('XOF');
            $table->enum('status', ['pending', 'approved', 'canceled', 'declined'])->default('pending');
            $table->json('metadata')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            $table->index('transaction_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
