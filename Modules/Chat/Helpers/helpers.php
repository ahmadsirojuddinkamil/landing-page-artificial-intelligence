<?php

use App\Events\NotifTicket;
use Illuminate\Support\Facades\Auth;
use Modules\Chat\Entities\Room;
use Modules\Chat\Entities\Ticket;
use Modules\Chat\Entities\User;
use Modules\Chat\Entities\User as EntitiesUser;
use Modules\Chat\Events\TicketCreatedReply;
use Modules\Chat\Http\Requests\CreateTicketRequest;
use Spatie\Permission\Models\Role;

// ===================
// start componen user
if (!function_exists('getUserNow')) {
    function getUserNow()
    {
        return EntitiesUser::find(Auth::user()->id);
    }
}

if (!function_exists('getAdmin')) {
    function getAdmin()
    {
        return [
            'user' => EntitiesUser::find(Auth::user()->id),
            'role' => Role::where('name', 'admin')->first(),
        ];
    }
}

if (!function_exists('getAllUser')) {
    function getAllUser()
    {
        return EntitiesUser::latest()->get();
    }
}
// end componen user
// =================

// ====================
// start componen ticket
if (!function_exists('getStatusNotifAdmin')) {
    function getStatusNotifAdmin($notifikasi = null)
    {
        $query = Ticket::where('receiver_id', auth()->id());

        if (!is_null($notifikasi) && $notifikasi != 'all') {
            $query->where('notifikasi', $notifikasi);
        }
    }
}

if (!function_exists('getStatusTicketAdmin')) {
    function getStatusTicketAdmin($status = null)
    {
        $query = Ticket::where('receiver_id', auth()->id());

        if (!is_null($status) && $status != 'all') {
            $query->where('status', $status);
        }
    }
}

if (!function_exists('getStatusTicketUser')) {
    function getStatusTicketUser($status = null)
    {
        $query = Ticket::where('sender_id', auth()->id());

        if (!is_null($status) && $status != 'all') {
            $query->where('status', $status);
        }
    }
}

if (!function_exists('getStoreTicket')) {
    function getStoreTicket(CreateTicketRequest $request)
    {
        $validateData = $request->validated();

        // $room = Room::firstOrCreate(['uuid' => $validateData['room_id']]);

        $room = new Room;
        $room->uuid = $validateData['room_uuid'];
        $room->status = $validateData['status'];
        $room->save();

        $message = new Ticket;
        $message->room_uuid = $validateData['room_uuid'];
        $message->name_sender = $validateData['name_sender'];
        $message->sender_id = auth()->id();
        $message->receiver_id = $validateData['receiver_id'];
        $message->department = $validateData['department'];
        $message->complaint = $validateData['complaint'];
        $message->message_content = $validateData['message_content'];
        $message->priority = $validateData['priority'];

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/ticket-images');
            $message->image = str_replace('public/', '', $image);
        }

        if ($request->hasFile('video')) {
            $video = $request->file('video')->store('public/ticket-videos');
            $message->video = str_replace('public/', '', $video);
        }

        if ($request->hasFile('document')) {
            $document = $request->file('document')->store('public/ticket-documents');
            $message->document = str_replace('public/', '', $document);
        }

        $message->notifikasi = $validateData['notifikasi'];
        $message->notif_delete = $validateData['notif_delete'];

        $message->save();

        $totalNotifikasi = Ticket::where('notifikasi', 1)
            ->where('notif_delete', 1)
            ->count();

        broadcast(new NotifTicket([$totalNotifikasi, $message]));
        // broadcast(new TicketCreatedReply([$totalNotifikasi, $message]));
    }
}

if (!function_exists('getTicketHistory')) {
    function getTicketHistory($message)
    {
        $chat_history = Ticket::where(function ($query) use ($message) {
            $query->where('sender_id', $message->sender_id)
                ->where('receiver_id', $message->receiver_id);
        })->orWhere(function ($query) use ($message) {
            $query->where('sender_id', $message->receiver_id)
                ->where('receiver_id', $message->sender_id);
        })->orderBy('created_at', 'desc')->get();

        return $chat_history;
    }
}
// end componen ticket
// ===================

