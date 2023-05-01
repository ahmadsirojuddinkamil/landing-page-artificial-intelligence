@include('chat::layouts.header')

<body>

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

                            <div class="card-body">

                                <ul>

                                    @if ($statusRoom == 'open')
                                        <a href="{{ route('ticket.reply' . ($admin['user']->hasRole($admin['role']->name) ? 'Admin' : ''), [$uuidNow, $findLatestChat->id]) }}"
                                            class="btn btn-primary">
                                            Reply Ticket
                                        </a>
                                    @endif

                                    @foreach ($ticket as $t)
                                        <div style="display:flex; justify-content:space-between;">
                                            <div style="flex-basis:74%;">
                                                <div class="card-body">
                                                    @include('chat::components.show-ticket-history')
                                                </div>

                                            </div>

                                            <div style="flex-basis:25%;">
                                                @if (!isset($complaint_displayed))
                                                    <h4><strong>Ticket Information</strong></h4>
                                                    <table class="table table-bordered">
                                                        <thead>

                                                            <tr>
                                                                <td scope="col">
                                                                    <strong>Complaint</strong>
                                                                    <br>
                                                                    {{ $t->complaint }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td scope="col">
                                                                    <strong>Department</strong>
                                                                    <br>
                                                                    {{ $t->department }}
                                                                </td>
                                                            </tr>

                                                            <tr class=" mt-3">
                                                                <td scope="col">

                                                                    <br>
                                                                    <strong>Status</strong>
                                                                    <br><br>

                                                                    <span
                                                                        class="bg-{{ $statusRoom == 'open' ? 'info' : 'danger' }} p-1 mr-2 text-white rounded">
                                                                        {{ $statusRoom }}
                                                                    </span>
                                                                    <br><br>

                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td scope="col">
                                                                    <strong>Priority</strong>
                                                                    <br>
                                                                    {{ $t->priority }}
                                                                </td>
                                                            </tr>

                                                        </thead>
                                                    </table>
                                                @endif
                                            </div>
                                        </div>

                                        @php
                                            $complaint_displayed = true;
                                        @endphp
                                    @endforeach

                                </ul>

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
