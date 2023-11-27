<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offres extends Model
{
    use HasFactory,HasUuids;
    protected $fillable = [
        'titre',
        'description',
        'Profile',
        'entreprise_id',
    ];
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
}
