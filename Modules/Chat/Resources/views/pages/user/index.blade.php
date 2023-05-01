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

                        @if ($admin['user']->hasRole($admin['role']->name))
                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="/user/create" class="btn btn-secondary btn-round">Tambah User</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="page-inner mt--5">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <div class="card-title">All Data User</div>
                            </div>

                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="card-body">
                                @if ($admin['user']->hasRole($admin['role']->name))
                                    @include('chat::components.filter-status')
                                @endif

                                <table class="table mt-2">

                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            @if ($admin['user']->hasRole($admin['role']->name))
                                                <th scope="col">Role</th>
                                            @endif

                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @include('chat::components.list-user')
                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </div>

                    {{-- pagination --}}
                    @if ($admin['user']->hasRole($admin['role']->name))
                        <div class="ml-3">
                            {!! $allUser->links() !!}
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>


    @include('chat::atom.js')

</body>

</html>
