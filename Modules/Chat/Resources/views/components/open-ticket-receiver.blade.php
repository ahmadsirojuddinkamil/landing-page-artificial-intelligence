<li class="nav-item dropdown hidden-caret ml-md-auto py-2 py-md-0">
    <a class="nav-link dropdown-toggle btn btn-secondary btn-round" href="#" id="messageDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Open ticket
    </a>

    <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
        <li>
            <div class="dropdown-title d-flex justify-content-between align-items-center">
                List User
            </div>
        </li>

        <li>
            <div class="message-notif-scroll scrollbar-outer">
                <div class="notif-center p-2">
                    @foreach ($allUser as $u)
                        @if ($u->id != $userNow->id)
                            <div class="notif-scroll scrollbar-outer">
                                <div class="notif-center">
                                    <a href="{{ route('ticket.create', $u->id) }}">
                                        {{-- <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div> --}}
                                        <div class="notif-content ml-3">
                                            <span class="block">
                                                {{ $u->name }}
                                            </span>
                                            {{-- <span class="time">12 minutes ago</span> --}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </li>

        <li>
            <a class="see-all" href="/tickets/inbox/list">
                See all user <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
</li>
