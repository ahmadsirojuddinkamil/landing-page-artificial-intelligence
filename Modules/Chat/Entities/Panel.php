<?php

namespace Modules\Chat\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panel extends Model
{
    use HasFactory;

    protected $fillable = ['name_sender', 'message_content', 'sender_id', 'receiver_id', 'created_at'];

    // ============
    // START RELASI
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function markAsRead()
    {
        $this->read_at = now();
        $this->save();
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    // END RELASI
    // ==========
}
