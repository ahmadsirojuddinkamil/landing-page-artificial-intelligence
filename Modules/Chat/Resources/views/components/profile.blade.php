{{-- profile --}}
<li class="nav-item dropdown hidden-caret">

    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
        <div class="avatar-sm">
            <img src="{{ $userNow->image ?? Module::asset('Chat:assets/img/profile.jpg') }}" alt="..."
                class="avatar-img rounded-circle">
        </div>
    </a>

    <ul class="dropdown-menu dropdown-user animated fadeIn">
        <div class="dropdown-user-scroll scrollbar-outer">

            <li>
                <div class="user-box">

                    <div class="avatar-lg">
                        <img src="{{ $userNow->image ?? Module::asset('Chat:assets/img/profile.jpg') }}"
                            alt="image profile" class="avatar-img rounded">
                    </div>

                    <div class="u-text">
                        @if ($admin['user']->hasRole($admin['role']->name))
                            <h4 class=" text-primary">Administrator</h4>
                        @endif
                        <h4>{{ $userNow->name }}</h4>
                        <p class="text-muted">{{ $userNow->email }}</p>
                    </div>

                </div>
            </li>

            <li>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="dropdown-item">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>

        </div>
    </ul>
</li>
