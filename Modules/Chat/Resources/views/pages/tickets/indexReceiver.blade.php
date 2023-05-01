<body>

    @include('chat::layouts.header')
    @include('chat::layouts.sidebar')

    <div class="main-panel">
        <div class="content">

            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

                        <div>
                            <h2 class="text-white pb-2 fw-bold">Ticket Manager Administrator</h2>
                        </div>

                        {{-- @include('chat::components.open-ticket-receiver') --}}

                    </div>
                </div>
            </div>

            <div class="page-inner mt--5">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <div class="card-title">All Tickets</div>
                            </div>

                            <div class="col-md-16">

                                <div class="card-body">

                                    @include('chat::components.filter-status')

                                    <table class="table mt-2">

                                        @include('chat::components.list-room-ticket')

                                    </table>

                                    <div class="ml-3">
                                        {!! $listRoom->links() !!}
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
