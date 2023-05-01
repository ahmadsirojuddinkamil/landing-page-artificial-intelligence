<a href="{{ $userNow->id == $l->receiver_id ? route('ticket.showResponse', [$l->room_uuid, $l->id]) : route('ticket.show', [$l->room_uuid, $l->id]) }}"
    class="text-dark text-decoration-none">
    <div class="d-flex">
        <div class="avatar">
            <span class="avatar-title rounded-circle border border-white bg-info">
                @if ($l->sender->roles->implode('name', ', ') == 'admin')
                    A
                @else
                    U
                @endif
            </span>
        </div>

        <div class="flex-1 ml-3 pt-1">
            <h6 class="text-uppercase fw-bold mb-1">

                @if ($l->sender->roles->implode('name', ', ') == 'admin')
                    <b>admin</b>
                @else
                    user : <b>{{ $l->sender->name }}</b>
                @endif

                @if (!$l->notifikasi)
                    <span class="text-success pl-3">respon</span>
                @else
                    <span class="text-warning pl-3">pending</span>
                @endif

            </h6>
            <span class="text-muted">
                @if (!$l->parent_id)
                    telah membuat tiket untuk
                @else
                    telah reply ticket <b>{{ $l->receiver->name }}</b>
                    untuk
                @endif

                <b>{{ $l->department }}</b> dengan complaint

                <b>{{ $l->complaint }}</b>
            </span>
        </div>

        <div class="float-right pt-1">
            <small class="text-muted">{{ $l->created_at->format('g:i A') }}</small>
        </div>
    </div>
</a>

<div class="separator-dashed"></div>
