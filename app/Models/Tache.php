<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'assigner_par',
        'assigne_a',
        'statut',
        'date_debut',
        'date_fin',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];

    /**
     * L'utilisateur qui a assigné la tâche
     */
    public function assigner()
    {
        return $this->belongsTo(User::class, 'assigner_par');
    }

    /**
     * L'utilisateur assigné à la tâche
     */
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigne_a');
    }
}
