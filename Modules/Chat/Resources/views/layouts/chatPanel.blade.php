<style>
    .chat-box {
        overflow-y: scroll;
        max-height: 330px;
        /* set tinggi maksimum yang diinginkan */
    }

    ::-webkit-scrollbar {
        display: none;
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
</style>

<div style="display: flex; justify-content: flex-end; align-items: flex-end;" class="mr-2">
    <div class=" border p-2 rounded collapse position-fixed bg-white" style="width: 410px; z-index: 9999;"
        id="collapseBoxChat">

        <div class="search-filter">
            <div class="d-flex justify-content-between align-items-center">
                {{-- search contact --}}
                <form class="navbar-left navbar-form nav-search search-contact" action="{{ url()->current() }}"
                    method="GET">
                    <div class="input-group" style="width: 330px;">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-search pr-1">
                                <i class="fa fa-search search-icon"></i>
                            </button>
                        </div>
                        <input type="search" placeholder="Search Contact ..." class="form-control" name="search"
                            value="{{ request('search') }}">
                    </div>
                </form>

                {{-- search user --}}
                <form class="navbar-left navbar-form nav-search search-user d-none" action="{{ url()->current() }}"
                    method="GET">
                    <div class="input-group bg-primary" style="width: 330px;">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-search pr-1">
                                <i class="fa fa-search search-icon text-white"></i>
                            </button>
                        </div>
                        <input type="search" placeholder="Search User ..." class="form-control text-white"
                            name="searchUser" value="{{ request('searchUser') }}">
                    </div>
                </form>

                {{-- filter notif --}}
                <form class="navbar-left navbar-form nav-search filter-contact" action="{{ url()->current() }}"
                    method="GET">
                    <input type="hidden" value="1" name="notifikasi">
                    <button type="submit" class="btn btn-link" style="margin-left: -12px;">
                        <i class="fas fa-align-center" style="width: 18px; height: 100%;"></i>
                    </button>
                </form>

                {{-- toggle search user --}}
                <a data-toggle="collapse" href="#collapseBoxUser" role="button" aria-expanded="false"
                    aria-controls="collapseExample" class="btn-search-user"
                    style="margin-bottom: 12px; margin-left: -10px;">
                    <i class="fa fa-plus" style="width: 18px; height: 100%;"></i>
                </a>

            </div>
        </div>

        <div class="chat-box">
            <br>

            <div class="dataContactAll"></div>

        </div>

    </div>
</div>

<br>

<div style="display: flex; justify-content: flex-end; align-items: flex-end;">
    <a class="ms-auto ms-1 text-muted mr-4 bg-primary p-2" data-toggle="collapse" href="#collapseBoxChat" role="button"
        aria-expanded="false" aria-controls="collapseExample" style="border-radius: 50%;">
        <i class="fas fa-comment-dots text-white" style="width: 30px; height: 100%;"></i>
    </a>
</div>

<script>
    const toggleBtn = document.querySelector('.btn-search-user');
    const searchContactForm = document.querySelector('.search-contact');
    const searchUserForm = document.querySelector('.search-user');
    const filterNotif = document.querySelector('.filter-contact');

    toggleBtn.addEventListener('click', function() {
        // toggleBtn.classList.toggle('d-none');
        searchContactForm.classList.toggle('d-none');
        // filterNotif.classList.toggle('d-none');
        searchUserForm.classList.toggle('d-none');
    });
</script>
