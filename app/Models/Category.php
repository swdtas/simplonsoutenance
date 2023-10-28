<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'nom_categorie'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });

    }
        public function products()
    {
        return $this->hasMany(Product::class, 'categorie_id');
    }

    public function getImageCategorieUrlAttribute()
    {
        if ($this->image_categorie) {
            return Storage::url($this->image_categorie);
        }
        return null;
    }

        public static function getCategorieUUID($categorieId)
    {
        return Category::where('id', $categorieId)->value('id');
    }

}
