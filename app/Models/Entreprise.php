<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory,HasUuids;

    protected $fillable = [
        'nom',
        'description',
        'adresse',
        'site_web',
        'date_creation',
        'user_id',
        'region_id',
        'logo',
        'statut',
    ];

    protected $casts = [
        'date_creation' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function domaines()
    {
        return $this->belongsToMany(Domaine::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technologie::class, 'domaine_technologie', 'domaine_id', 'technologie_id');
    }

    public function offres():HasMany
    {
        return $this->hasMany(Offre::class);
    }
}
