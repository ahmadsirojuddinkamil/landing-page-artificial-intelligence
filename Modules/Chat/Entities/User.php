<?php

namespace Modules\Chat\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory;
    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected array $guard_name = ['api', 'web'];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function sentPanels()
    {
        return $this->hasMany(Panel::class, 'sender_id');
    }

    public function receivedPanels()
    {
        return $this->hasMany(Panel::class, 'receiver_id');
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
}
