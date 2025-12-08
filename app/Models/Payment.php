<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'contenu_id', 'transaction_id',
        'amount', 'currency', 'status', 'metadata', 'paid_at'
    ];

    protected $casts = [
        'metadata' => 'array',
        'paid_at' => 'datetime'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function contenu()
    {
        return $this->belongsTo(Contenu::class);
    }

    public function premiumAccess()
    {
        return $this->hasOne(PremiumAccess::class);
    }

    public function isSuccessful()
    {
        return $this->status === 'approved';
    }
}
