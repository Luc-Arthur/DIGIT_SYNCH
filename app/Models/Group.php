<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_by',
    ];

    /**
     * L'utilisateur qui a créé le groupe
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Les utilisateurs membres du groupe
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user');
    }

    /**
     * Les messages du groupe
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
