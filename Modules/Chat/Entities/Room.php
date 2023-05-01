<?php

namespace Modules\Chat\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['uuid'];

    // ============
    // START RELASI
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'room_uuid', 'uuid');
    }

    public function panels()
    {
        return $this->hasMany(Panel::class, 'room_uuid', 'uuid');
    }
    // END RELASI
    // ==========



    // ===========
    // START QUERY
    public static function getRoomWithTicket($roomUuids)
    {
        return Room::whereIn('uuid', $roomUuids)
            ->with('tickets')
            ->when(request('status') == 'open', function ($query) {
                return $query->where('status', 'open');
            })
            ->when(request('status') == 'closed', function ($query) {
                return $query->where('status', 'closed');
            })
            ->latest()
            ->paginate(8);
    }
    // END QUERY
    // =========
}
