<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'heure_arrivee',
        'heure_depart',
        'ip_address',
        'valide',
    ];

    protected $casts = [
        'date' => 'date',
        'heure_arrivee' => 'datetime',
        'heure_depart' => 'datetime',
        'valide' => 'boolean',
    ];

    /**
     * L'utilisateur concerné par la présence
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
