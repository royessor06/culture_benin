<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'texte',
        'region_id',
        'langue_id',
        'type_contenu_id',
        'auteur_id',
        'moderateur_id',
        'statut',
        'parent_id',
        'date_validation'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class);
    }

    public function typeContenu()
    {
        return $this->belongsTo(TypeContenu::class, 'type_contenu_id');
    }

    public function auteur()
    {
        return $this->belongsTo(Utilisateur::class, 'auteur_id');
    }

    public function moderateur()
    {
        return $this->belongsTo(Utilisateur::class, 'moderateur_id');
    }

    public function medias()
    {
        return $this->hasMany(Media::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function parent()
    {
        return $this->belongsTo(Contenu::class, 'parent_id');
    }

    public function enfants()
    {
        return $this->hasMany(Contenu::class, 'parent_id');
    }
}
