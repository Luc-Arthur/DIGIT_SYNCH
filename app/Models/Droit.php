<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Droit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
    ];

    /**
     * Les utilisateurs qui ont ce droit
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'droit_user');
    }
}
