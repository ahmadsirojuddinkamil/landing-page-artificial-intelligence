<?php

namespace Modules\Chat\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'receiver_id', 'title', 'body', 'room_id'];

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



    // ===========
    // START QUERY
    public static function getListRoomUuidInTicket($currentUser)
    {
        return Ticket::where('sender_id', $currentUser->id)
            ->orWhere('receiver_id', $currentUser->id)
            ->pluck('room_uuid')
            ->toArray();
    }

    public static function getLatestTicket($currentUser)
    {
        Ticket::where('sender_id', $currentUser->id)
            ->orWhere('receiver_id', $currentUser->id)
            ->latest()
            ->value('created_at');
    }

    public static function getListNotificationTicket($currentUser)
    {
        $listNotifikasi = Ticket::with('sender', 'receiver')
            ->where('sender_id', $currentUser->id)
            ->orWhere('receiver_id', $currentUser->id)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        $listNotifikasi->transform(function ($item, $key) use ($currentUser) {
            $item['is_admin'] = false;
            if ($item->sender->hasRole('admin')) {
                $item['is_admin'] = true;
            }
            return $item;
        });

        return $listNotifikasi;
    }
    // END QUERY
    // =========
}
