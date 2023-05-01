<li class="nav-item dropdown hidden-caret">
    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell" style="height: 20px; width: 20px"></i>
        <span class="notification">
            <div class="get-ticket-total h6"></div>
        </span>
    </a>

    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
        <li>
            <div class="dropdown-title title-total-ticket"></div>
        </li>

        <li>
            <div class="notif-scroll scrollbar-outer">
                <div class="notif-center">

                    <div class="get-data-realtime"></div>

                </div>
            </div>
        </li>

        <li>
            <a class="see-all" href="{{ route('ticket.listNotification') }}">See all notifications<i
                    class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
</li>
