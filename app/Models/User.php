<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Les groupes créés par l'utilisateur
     */
    public function createdGroups()
    {
        return $this->hasMany(Group::class, 'created_by');
    }

    /**
     * Les groupes dont l'utilisateur est membre
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user');
    }

    /**
     * Les droits de l'utilisateur
     */
    public function droits()
    {
        return $this->belongsToMany(Droit::class, 'droit_user');
    }

    /**
     * Les messages envoyés par l'utilisateur
     */
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    /**
     * Les messages reçus par l'utilisateur (messages privés)
     */
    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    /**
     * Les tâches assignées par l'utilisateur
     */
    public function assignedTasks()
    {
        return $this->hasMany(Tache::class, 'assigner_par');
    }

    /**
     * Les tâches assignées à l'utilisateur
     */
    public function tasks()
    {
        return $this->hasMany(Tache::class, 'assigne_a');
    }

    /**
     * Les tickets créés par l'utilisateur (expéditeur)
     */
    public function sentTickets()
    {
        return $this->hasMany(Ticker::class, 'expediteur_id');
    }

    /**
     * Les tickets reçus par l'utilisateur (destinataire)
     */
    public function receivedTickets()
    {
        return $this->hasMany(Ticker::class, 'destinataire_id');
    }

    /**
     * Les présences de l'utilisateur
     */
    public function presences()
    {
        return $this->hasMany(Presence::class);
    }

    /**
     * Les notifications de l'utilisateur
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
