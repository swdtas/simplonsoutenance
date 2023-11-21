<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chercheur extends Model
{
    use HasFactory,HasUuids;
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'date_naissance',
        'genre',
        'telephone',
        'email',
        'statut_matrimonial',
        'user_id',
        'photo',
        'statut',
    ];
    protected $casts = [
        'date_naissance' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function candidats()
    {
        return $this->hasMany(Candidat::class);
    }
}
