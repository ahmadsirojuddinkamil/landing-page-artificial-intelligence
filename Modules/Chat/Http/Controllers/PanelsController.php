<?php

namespace Modules\Chat\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Chat\Entities\Panel;
use Modules\Chat\Entities\Room;
use Modules\Chat\Http\Requests\CreateChatRequest;
use Modules\Chat\Http\Requests\ReplyChatRequest;
use Ramsey\Uuid\Uuid;

class PanelsController extends Controller
{
    public function getContactAll()
    {
        $userLatest = User::latest();

        $currentUser = Auth::user();
        $roomUuids = Panel::where('sender_id', $currentUser->id)
            ->orWhere('receiver_id', $currentUser->id)
            ->pluck('room_uuid')
            ->toArray();

        $listRoom = Room::whereIn('uuid', $roomUuids)
            ->with(['panels' => function ($query) {
                $query->latest()->get();
            }])
            ->when(request('status') == 'open', function ($query) {
                return $query->where('status', 'open');
            })
            ->when(request('status') == 'blok', function ($query) {
                return $query->where('status', 'blok');
            })
            ->when(request('search'), function ($query) {
                $query->whereHas('panels', function ($q) {
                    $q->where('name_receiver', 'like', '%' . request('search') . '%')
                        ->orWhere('name_sender', 'like', '%' . request('search') . '%');
                });
            })
            ->when(request('notifikasi'), function ($query) {
                $query->whereHas('panels', function ($q) {
                    $q->where('notifikasi', 'like', '%' . request('notifikasi') . '%');
                });
            })
            ->latest()
            ->get();

        $totalNotifChat = Panel::whereIn('room_uuid', $roomUuids)
            ->where('notifikasi', 1)
            ->groupBy('room_uuid')
            ->selectRaw('room_uuid, sum(notifikasi) as total_notifikasi')
            ->pluck('total_notifikasi', 'room_uuid');

        return response()->json([
            'listRoom' => $listRoom,
            'nameUserLogin' => $currentUser,
            'listTotalNotif' => $totalNotifChat,
        ]);
    }

    public function searchUser()
    {
        $currentUser = Auth::user();

        if (request('searchUser')) {
            $dataUser = User::latest()->where('name', 'like', '%' . request('searchUser') . '%')->get();
        }

        $panel = Panel::where(function ($query) use ($dataUser, $currentUser) {
            $query->where('sender_id', $currentUser->id)
                ->where('receiver_id', $dataUser[0]->id)
                ->orWhere('sender_id', $dataUser[0]->id)
                ->where('receiver_id', $currentUser->id);
        })
            ->first();
        $roomUuid = $panel ? $panel->room_uuid : null;

        $getUuid = Panel::where(function ($query) use ($dataUser, $currentUser) {
            $query->where('sender_id', $currentUser->id)
                ->where('receiver_id', $dataUser[0]->id)
                ->orWhere('sender_id', $dataUser[0]->id)
                ->where('receiver_id', $currentUser->id);
        })
            ->where('room_uuid', $roomUuid)
            ->latest()
            ->first();


        return response()->json([
            'findUser' => $dataUser,
            'getUuid' => $getUuid,
        ]);
    }

    public function createChat($getId)
    {
        $userNow = getUserNow();
        $uuid = Uuid::uuid4();
        $room_location = $uuid->toString();
        $nameChat = User::where('id', $getId)->get();
        $current_time = date('Y/m/d, H.i.s');

        return response()->json([
            'userNow' => $userNow,
            'room_location' => $room_location,
            'nameChat' => $nameChat,
            'current_time' => $current_time,
        ]);
    }

