<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologie extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'Description',
        'entreprise_id',
    ];

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
}
