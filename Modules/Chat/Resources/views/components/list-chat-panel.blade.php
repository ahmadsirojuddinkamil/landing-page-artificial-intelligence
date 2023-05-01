{{-- panel chat --}}
@if (Request::is('chatpanel*'))
    <li class="nav-item dropdown hidden-caret">

        <a class="nav-link dropdown-toggle mt-2" href="#" id="messageDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">

            {{-- <span class="listAllChat"></span> --}}

            <span class="message-icon">
                <i class="fa fa-envelope" style="height: 20px; width: 20px"></i>
                <span class="listAllChat notification-badge">0</span>
            </span>
        </a>

        <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">

            <div class="messenger">
                <div class="messenger-listView">

                    {{-- Header and search bar --}}
                    <div class="m-header">

                        {{-- Search input --}}
                        <input type="text" class="form-control messenger-search mt-2" placeholder="Search">

                        {{-- Tabs --}}
                        <div class="messenger-listView-tabs justify-content-center">
                            <span @if ($type == 'user') class="active-tab" @endif data-view="users">
                                <span class="far fa-user"></span>Daftar Chat
                                {{-- <span class="listAllChat"></span> --}}
                            </span>
                        </div>
                    </div>

                    {{-- tabs and lists --}}
                    <div class="m-body contacts-container" style="margin-top: 100px;">
                        {{-- Lists [Users/Group] --}}
                        {{-- ---------------- [ User Tab ] ---------------- --}}
                        <div class="@if ($type == 'user') show @endif messenger-tab users-tab app-scroll"
                            data-view="users">

                            {{-- Favorites --}}
                            <div class="favorites-section">
                                <p class="messenger-title">Favorites</p>
                                <div class="messenger-favorites app-scroll-thin"></div>
                            </div>

                            {{-- Contact --}}
                            <div class="example-scroll">
                                <div class="listOfContacts"
                                    style="width: 100%;height: calc(100% - 200px);position: relative;">
                                </div>
                            </div>

                        </div>

                        {{-- ---------------- [ Group Tab ] ---------------- --}}
                        <div class="@if ($type == 'group') show @endif messenger-tab groups-tab app-scroll"
                            data-view="groups">
                            {{-- items --}}
                            <p style="text-align: center;color:grey;margin-top:30px">
                                <a target="_blank" style="color:{{ $messengerColor }};"
                                    href="https://chatify.munafio.com/notes#groups-feature">Click
                                    here</a> for more info!
                            </p>
                        </div>

                        {{-- ---------------- [ Search Tab ] ---------------- --}}
                        <div class="messenger-tab search-tab app-scroll"app-scroll" data-view="search">
                            {{-- items --}}
                            <div class="search-records example-scroll">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <li>
            <a class="see-all" href="javascript:void(0);">See all messages<i
                    class="fa fa-angle-right"></i>
            </a>
        </li> --}}

        </ul>
    </li>
@endif
