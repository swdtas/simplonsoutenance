<?php

use App\Models\User;
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
        Schema::create('chercheurs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->date('date_naissance')->nullable();
            $table->string('genre')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->unique();
            $table->string('statut_matrimonial')->nullable();
            $table->foreignIdFor(User::class); //user_id
            $table->string('photo')->nullable();
            $table->enum('statut', [ 'en attente','valide', 'refuse'])->default('en attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chercheurs');
    }
};
