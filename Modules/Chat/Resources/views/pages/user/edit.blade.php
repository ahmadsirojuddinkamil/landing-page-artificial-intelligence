<body>

    @include('chat::layouts.header')

    @include('chat::layouts.sidebar')

    <div class="main-panel">
        <div class="content">

            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

                        <div>
                            <h2 class="text-white pb-2 fw-bold">User Manager</h2>
                        </div>

                    </div>
                </div>
            </div>

            <div class="page-inner mt--5 w-50">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <div class="card-title">Form Edit User</div>
                            </div>

                            <form class="p-2" method="POST" action="/user/{{ $dataUser->id }}">
                                @method('put')
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Isikan Name ..." name="name"
                                        value="{{ old('name', $dataUser->name) }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Isikan Email ..." name="email"
                                        value="{{ old('email', $dataUser->email) }}">
                                </div>

                                {{-- hanya untuk admin --}}
                                @if ($admin['user']->hasRole($admin['role']->name))
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <div class="input-group">
                                            @if ($dataUser->hasRole('admin'))
                                                <input type="text" class="form-control" value="admin" readonly>
                                            @else
                                                <input type="text" class="form-control" value="user" readonly>
                                            @endif

                                            <div class="input-group-append">
                                                <select class="form-control bg-primary text-white" id="role"
                                                    name="role">
                                                    @if ($dataUser->hasRole('admin'))
                                                        <option value="admin">Ganti Role ?</option>
                                                    @else
                                                        <option value="user">Ganti Role ?</option>
                                                    @endif
                                                    <option value="user">User</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Password" name="password"
                                            value="{{ old('password', $dataUser->password) }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="button" id="togglePassword">
                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary ml-3 mt-3" type="submit">Submit</button>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @include('chat::atom.js')

</body>

</html>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
</script>
