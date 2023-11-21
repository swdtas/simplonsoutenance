<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'nom',
    ];
    public function entreprise(): HasMany
    {
        return $this->hasMany(Entreprise::class);
    }
    public function candidats():HasOne
    {
        return $this->hasOne(Candidat::class);
    }
}
