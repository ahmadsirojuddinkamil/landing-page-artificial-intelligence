{{-- <style>
    .chat-box {
        height: 400px;
        /* atur ketinggian kotak chat */
        overflow-y: auto;
        /* atur overflow ke auto agar kotak dapat di-scroll */
    }

    .chat-message {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .avatar img {
        width: 45px;
        height: 100%;
    }

    .message {
        background-color: #f5f6f7;
        border-radius: 10px;
        padding: 10px;
        margin-left: 10px;
        flex: 1;
    }

    .time {
        margin-top: 5px;
        font-size: 12px;
        color: #999;
    }
</style> --}}

<body>

    @include('chat::layouts.header')

    @include('chat::layouts.sidebar')

    <div class="main-panel">
        <div class="content">

            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

                        <div>
                            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        </div>

                    </div>
                </div>
            </div>

            <div class="page-inner mt--5">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-title">Content</div>
                                </div>
                            </div>

                            <div class="card-body">
                                @if ($admin['user']->hasRole($admin['role']->name))
                                    <h3>Administrator</h3>
                                @endif
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        {{-- @include('chat::components.chat-panel-history') --}}

        <div style="margin-top: -20px;">
            @include('chat::layouts.chatPanel')
        </div>

    </div>

    @include('chat::atom.js')


</body>

</html>
