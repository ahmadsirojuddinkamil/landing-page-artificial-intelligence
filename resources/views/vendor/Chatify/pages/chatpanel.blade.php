<div class="main-panel">
    <div class="content">

        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

                    <div>
                        <h2 class="text-white pb-2 fw-bold">Chat Panel</h2>
                    </div>

                </div>
            </div>
        </div>

        <div class="page-inner mt--5">

            <div class="row">
                <div class="col-md-12">

                    {{-- <div class="card" style="height: 1000px"> --}}
                    <div class="card">

                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Content</div>
                            </div>
                        </div>

                        <div class="card-body">

                        </div>

                    </div>

                    {{-- ----------------------Messaging side---------------------- --}}
                    <div class="d-flex justify-content-end">

                        <div class="bg-primary p-2 rounded" id="btn-open-chat">
                            <li class="far fa-comment-dots" style="font-size:36px; color: #ffffff;"
                                onclick="openChat()">
                            </li>
                        </div>

                        <div class="messenger-messagingView shadow-lg panel-chat" id="chat-box" style="display: none;">
                            {{-- header title [conversation name] amd buttons --}}
                            <div class="m-header m-header-messaging">
                                <nav>
                                    {{-- header back button, avatar and user name --}}
                                    <div style="display: inline-flex;">

                                        <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>

                                        <div class="avatar av-s header-avatar"
                                            style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                        </div>

                                        <a href="#" class="user-name">{{ config('chatify.name') }}</a>

                                    </div>

                                    <div class=" float-right">
                                        <li class="fa fa-window-close" style="font-size:24px; color: #1572E8;"
                                            onclick="closeChat()">
                                        </li>
                                    </div>

                                </nav>
                            </div>

                            {{-- Internet connection --}}
                            <div class="internet-connection">
                                <span class="ic-connected">Connected</span>
                                <span class="ic-connecting">Connecting...</span>
                                <span class="ic-noInternet">No internet access</span>
                            </div>

                            {{-- Messaging area --}}
                            <div class="m-body messages-container app-scroll body-panel">

                                <div class="messages scrool-chat">
                                    <p class="message-hint center-el mt-4"><span>Silahkan Memulai Percakapan!</span></p>
                                </div>

                                {{-- Typing indicator --}}
                                <div class="typing-indicator">
                                    <div class="message-card typing">
                                        <p>
                                            <span class="typing-dots">
                                                <span class="dot dot-1"></span>
                                                <span class="dot dot-2"></span>
                                                <span class="dot dot-3"></span>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <br><br><br>
                                {{-- Send Message Form --}}
                                @include('Chatify::layouts.sendForm')
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
        function openChat() {
            document.getElementById("chat-box").style.display = "block";
            document.getElementById("btn-open-chat").style.display = "none";
        }

        function closeChat() {
            document.getElementById("chat-box").style.display = "none";
            document.getElementById("btn-open-chat").style.display = "block";
        }
    </script>
