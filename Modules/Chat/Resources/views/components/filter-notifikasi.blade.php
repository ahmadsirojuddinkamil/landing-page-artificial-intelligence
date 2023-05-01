<form method="GET" action="{{ route('ticket.cekNotif') }}" class="mb-3 form-group d-inline-flex align-items-center">
    <label for="filter-notifikasi" class="form-label mr-2">Filter :</label>
    <select name="notifikasi" id="filter-notifikasi" class="form-control w-auto" onchange="this.form.submit()">
        <option value="">All</option>
        <option value="1" {{ request('notifikasi') == 1 ? 'selected' : '' }}>Pending</option>
        <option value="0" {{ request('notifikasi') == 0 ? 'selected' : '' }}>Respon</option>
    </select>
</form>
