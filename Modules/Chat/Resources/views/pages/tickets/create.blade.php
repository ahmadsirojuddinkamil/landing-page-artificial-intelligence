<body>

    @include('chat::layouts.header')

    @include('chat::layouts.sidebar')

    <div class="main-panel">
        <div class="content">

            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Ticket Manager</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-inner mt--5">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <div class="card-title">Open Tickets</div>
                            </div>

                            <div class="col-md-8">

                                <div class="card-body">

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">

                                                @if ($admin['user']->hasRole($admin['role']->name))
                                                    @include('chat::components.form-ticket-receiver')
                                                @else
                                                    @include('chat::components.form-ticket-sender')
                                                @endif

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
    </div>


    @include('chat::atom.js')

</body>

</html>
