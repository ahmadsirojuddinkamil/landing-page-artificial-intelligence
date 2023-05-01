<form action="{{ route('ticket.storeReceiver') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- penerima, pengirim, status --}}
    <div class="form-group">
        {{-- <label for="receiver_id">Penerima</label> --}}
        <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $receiver_id->name }}" class="form-control"
            readonly>
        <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $receiver_id->id }}">

        <input type="hidden" name="status" id="status" value="open">
        <input type="hidden" name="notifikasi" id="notifikasi" value="1">
        <input type="hidden" name="notif_delete" id="notif_delete" value="1">
    </div>

    {{-- department --}}
    <div class="form-group">
        <label for="defaultSelect">Department</label>
        <select class="form-control form-control" id="defaultSelect" name="department">
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

    {{-- send --}}
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Kirim</button>
    </div>
</form>
