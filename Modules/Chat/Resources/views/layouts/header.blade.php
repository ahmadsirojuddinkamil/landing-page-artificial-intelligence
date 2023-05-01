<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $title }}</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <link rel="icon" href="" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    @include('chat::atom.css')

    <style>
        .toast-get {
            position: absolute;
            z-index: 999;
            right: 0;
        }



        @keyframes slide-down {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .toast-notification.new {
            animation: slide-down 0.5s ease-out forwards;
        }



        @keyframes fade-out {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: translateY(-100%);
            }
        }

        .toast-notification.hide {
            animation: fade-out 0.5s ease-out forwards;
        }
    </style>
</head>

<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue">

        <a href="/" class="logo">
            <i class="fas fa-sliders-h fa-lg text-white"></i>
            <span class="text-white pb-2 fw-bold ml-2">Module Chat</span>
        </a>

    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

        <div class="container-fluid">

            @include('chat::components.search-user')

            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                @include('chat::components.list-chat-panel')
                @include('chat::components.notification')
                @include('chat::components.profile')

            </ul>
        </div>
    </nav>

    <div class="toast-get mr-3"></div>
    <!-- End Navbar -->
</div>
