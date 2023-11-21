<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'nom',
    ];
public function technologies()
{
    return $this->belongsToMany(Technologie::class, 'domaine_technologie', 'domaine_id', 'technologie_id');
}
 public function candidats():HasMany
    {
        return $this->hasMany(Candidat::class);
    }
}
