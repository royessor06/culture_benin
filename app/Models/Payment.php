<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'contenu_id',
        'transaction_id',
        'reference',
        'amount',
        'currency',
        'status',
        'payment_method',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function contenu()
    {
        return $this->belongsTo(Contenu::class);
    }
}
