<?php

use App\Models\Region;
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
        Schema::create('entreprises', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nom')->unique();
            $table->text('description');
            $table->string('adresse');
            $table->string('site_web');
            $table->date('date_creation')->nullable();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Region::class)->constrained();  //region_id
            $table->string('logo')->nullable();
            $table->enum('statut', [ 'en attente','valide', 'refuse'])->default('en attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
