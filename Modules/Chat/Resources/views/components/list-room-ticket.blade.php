@if ($admin['user']->hasRole($admin['role']->name))
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Department</th>
            <th scope="col">Complaint</th>
            <th scope="col">Status</th>
            <th scope="col">Time Created</th>
            <th scope="col">Nama User</th>
            <th scope="col">ACTION</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($listRoom as $l)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $l->tickets[0]->department }}</td>
                <td>{{ $l->tickets[0]->complaint }}</td>
                <td>
                    <span class="bg-{{ $l->status == 'open' ? 'info' : 'danger' }} p-2 mr-2 text-white rounded">
                        {{ $l->status }}
                    </span>
                </td>
                <td>{{ $l->tickets[0]->created_at }}</td>
                <td>{{ $l->tickets[0]->name_sender }}</td>

                <td>
                    {{-- SHOW --}}
                    <a href="{{ route('ticket.show', [$l->uuid, $l->id]) }}" class="badge bg-warning">
                        <i class="fas fa-portrait text-white"></i>
                    </a>

                    {{-- CHANGE STATUS --}}
                    <button type="button" class="badge bg-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModalStatus{{ $l->uuid }}">
                        <i class="fas fa-exclamation-circle text-white"></i>
                    </button>

                    <div class="modal fade" id="exampleModalStatus{{ $l->uuid }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                        Ubah Status
                                        Ticket?</h1>
                                </div>

                                <div class="modal-body">
                                    Apakah anda yakin untuk mengubah status
                                    ticket
                                    ini?
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal
                                    </button>

                                    <form
                                        action="{{ $l->status === 'open' ? route('ticket.status.close', $l->uuid) : route('ticket.status.open', $l->uuid) }}"
                                        method="POST" class="d-inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">Ya!</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- HAPUS --}}
                    <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModalStatus1{{ $l->uuid }}">
                        <i class="fas fa-trash text-white text-white"></i>
                    </button>

                    <div class="modal fade" id="exampleModalStatus1{{ $l->uuid }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                        Hapus
                                        Ticket?</h1>
                                </div>

                                <div class="modal-body">
                                    Apakah anda yakin untuk menghapus ticket
                                    ini?
                                    data
                                    akan
                                    terhapus permanen!
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal
                                    </button>

                                    <form action="{{ route('ticket.deleteTicketHistory', $l->uuid) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-primary">
                                            Ya Hapus!
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
@else
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Department</th>
            <th scope="col">Complaint</th>
            <th scope="col">Status</th>
            <th scope="col">Time Created</th>
            <th scope="col">ACTION</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($listRoom as $l)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $l->tickets[0]->department }}</td>
                <td>{{ $l->tickets[0]->complaint }}</td>
                <td>
                    <span class="bg-{{ $l->status == 'open' ? 'info' : 'danger' }} p-2 mr-2 text-white rounded">
                        {{ $l->status }}
                    </span>
                </td>
                <td>{{ $l->tickets[0]->created_at }}</td>

                <td>
                    {{-- SHOW --}}
                    <a href="{{ route('ticket.show', [$l->uuid, $l->id]) }}" class="badge bg-warning">
                        <i class="fas fa-portrait text-white"></i>
                    </a>

                    {{-- CHANGE STATUS --}}
                    <button type="button" class="badge bg-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModalStatus{{ $l->uuid }}">
                        <i class="fas fa-exclamation-circle text-white"></i>
                    </button>

                    <div class="modal fade" id="exampleModalStatus{{ $l->uuid }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                        Ubah Status
                                        Ticket?</h1>
                                </div>

                                <div class="modal-body">
                                    Apakah anda yakin untuk mengubah status
                                    ticket
                                    ini?
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal
                                    </button>

                                    <form
                                        action="{{ $l->status === 'open' ? route('ticket.status.close', $l->uuid) : route('ticket.status.open', $l->uuid) }}"
                                        method="POST" class="d-inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">Ya!</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- HAPUS --}}
                    <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModalStatus1{{ $l->uuid }}">
                        <i class="fas fa-trash text-white text-white"></i>
                    </button>

                    <div class="modal fade" id="exampleModalStatus1{{ $l->uuid }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                        Hapus
                                        Ticket?</h1>
                                </div>

                                <div class="modal-body">
                                    Apakah anda yakin untuk menghapus ticket
                                    ini?
                                    data
                                    akan
                                    terhapus permanen!
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal
                                    </button>

                                    <form action="{{ route('ticket.deleteTicketHistory', $l->uuid) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-primary">
                                            Ya Hapus!
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
@endif