// ====================
// start componen notifikasi
if (!function_exists('getListNotifikasi')) {
    function getListNotifikasi()
    {
        $currentUser = Auth::user();
        $listNotifikasi = Ticket::getListNotificationTicket($currentUser);
        return $listNotifikasi;
    }
}

if (!function_exists('getListNotifikasiPagination')) {
    // mengambil semua data notifikasi lalu diberikan pagination
    function getListNotifikasiPagination()
    {
        $currentUser = Auth::user();
        $listNotifikasi = Ticket::with('sender', 'receiver')
            ->where(function ($query) use ($currentUser) {
                $query->where('sender_id', $currentUser->id)
                    ->orWhere('receiver_id', $currentUser->id);
            })
            ->where('notif_delete', 1)
            ->where(function ($query) {
                $query->where('notifikasi', 1)
                    ->orWhere('notifikasi', 0);
            })
            ->orderBy('created_at', 'desc')
            ->latest()
            ->paginate(4);

        return $listNotifikasi;
    }
}

if (!function_exists('getListNotifikasiPending')) {
    // kalau notifikasi nilai nya 1 tampilin pending
    function getListNotifikasiPending()
    {
        $currentUser = Auth::user();
        $listNotifikasi = Ticket::with('sender', 'receiver')
            ->where(function ($query) use ($currentUser) {
                $query->where('sender_id', $currentUser->id)
                    ->orWhere('receiver_id', $currentUser->id);
            })
            ->where('notif_delete', 1)
            ->where('notifikasi', 1)
            ->orderBy('created_at', 'desc')
            ->latest()
            ->paginate(4);

        $listNotifikasi->appends(['notifikasi' => request('notifikasi')]);

        return $listNotifikasi;
    }
}

if (!function_exists('getListNotifikasiRespon')) {
    // kalau notifikasi nilai nya 1 tampilin respon
    function getListNotifikasiRespon()
    {
        $currentUser = Auth::user();
        $listNotifikasi = Ticket::with('sender', 'receiver')
            ->where(function ($query) use ($currentUser) {
                $query->where('sender_id', $currentUser->id)
                    ->orWhere('receiver_id', $currentUser->id);
            })
            ->where('notif_delete', 1)
            ->where('notifikasi', 0)
            ->orderBy('created_at', 'desc')
            ->latest()
            ->paginate(4);

        $listNotifikasi->appends(['notifikasi' => request('notifikasi')]);

        return $listNotifikasi;
    }
}

if (!function_exists('getRole')) {
    function getRole()
    {
        $userLatest = User::latest();
        if (request('role') && request('role') == 'admin') {
            $userLatest->whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            });
        }

        return $userLatest;
    }
}

if (!function_exists('getTotalNotifikasiAdmin')) {
    function getTotalNotifikasiAdmin()
    {
        // query untuk mengambil jumlah data yang memenuhi kriteria notif_delete = 1
        $totalNotifikasi = Ticket::where('notifikasi', 1)
            ->where('notif_delete', 1)
            ->count();

        return $totalNotifikasi;
    }
}

if (!function_exists('getTotalNotifikasiUser')) {
    function getTotalNotifikasiUser()
    {
        $currentUser = Auth::user();
        $totalNotifikasi = Ticket::where('notifikasi', 1)
            ->where(function ($query) use ($currentUser) {
                $query->where('receiver_id', $currentUser->id)
                    ->orWhere('sender_id', $currentUser->id);
            })
            ->count();

        return $totalNotifikasi;
    }
}

if (!function_exists('getTotalNotifDelete')) {
    function getTotalNotifDelete()
    {
        $currentUser = Auth::user();
        $totalNotifDelete = Ticket::where('notif_delete', 1)
            ->where(function ($query) use ($currentUser) {
                $query->where('sender_id', $currentUser->id)
                    ->orWhere('receiver_id', $currentUser->id);
            })
            ->count();

        return $totalNotifDelete;
    }
}
// end componen notifikasi
// ===================