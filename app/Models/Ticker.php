<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticker extends Model
{
    use HasFactory;

    protected $fillable = [
        'expediteur_id',
        'destinataire_id',
        'titre',
        'contenu',
        'statut',
    ];

    /**
     * L'expéditeur du ticket
     */
    public function expediteur()
    {
        return $this->belongsTo(User::class, 'expediteur_id');
    }

    /**
     * Le destinataire du ticket
     */
    public function destinataire()
    {
        return $this->belongsTo(User::class, 'destinataire_id');
    }
}
