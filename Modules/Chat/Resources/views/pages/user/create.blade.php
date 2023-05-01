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
                                <div class="card-title">Form Tambah User</div>
                            </div>

                            <form action="/user" method="POST" class="p-2">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Isikan Name ..." name="name">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Isikan Email ..." name="email">
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password"
                                        name="password">
                                </div>

                                <button type="button" class="btn btn-primary ml-3 mt-3" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Submit
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Tambah User?
                                                </h1>
                                            </div>

                                            <div class="modal-body">
                                                Apakah anda yakin data user sudah benar!
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Ya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