    public function storeChat(CreateChatRequest $request)
    {
        $validateData = $request->validated();

        $room = new Room;
        $room->uuid = $validateData['room_uuid'];
        $room->status = $validateData['status'];
        $room->save();

        $user = User::find($validateData['receiver_id']);
        $message = new Panel();

        $message->room_uuid = $validateData['room_uuid'];
        $message->name_receiver = $user->name;
        $message->name_sender = $validateData['name_sender'];
        $message->sender_id = auth()->id();
        $message->receiver_id = $validateData['receiver_id'];
        $message->message_content = $validateData['message_content'];

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image')->store('public/ticket-images');
        //     $message->image = str_replace('public/', '', $image);
        // }

        // if ($request->hasFile('video')) {
        //     $video = $request->file('video')->store('public/ticket-videos');
        //     $message->video = str_replace('public/', '', $video);
        // }

        // if ($request->hasFile('document')) {
        //     $document = $request->file('document')->store('public/ticket-documents');
        //     $message->document = str_replace('public/', '', $document);
        // }

        $message->notifikasi = $validateData['notifikasi'];
        // $message->notif_delete = $validateData['notif_delete'];

        $message->save();

        // $totalNotifikasi = Ticket::where('notifikasi', 1)
        //     ->where('notif_delete', 1)
        //     ->count();
    }

    public function replyChat(ReplyChatRequest $request)
    {
        $validateData = $request->validated();
        $userNow = getUserNow();

        // Ambil data panel pertama
        $roomUuid = $validateData['room_uuid'];
        $firstPanel = Panel::where('room_uuid', $roomUuid)->first();

        // Tentukan receiver_id berdasarkan siapa yang sedang login
        if ($firstPanel) {
            if ($firstPanel->sender_id == $userNow->id) {
                $receiverId = $firstPanel->receiver_id;
            } else {
                $receiverId = $firstPanel->sender_id;
            }
        } else {
            // Jika tidak ada data panel, artinya belum ada chat, jadi receiver_id tidak ditentukan
            $receiverId = null;
        }

        $user = User::find($receiverId);
        $message = new Panel();

        $message->room_uuid = $validateData['room_uuid'];
        $message->name_receiver = $user->name;
        $message->name_sender = $validateData['name_sender'];
        $message->sender_id = auth()->id();
        $message->receiver_id = $receiverId;
        $message->message_content = $validateData['message_content'];
        $message->created_at = $validateData['created_at'];

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image')->store('public/ticket-images');
        //     $message->image = str_replace('public/', '', $image);
        // }

        // if ($request->hasFile('video')) {
        //     $video = $request->file('video')->store('public/ticket-videos');
        //     $message->video = str_replace('public/', '', $video);
        // }

        // if ($request->hasFile('document')) {
        //     $document = $request->file('document')->store('public/ticket-documents');
        //     $message->document = str_replace('public/', '', $document);
        // }

        $message->notifikasi = $validateData['notifikasi'];
        // $message->notif_delete = $validateData['notif_delete'];

        $message->save();

        // $totalNotifikasi = Ticket::where('notifikasi', 1)
        //     ->where('notif_delete', 1)
        //     ->count();
    }

    public function showHistoryChat($uuid, $id)
    {
        $userNow = getUserNow();
        $current_time = date('Y/m/d, H.i.s');
        // $admin = getAdmin();

        $query = Panel::where('room_uuid', $uuid);

        $dataHistory = $query->oldest()->get();
        $nameChat = $query->orderBy('created_at', 'asc')->first();
        $nameReceiver = User::find($nameChat->receiver_id);

        // $statusRoom = Room::where('uuid', $uuid)->value('status');
        // $uuidChatNow = $uuid;
        // $idChatNow = $id;
        // $findLatestChat = Panel::where('room_uuid', $uuid)->latest()->first();

        Panel::where('room_uuid', $uuid)
            ->where('notifikasi', 1)
            ->update(['notifikasi' => 0]);

        return response()->json([
            'dataHistory' => $dataHistory,
            'userNow' => $userNow,
            'nameChat' => $nameChat,
            'nameReceiver' => $nameReceiver,
            'current_time' => $current_time,
        ]);
    }

    public function getNameUserNow($saveUuid)
    {
        $userNow = getUserNow();
        $getNameSender = Panel::where('room_uuid', $saveUuid)->first();

        return response()->json([
            'userNow' => $userNow->name,
            'getNameSender' => $getNameSender->name_sender,
        ]);
    }
}
