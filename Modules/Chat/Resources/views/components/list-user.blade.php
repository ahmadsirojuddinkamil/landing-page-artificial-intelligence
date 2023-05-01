@if ($admin['user']->hasRole($admin['role']->name))
    {{-- untuk admin --}}
    @foreach ($allUser as $index => $user)
        <tr>
            <th scope="row">
                {{ $index + $allUser->firstItem() }}
            </th>

            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>

            @if ($user->roles->implode('name', ', ') == 'admin')
                <td>{{ $user->roles->implode('name', ', ') }}</td>
            @else
                <td>user</td>
            @endif

            {{-- action --}}
            <td>
                <a href="/user/{{ $user->id }}" class="badge bg-warning">
                    <i class="fas fa-portrait text-white"></i>
                </a>

                <a href="/user/{{ $user->id }}/edit" class="badge bg-primary">
                    <i class="fas fa-edit text-white"></i>
                </a>

                <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                    data-bs-target="#exampleModal{{ $user->id }}">
                    <i class="fas fa-trash text-white"></i>
                </button>

                <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    Hapus
                                    User?</h1>
                            </div>

                            <div class="modal-body">
                                Apakah anda yakin untuk menghapus user ini? data
                                akan
                                terhapus permanen!
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                                <form action="/user/{{ $user->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf

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
@else
    {{-- untuk user biasa --}}
    <tr>
        <th>1</th>
        <td>{{ $userNow->name }}</td>
        <td>{{ $userNow->email }}</td>

        <td>
            <a href="/user/{{ $userNow->id }}" class="badge bg-warning">
                <i class="fas fa-portrait text-white"></i>
            </a>

            <a href="/user/{{ $userNow->id }}/edit" class="badge bg-primary">
                <i class="fas fa-edit text-white"></i>
            </a>

            <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                data-bs-target="#exampleModal{{ $userNow->id }}">
                <i class="fas fa-trash text-white"></i>
            </button>

            <div class="modal fade" id="exampleModal{{ $userNow->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                Hapus
                                User?</h1>
                        </div>

                        <div class="modal-body">
                            Apakah anda yakin untuk menghapus user ini? data
                            akan
                            terhapus permanen!
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                            <form action="/user/{{ $userNow->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf

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
@endif
