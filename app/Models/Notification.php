<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message_id',
        'statut',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * L'utilisateur destinataire de la notification
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Le message lié à la notification
     */
    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
