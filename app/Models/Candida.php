<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Candida extends Model
{
    use HasFactory,HasUuids;
    protected $fillable = [
        'resume_professionnel',
        'cv',
        'linkedin',
        'github',
        'region_id',
        'chercheur_id',
        'domaine_id',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function chercheur()
    {
        return $this->belongsTo(Chercheur::class);
    }

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
}
