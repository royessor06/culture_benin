<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';

    protected $fillable = [
        'chemin',
        'description',
        'contenu_id',
        'type_media_id',
        'langue_id'
    ];

    public function contenu()
    {
        return $this->belongsTo(Contenu::class);
    }

    public function typeMedia()
    {
        return $this->belongsTo(TypeMedia::class, 'type_media_id');
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class);
    }
}
