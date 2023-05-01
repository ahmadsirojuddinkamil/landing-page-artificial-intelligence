<?php

namespace Modules\Chat\Http\Controllers;

// use App\Http\Controllers\Controller;

use App\Events\NotifTicket;
use App\Events\ResponseStatusTicket;
use App\Events\ResponseTicket;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\{Auth, Storage};
use Modules\Chat\Entities\{Room, Ticket, User};
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Chat\Events\TicketStatusUpdated;
use Modules\Chat\Http\Requests\{CreateTicketRequest, ReplyTicketRequest};
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Models\Role;

class TicketController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    // method untuk view index pengirim
    public function indexSender($status = null)
    {
        // Role::create(['name' => 'admin']);
        $title = 'Dashboard | My Inbox Ticket';

        // user
        $currentUser = Auth::user();
        $user = User::all();
        getStatusTicketUser();
        $userNow = getUserNow();
        $admin = getAdmin();
        $allUser = getAllUser();

        // Room & Ticket
        $query = Ticket::where('sender_id', auth()->id());
        $messages = $query->get();
        $roomUuids = Ticket::getListRoomUuidInTicket($currentUser);
        $listRoom = Room::getRoomWithTicket($roomUuids);
        $lastUpdateTicket = Ticket::getLatestTicket($currentUser);

        // notifikasi
        $listNotifikasi = getListNotifikasi();
        $userLatest = getRole();
        $totalNotifikasi = getTotalNotifikasiUser();
        $totalNotifDelete = getTotalNotifDelete();

        return view('chat::pages.tickets.indexSender', compact('messages', 'title', 'status', 'userNow', 'admin', 'allUser', 'totalNotifikasi', 'listNotifikasi', 'user', 'totalNotifDelete', 'listRoom', 'lastUpdateTicket'));
    }

    // method untuk view admin
    public function indexReceiver($status = null)
    {
        // dd($status);

        // user
        $title = 'Dashboard | My Inbox Ticket';
        $query = Ticket::where('receiver_id', auth()->id());
        $currentUser = Auth::user();
        // getStatusTicketAdmin();
        $userNow = getUserNow();
        $admin = getAdmin();
        $allUser = User::latest()->paginate(4);
        $messages = $query->get();
        $user = User::all();

        // Ticket
        $roomUuids = Ticket::where('sender_id', $currentUser->id)
            ->orWhere('receiver_id', $currentUser->id)
            ->pluck('room_uuid')
            ->toArray();

        $listRoom = Room::whereIn('uuid', $roomUuids)
            ->with('tickets')
            ->when(request('status') == 'open', function ($query) {
                return $query->where('status', 'open');
            })
            ->when(request('status') == 'closed', function ($query) {
                return $query->where('status', 'closed');
            })
            ->latest()
            ->paginate(8);

        $lastUpdateTicket = Ticket::where('sender_id', $currentUser->id)
            ->orWhere('receiver_id', $currentUser->id)
            ->latest()
            ->value('created_at');

        // notifikasi
        $totalNotifikasi = getTotalNotifikasiAdmin();
        $listNotifikasi = getListNotifikasi();
        $totalNotifDelete = getTotalNotifDelete();
        $userLatest = getRole();

        return view('chat::pages.tickets.indexReceiver', compact('messages', 'title', 'userNow', 'status', 'admin', 'allUser', 'totalNotifikasi', 'listNotifikasi', 'user', 'totalNotifDelete', 'totalNotifDelete', 'listRoom', 'lastUpdateTicket'));
    }

    // admin karena bisa lihat semua
    public function getTicketNotif(Request $request)
    {
        $totalNotifikasi = getTotalNotifikasiUser();

        $messages = getListNotifikasi();

        $userNow = Auth::user();
        $idUserNow = getUserNow();
        $currentUser = $userNow->name;

        $user = User::find(Auth::id());
        $isAdmin = $user->hasRole('admin');

        if ($isAdmin) {
            $cekAdmin = Auth::id();
        } else {
            $cekAdmin = 'user';
        }

        return response()->json([
            'totalNotif' => $totalNotifikasi,
            'dataTicket' => $messages,
            'currentUser' => $currentUser,
            'cekAdmin' => $cekAdmin,
            'idUserNow' => $idUserNow,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(User $user)
    {
        $title = 'Dashboard | Open Ticket';
        $userNow = getUserNow();
        $admin = getAdmin();
        $allUser = getAllUser();
        $currentUser = Auth::user();
        $name_sender = $currentUser->name;

        // notifikasi
        $listNotifikasi = getListNotifikasi();
        $totalNotifikasi = getTotalNotifikasiUser();
        $userLatest = getRole();

        $uuid = Uuid::uuid4();
        $room_location = $uuid->toString();

        return view('chat::pages.tickets.create', compact('title', 'userNow', 'admin', 'allUser', 'listNotifikasi', 'totalNotifikasi', 'name_sender', 'room_location'))
            ->with('receiver_id', $user);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeSender(CreateTicketRequest $request)
    {
        // return $request;

        // kode ada di helpers
        getStoreTicket($request);

        return redirect('/tickets/sent')->with('success', 'Ticket baru berhasil dikirim');
    }

    public function storeReceiver(CreateTicketRequest $request)
    {
        // kode ada di helpers
        getStoreTicket($request);

        return redirect('/tickets/inbox')->with('success', 'Ticket baru berhasil dikirim');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    // untuk show sender
    public function show($uuid, $id)
    {
        $title = 'Dashboard | Show Ticket';
        // $message = Ticket::findOrFail($uuid);
        // $origin = '/inbox';
        $userNow = getUserNow();
        $admin = getAdmin();
        // $message->notifikasi = 0;
        // $message->save();
        // $user = User::all();

        // // Menentukan admin atau user
        // if (auth()->user()->id === $message->sender_id) {
        //     $origin = '/sent';
        // } elseif (auth()->user()->id === $message->receiver_id) {
        //     $origin = '/inbox';
        // }

        // $chat_history = getTicketHistory($message);
        // $latest_status = Ticket::latest()->pluck('status')->first();
        // $message->origin = $origin;
        // $from_page = (strpos(url()->previous(), route('ticket.indexReceiver')) !== false) ? 'inbox' : 'sent';

        // notifikasi
        $totalNotifikasi = getTotalNotifikasiUser();
        $listNotifikasi = getListNotifikasi();
        $userLatest = getRole();

        // $dataSearch = User::latest();
        // if (request('role') && request('role') == 'admin') {
        //     $dataSearch->whereHas('roles', function ($query) {
        //         $query->where('name', 'admin');
        //     });
        // }

        $ticket = Ticket::where('room_uuid', $uuid)->latest()->get();
        $statusRoom = Room::where('uuid', $uuid)->value('status');
        $uuidNow = $uuid;
        $findLatestChat = Ticket::where('room_uuid', $uuid)->latest()->first();

        return view('chat::pages.tickets.show', compact('ticket', 'title', 'admin', 'userNow', 'totalNotifikasi', 'listNotifikasi', 'statusRoom', 'uuidNow', 'findLatestChat'));
    }

    // untuk show receiver
    public function showResponse($uuid, $id)
    {
        // user
        $title = 'Dashboard | Show Ticket';
        $userNow = getUserNow();
        $admin = getAdmin();

        // notifikasi
        $totalNotifikasi = getTotalNotifikasiUser();
        $listNotifikasi = getListNotifikasi();
        $userLatest = getRole();

        // ticket & notifikasi
        $ticket = Ticket::where('room_uuid', $uuid)->latest()->get();
        $statusRoom = Room::where('uuid', $uuid)->value('status');
        $uuidNow = $uuid;
        $findLatestChat = Ticket::where('room_uuid', $uuid)->latest()->first();

        $dataOneTicket = Ticket::where('room_uuid', $uuid)
            ->where('id', $id)
            ->firstOrFail();

        if ($dataOneTicket->notifikasi == 1) {
            $dataOneTicket->notifikasi = 0;
            $dataOneTicket->save();

            $idUserNow = $userNow->id;

            $updateTotalNotifikasi = getTotalNotifikasiUser();
            $receiverTargetId = Ticket::where('room_uuid', $uuid)
                ->where('id', $id)
                ->latest()
                ->get();

            broadcast(new ResponseTicket([$updateTotalNotifikasi, $receiverTargetId[0]]));
        }

        return view('chat::pages.tickets.show', compact('ticket', 'title', 'admin', 'userNow', 'totalNotifikasi', 'listNotifikasi', 'statusRoom', 'uuidNow', 'findLatestChat'));
    }

    public function listNotification($notifikasi = null)
    {
        $title = 'Dashboard | My Notification';
        $query = Ticket::where('receiver_id', auth()->id());

        $messages = $query->get();
        $userNow = getUserNow();
        $admin = getAdmin();
        $allUser = User::latest()->paginate(4);
        $user = User::all();

        // notifikasi
        $totalNotifikasi = getTotalNotifikasiUser();
        $totalNotifDelete = getTotalNotifDelete();
        $listNotifikasi = getListNotifikasiPagination();
        $userLatest = getRole();
        $totalPagination = getTotalNotifikasiUser();

        if (request('notifikasi') == '1') {
            $listNotifikasi = getListNotifikasiPending();
        } elseif (request('notifikasi') == '0') {
            $listNotifikasi = getListNotifikasiRespon();
        }

        $currentUser = Auth::user();
        $listNotifikasiDefault = Ticket::with('sender', 'receiver')
            ->where(function ($query) use ($currentUser) {
                $query->where('sender_id', $currentUser->id)
                    ->orWhere('receiver_id', $currentUser->id);
            })
            ->where('notif_delete', 1)
            ->where(function ($query) {
                $query->where('notifikasi', 1)
                    ->orWhere('notifikasi', 0);
            })
            ->where('sender_id', $userNow->id)
            ->orderBy('created_at', 'desc')
            ->latest()
            ->get();

        // dd($listNotifikasiDefault);

        return view('chat::pages.tickets.listNotification', compact('messages', 'title', 'notifikasi', 'userNow', 'admin', 'allUser', 'totalNotifikasi', 'listNotifikasi', 'user', 'totalNotifDelete', 'totalPagination'));
    }

    public function updateStatus($uuidNow, Request $request)
    {
        $room = Room::with('tickets')->where('uuid', $uuidNow)->firstOrFail();

        $userNow = getUserNow();

        $titleTicket = $room->tickets[0]->complaint;

        if ($room->tickets[0]->sender_id == $userNow->id) {
            $imReceiver = $room->tickets[0]->receiver_id;
        } else {
            $imReceiver = $room->tickets[0]->sender_id;
        }

        if ($request->is('ticket/*/status/close')) {
            $room->status = 'closed';
        } elseif ($request->is('ticket/*/status/open')) {
            $room->status = 'open';
        }

        $room->save();

        broadcast(new ResponseStatusTicket([$room->status, $imReceiver, $titleTicket]));
        // broadcast(new TicketStatusUpdated([$room->status, $imReceiver, $titleTicket]));

        return back()->with('success', 'Status ticket berhasil diubah');
    }

    public function showReplyForm($uuidNow, $ticketId)
    {
        $title = 'Dashboard | My Ticket Reply';
        // $ticket = $ticket;
        $ticket = Ticket::find($ticketId);
        $userNow = getUserNow();
        $admin = getAdmin();

        $userNow = Auth::user();
        $name_sender = $userNow->name;
        $room_uuid = $ticket->room_uuid;

        // notifikasi
        $listNotifikasi = getListNotifikasi();
        $userLatest = getRole();
        $totalNotifikasi = getTotalNotifikasiUser();

        return view('chat::pages.tickets.reply', compact('title', 'ticket', 'userNow', 'admin', 'listNotifikasi', 'totalNotifikasi', 'name_sender', 'room_uuid'));
    }

    public function showReplyFormAdmin($uuidNow, $ticketId)
    {
        // dd($ticketId);

        $title = 'Dashboard | My Ticket Reply';
        $ticket = Ticket::find($ticketId);
        $userNow = getUserNow();
        $admin = getAdmin();

        $userNow = Auth::user();
        $name_sender = $userNow->name;
        $room_uuid = $ticket->room_uuid;

        // notifikasi
        $listNotifikasi = getListNotifikasi();
        $userLatest = getRole();
        $totalNotifikasi = getTotalNotifikasiUser();

        return view('chat::pages.tickets.replyAdmin', compact('title', 'ticket', 'userNow', 'admin', 'listNotifikasi', 'totalNotifikasi', 'name_sender', 'room_uuid'));
    }

    // untuk USER
    public function reply(ReplyTicketRequest $request, $id)
    {
        $validateData = $request->validated();

        $userNow = User::find(Auth::id());
        $isAdmin = $userNow->hasRole('admin');
        $currentUser = $userNow->name;

        if ($isAdmin) {
            $cekAdmin = 'admin';
        } else {
            $cekAdmin = $currentUser;
        }

        $parent_message = Ticket::findOrFail($id);
        $message = new Ticket;
        $message->sender_id = auth()->id();
        $message->room_uuid = $validateData['room_uuid'];

        $message->receiver_id = $parent_message->sender_id === auth()->id() ? $parent_message->receiver_id : $parent_message->sender_id;

        $message->department = $validateData['department'];
        $message->complaint = $validateData['complaint'];
        $message->message_content = $validateData['message_content'];
        $message->priority = $validateData['priority'];
        $message->notifikasi = $validateData['notifikasi'];
        $message->name_sender = $cekAdmin;

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

        $message->parent_id = $parent_message->id;
        $message->save();

        $totalNotifikasi = Ticket::where('notifikasi', 1)
            ->where('notif_delete', 1)
            ->count();

        broadcast(new NotifTicket([$totalNotifikasi, $message]));

        return redirect()->route('ticket.indexSender')->with('success', 'Pesan berhasil dikirim');
    }

    // untuk ADMIN
    public function replyAdmin(ReplyTicketRequest $request, $id)
    {
        // return $request;

        $validateData = $request->validated();

        $userNow = User::find(Auth::id());
        $isAdmin = $userNow->hasRole('admin');
        $currentUser = $userNow->name;

        if ($isAdmin) {
            $cekAdmin = 'admin';
        } else {
            $cekAdmin = $currentUser;
        }

        $parent_message = Ticket::findOrFail($id);
        $message = new Ticket;
        $message->sender_id = auth()->id();
        $message->room_uuid = $validateData['room_uuid'];

        $message->receiver_id = $parent_message->sender_id === auth()->id() ? $parent_message->receiver_id : $parent_message->sender_id;

        $message->department = $validateData['department'];
        $message->complaint = $validateData['complaint'];
        $message->message_content = $validateData['message_content'];
        $message->priority = $validateData['priority'];
        $message->notifikasi = $validateData['notifikasi'];
        // $message->name_sender = $validateData['name_sender'];
        $message->name_sender = $cekAdmin;

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

        $message->parent_id = $parent_message->id;
        $message->save();

        $totalNotifikasi = Ticket::where('notifikasi', 1)
            ->where('notif_delete', 1)
            ->count();

        broadcast(new NotifTicket([$totalNotifikasi, $message]));

        return redirect()->route('ticket.indexReceiver')->with('success', 'Pesan berhasil dikirim');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('chat::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */

    public function deleteTicketHistory($uuid)
    {
        // return $uuid;

        // $getUserChat = Ticket::where(function ($query) use ($senderId, $receiverId) {
        //     $query->where('sender_id', $senderId)
        //         ->where('receiver_id', $receiverId);
        // })->orWhere(function ($query) use ($senderId, $receiverId) {
        //     $query->where('sender_id', $receiverId)
        //         ->where('receiver_id', $senderId);
        // });

        // $tickets = $getUserChat->get();

        // foreach ($tickets as $ticket) {
        //     if ($ticket->image) {
        //         Storage::delete('public/' . $ticket->image);
        //     }
        // }

        // $tickets = $getUserChat->delete();

        // $room = Room::where('uuid', $uuid)->firstOrFail();
        // Storage::delete($room->attachment);

        // dd($uuid);

        $dataHapus = Ticket::where('room_uuid', $uuid)->get();
        foreach ($dataHapus as $data) {
            // Hapus gambar jika ada
            if ($data->image) {
                Storage::delete('public/' . $data->image);
            }

            $data->delete();
        }

        Ticket::where('room_uuid', $uuid)->delete();
        Room::where('uuid', $uuid)->delete();

        return redirect()->back()->with('success', 'Riwayat chat berhasil dihapus!');
    }

    // untuk admin
    public function updateAllNotifDelete()
    {
        try {
            // Ticket::whereNotNull('id')->update(['notif_delete' => 0]);

            Ticket::whereNotNull('id')->update([
                'notif_delete' => 0,
                'notifikasi' => 0,
            ]);

            return back()->with('success', 'Notifikasi berhasil dihapus');
        } catch (Exception $e) {
            return back()->withErrors(['msg' => 'Terjadi kesalahan dalam menghapus notifikasi']);
        }
    }

    // untuk user
    public function updateUserNotifDelete($senderId, $receiverId)
    {
        try {
            Ticket::where(function ($query) use ($senderId, $receiverId) {
                $query->where('sender_id', $senderId)
                    ->where('receiver_id', $receiverId);
            })->orWhere(function ($query) use ($senderId, $receiverId) {
                $query->where('sender_id', $receiverId)
                    ->where('receiver_id', $senderId);
            })->update(['notif_delete' => 0, 'notifikasi' => 0,]);

            return back()->with('success', 'Notifikasi berhasil dihapus');
        } catch (Exception $e) {
            return back()->withErrors(['msg' => 'Terjadi kesalahan dalam menghapus notifikasi']);
        }
    }
}
