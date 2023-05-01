<form action="{{ route('ticket.reply.postAdmin', $ticket->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- penerima, pengirim, status --}}
    <div class="form-group">
        <input type="hidden" class="form-control" id="Department" name="department" value="{{ $ticket->department }}"
            readonly>

        <input type="hidden" class="form-control" id="complaint" placeholder="Example : error 404" name="complaint"
            value="{{ $ticket->complaint }}" readonly>

        <input type="hidden" class="form-control" id="priority" placeholder="Example : error 404" name="priority"
            value="{{ $ticket->priority }}" readonly>

        <input type="hidden" name="notifikasi" id="notifikasi" value="1">

        <input type="hidden" name="notif_delete" id="notif_delete" value="1">

        <input type="hidden" name="name_sender" id="name_sender" value="{{ $name_sender }}">

        <input type="hidden" name="room_uuid" id="room_uuid" value="{{ $room_uuid }}">
    </div>

    {{-- message_content --}}
    <div class="form-group">
        <label for="message_content">Message Content</label>
        <textarea name="message_content" id="message_content" cols="30" rows="10" class="form-control" required></textarea>
    </div>

    {{-- image --}}
    <div class="form-group">
        <label for="image" class="form-label">Image</label>

        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
    </div>

    {{-- video --}}
    <div class="form-group">
        <label for="video" class="form-label">Video</label>
        <input class="form-control @error('video') is-invalid @enderror" type="file" id="video" name="video">
    </div>

    {{-- document --}}
    <div class="form-group">
        <label for="document" class="form-label">Document</label>
        <input class="form-control @error('document') is-invalid @enderror" type="file" id="document"
            name="document">
    </div>

    {{-- send --}}
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Kirim</button>
    </div>
</form>
