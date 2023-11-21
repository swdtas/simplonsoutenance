<?php

use App\Models\Chercheur;
use App\Models\Domaine;
use App\Models\Region;
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
        Schema::create('candidats', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('resume_professionnel')->nullable();
            $table->string('cv')->nullable();
            $table->string('lettre')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->foreignIdFor(Region::class);  //region_id
            $table->foreignIdFor(Chercheur::class);
            $table->foreignIdFor(Domaine::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
