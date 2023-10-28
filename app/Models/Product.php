<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; // Ajout de l'import pour Storage
use Illuminate\Support\Str; // Ajout de l'import pour Str


class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'nom_product', 'prix_product', 'description_product', 'image_product', 'categorie_id'];    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function getImageProductUrlAttribute()
    {
        if ($this->image_product) {
            return Storage::url($this->image_product);
        }
        return null;
    }

    public function categorie()
    {
        return $this->belongsTo(Category::class, 'categorie_id', 'id');
       
    }
    
}
