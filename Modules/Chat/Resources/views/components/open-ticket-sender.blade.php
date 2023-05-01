<div class="ml-md-auto py-2 py-md-0">
    {{-- start untuk menghitung jumlah admin --}}
    @php
        $adminCount = 0;
    @endphp

    @foreach ($allUser as $index => $user)
        @if ($user->roles->contains('name', 'admin'))
            @php
                $adminCount++;
            @endphp
        @endif
    @endforeach
    {{-- end untuk menghitung jumlah admin --}}

    {{-- kalau admin hanya 1 --}}
    @if ($adminCount == 1)
        @foreach ($allUser as $u)
            @if ($u->roles->contains('name', 'admin'))
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="{{ route('ticket.create', $u->id) }}"
                        class="btn btn-secondary btn-round mb-2 d-flex justify-content-center text-white">
                        Open Ticket
                    </a>
                </div>
            @endif
        @endforeach
        {{-- kalau admin lebih dari 1 --}}
    @elseif ($adminCount > 1)
        <li class="nav-item dropdown hidden-caret ml-md-auto py-2 py-md-0">
            <a class="nav-link dropdown-toggle btn btn-secondary btn-round" href="#" id="messageDropdown"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Open ticket
            </a>

            <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                <li>
                    <div class="dropdown-title d-flex justify-content-between align-items-center">
                        List Admin
                    </div>
                </li>

                {{-- list admin --}}
                <li>
                    <div class="message-notif-scroll scrollbar-outer">
                        <div class="notif-center p-2">
                            @foreach ($allUser as $u)
                                @if ($u->roles->contains('name', 'admin'))
                                    <div class="ml-md-auto py-2 py-md-0">
                                        <a href="{{ route('ticket.create', $u->id) }}"
                                            class="btn btn-primary btn-round mb-2 d-flex justify-content-center text-white">{{ $u->name }}</a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
        </li>
    @else
        <a class="btn btn-secondary btn-round text-white">Tidak ada admin</a>
    @endif
</div>
