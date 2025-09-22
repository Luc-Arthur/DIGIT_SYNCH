<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'group_id',
        'receiver_id',
        'content',
        'file_path',
        'file_type',
        'file_size',
        'status',
    ];

    protected $casts = [
        'file_size' => 'integer',
    ];

    /**
     * L'expéditeur du message
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Le destinataire du message (pour les messages privés)
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    /**
     * Le groupe destinataire (pour les messages de groupe)
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Les notifications liées à ce message
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
