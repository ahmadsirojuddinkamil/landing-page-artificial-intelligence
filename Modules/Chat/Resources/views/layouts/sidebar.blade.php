<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">

            <ul class="nav nav-primary">
                {{-- dashboard --}}
                <li class="nav-item nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
                    <a href="/dashboard" class="collapsed text-decoration-none" aria-expanded="false">
                        <i
                            class="fas fa-home mr-3 fa-lg {{ Request::is('dashboard*') ? 'text-white' : 'text-muted' }}"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Fitur</h4>
                </li>

                {{-- user manager --}}
                <li class="nav-item nav-link {{ Request::is('user*') ? 'active' : '' }}">
                    <a href="/user" class="collapsed text-decoration-none" aria-expanded="false">
                        <i class="fas fa-user mr-3 fa-lg {{ Request::is('user*') ? 'text-white' : 'text-muted' }}"></i>
                        <p>User Manager</p>
                    </a>
                </li>

                {{-- chat --}}
                <li class="nav-item {{ Request::is('chatpanel*') ? 'active' : '' }}">

                    <a data-toggle="collapse" href="#base" class="text-decoration-none">
                        <i
                            class="fas fa-comment-dots mr-3 fa-lg {{ Request::is('chatpanel*') ? 'text-white' : 'text-muted' }}"></i>
                        <p>Chat</p>
                        <span class="caret"></span>
                    </a>

                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/chatify" class="text-decoration-none">
                                    <span class="sub-item">Interface Chat</span>
                                </a>
                            </li>

                            <li>
                                <a href="/chatpanel" class="text-decoration-none">
                                    <span class="sub-item {{ Request::is('chatpanel*') ? 'text-primary' : '' }}">Chat
                                        Panel</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </li>

                {{-- ticket --}}
                @if ($admin['user']->hasRole($admin['role']->name))
                    <li class="nav-item nav-link {{ Request::is('tickets*') ? 'active' : '' }}">
                        <a href="/tickets/inbox" class="collapsed text-decoration-none" aria-expanded="false">
                            <i
                                class="fas fa-ticket-alt mr-3 fa-lg {{ Request::is('tickets*') ? 'text-white' : 'text-muted' }}"></i>
                            <p>Ticket</p>
                        </a>
                    </li>
                @else
                    <li class="nav-item nav-link {{ Request::is('tickets*') ? 'active' : '' }}">
                        <a href="/tickets/sent" class="collapsed text-decoration-none" aria-expanded="false">
                            <i
                                class="fas fa-ticket-alt mr-3 fa-lg {{ Request::is('tickets*') ? 'text-white' : 'text-muted' }}"></i>
                            <p>Ticket</p>
                        </a>
                    </li>
                @endif


                {{-- <li class="nav-item {{ Request::is('tickets*') ? 'active' : '' }}">

                    <a data-toggle="collapse" href="#baseTicket" class="text-decoration-none">
                        <i
                            class="fas fa-ticket-alt mr-3 fa-lg {{ Request::is('tickets*') ? 'text-white' : 'text-muted' }}"></i>
                        <p>Ticket</p>
                        <span class="caret"></span>
                    </a>

                    <div class="collapse" id="baseTicket">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/tickets/inbox"
                                    class="sub-item {{ Request::is('/tickets/inbox*') ? 'text-primary' : '' }}">
                                    <span class="sub-item">Receiver</span>
                                </a>
                            </li>

                            <li>
                                <a href="/tickets/sent" class="text-decoration-none">
                                    <span
                                        class="sub-item {{ Request::is('/tickets/sent*') ? 'text-primary' : '' }}">Sender</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </li> --}}

            </ul>

        </div>
    </div>
</div>
