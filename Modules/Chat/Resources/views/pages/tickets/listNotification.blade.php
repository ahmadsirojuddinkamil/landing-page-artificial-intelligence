<body>

    @include('chat::layouts.header')

    @include('chat::layouts.sidebar')

    <div class="main-panel">
        <div class="content">

            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

                        <div>
                            <h2 class="text-white pb-2 fw-bold">List Notifications</h2>
                        </div>

                    </div>
                </div>
            </div>

            <div class="page-inner mt--5">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body">

                                <div class="card full-height">

                                    <div class="card-header">
                                        <div class="card-head-row d-flex justify-content-between">

                                            @include('chat::components.filter-notifikasi')

                                            {{-- hapus notifikasi --}}
                                            @foreach ($messages->sortByDesc('created_at')->unique('receiver_id') as $key => $message)
                                                @include('chat::components.button-delete-notifikasi')
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        @foreach ($listNotifikasi as $l)
                                            @if ($l->notif_delete != 0)
                                                @include('chat::components.list-notifikasi')
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="ml-3">
                                        {!! $listNotifikasi->links() !!}
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

    @include('chat::atom.js')

</body>

</html>
