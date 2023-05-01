<form action="{{ route('ticket.storeSender') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- penerima, pengirim, status, notifikasi --}}
    <div class="form-group">
        <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $receiver_id->name }}" class="form-control"
            readonly>

        <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $receiver_id->id }}">

        <input type="hidden" name="status" id="status" value="open">
        <input type="hidden" name="notifikasi" id="notifikasi" value="1">
        <input type="hidden" name="notif_delete" id="notif_delete" value="1">
        <input type="hidden" name="name_sender" id="name_sender" value="{{ $name_sender }}">

        <input type="hidden" name="room_uuid" id="room_uuid" value="{{ $room_location }}">
    </div>

    {{-- department --}}
    <div class="form-group">
        <label for="department">Department</label>
        <select class="form-control form-control" id="department" name="department">
            <option value="Technical Support">Technical Support</option>
            <option value="Sales Department">Sales Department</option>
            <option value="Billing Support">Billing Support</option>
        </select>
    </div>

    {{-- complaint --}}
    <div class="form-group">
        <label for="complaint">Complaint</label>
        <input type="text" class="form-control" id="complaint" placeholder="Example : error 404" name="complaint"
            required>
    </div>

    {{-- message_content --}}
    <div class="form-group">
        <label for="message_content">Message Content</label>
        <textarea name="message_content" id="message_content" cols="30" rows="10" class="form-control" required
            placeholder="Example : my website is experiencing a decrease in speed"></textarea>
    </div>

    {{-- priority --}}
    <div class="form-group">
        <label for="defaultSelect">Priority</label>
        <select class="form-control form-control" id="defaultSelect" name="priority">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>
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

{{-- <script>
    const complaintInput = document.getElementById('complaint');
    const room_name = document.getElementById('room_name');

    // tambahkan event listener pada lokasi complaint
    complaintInput.addEventListener('change', (event) => {
        room_name.value = event.target.value;
    });
</script> --}}

{{-- <script>
    const complaintInput = document.getElementById('complaint');
    const judulInput = document.getElementById('judul');

    // tambahkan event listener pada lokasi complaint
    complaintInput.addEventListener('change', (event) => {
        judulInput.value = event.target.value;
    });

    const departmentInput = document.getElementById('department');
    const lokasiInput = document.getElementById('lokasi');

    // tambahkan event listener pada lokasi complaint
    departmentInput.addEventListener('change', (event) => {
        lokasiInput.value = event.target.value;
    });
</script> --}}
