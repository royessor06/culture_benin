<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'population',
        'superficie',
        'localisation'];

    public function contenus()
    {
        return $this->hasMany(Contenu::class);
    }

    public function langues()
    {
        return $this->belongsToMany(Langue::class, 'parler');
    }
}
