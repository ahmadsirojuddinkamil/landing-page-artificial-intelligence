<a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Hapus Notifikasi?</a>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Hapus
                    Notifikasi?</h1>
            </div>

            <div class="modal-body">
                Apakah anda yakin untuk menghapus semua notifikasi?
                data
                akan
                terhapus permanen!
            </div>

            {{-- action --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                @if ($admin['user']->hasRole($admin['role']->name))
                    <form action="/delete-notification" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')

                        <button type="submit" class="btn btn-primary">
                            Ya Hapus!
                        </button>
                    </form>
                @else
                    <form
                        action="{{ route('ticket.updateUserNotifDelete', ['senderId' => $message->sender_id, 'receiverId' => $message->receiver_id]) }}"
                        method="POST" class="d-inline">
                        @csrf
                        @method('PUT')

                        <button type="submit" class="btn btn-primary">
                            Ya Hapus!
                        </button>
                    </form>
                @endif

            </div>
        </div>
    </div>
</div>
