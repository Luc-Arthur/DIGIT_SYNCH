<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_produit',
        'reference',
        'description',
        'quantite',
        'prix_unitaire',
        'emplacement',
    ];

    protected $casts = [
        'quantite' => 'integer',
        'prix_unitaire' => 'decimal:2',
    ];
}
