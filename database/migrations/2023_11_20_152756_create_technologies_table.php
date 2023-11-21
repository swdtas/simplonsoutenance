<?php

use App\Models\Domaine;
use App\Models\Entreprise;
use App\Models\Technologie;
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
        Schema::create('technologies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('Description');
            $table->foreignIdFor(Entreprise::class);
            $table->foreignIdFor(Domaine::class);  //domaine_id
            $table->timestamps();
        });
        Schema::create('domaine_technology', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Domaine::class);
            $table->foreignIdFor(Technologie::class);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technologies');
    }
};
