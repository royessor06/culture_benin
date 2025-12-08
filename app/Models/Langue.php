<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'code',
        'description'];

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class);
    }

    public function contenus()
    {
        return $this->hasMany(Contenu::class);
    }

    public function regions()
    {
        return $this->belongsToMany(Region::class, 'parler');
    }
}
