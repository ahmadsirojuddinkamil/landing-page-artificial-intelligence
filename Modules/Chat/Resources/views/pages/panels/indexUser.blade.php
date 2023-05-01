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

<div style="display: flex; justify-content: flex-end; align-items: flex-end;">
    <div class=" border p-2 rounded collapse position-fixed bg-white" style="width: 410px; z-index: 9999;"
        id="collapseBoxChat">
        <div class="card-header d-flex justify-content-between align-items-center p-3">
            <h5 class="mb-0">Chat</h5>
            <button type="button" class="btn btn-primary btn-sm" data-mdb-ripple-color="dark">Let's Chat
                App</button>
        </div>

        <div class="chat-box">
            <br>

            <div class="d-flex flex-row justify-content-start">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1"
                    style="width: 45px; height: 100%;" class="mr-1">
                <div>
                    <p class="small p-2 ms-3 mb-1 rounded" style="background-color: #f5f6f7;">Hi</p>
                    <p class="small p-2 ms-3 mb-1 rounded" style="background-color: #f5f6f7;">How are you
                        ...???
                    </p>
                    <p class="small p-2 ms-3 mb-1 rounded" style="background-color: #f5f6f7;">What are you
                        doing
                        tomorrow? Can we come up a bar?</p>
                    <p class="small ms-3 mb-3 rounded text-muted">23:58</p>
                </div>
            </div>

            <div class="divider d-flex align-items-center mb-4">
                <p class="text-center mx-3 mb-0" style="color: #a2aab7;">Today</p>
            </div>

            <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                <div>
                    <p class="small p-2 me-3 mb-1 text-white rounded bg-primary">Hiii, I'm good.</p>
                    <p class="small p-2 me-3 mb-1 text-white rounded bg-primary">How are you doing?</p>
                    <p class="small p-2 me-3 mb-1 text-white rounded bg-primary">Long time no see!
                        Tomorrow
                        office. will
                        be free on sunday.</p>
                    <p class="small me-3 mb-3 rounded text-muted d-flex justify-content-end">00:06</p>
                </div>
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp" alt="avatar 1"
                    style="width: 45px; height: 100%;" class=" ml-1">
            </div>

            <div class="d-flex flex-row justify-content-start mb-4">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1"
                    style="width: 45px; height: 100%;" class="mr-1">
                <div>
                    <p class="small p-2 ms-3 mb-1 rounded" style="background-color: #f5f6f7;">Okay</p>
                    <p class="small p-2 ms-3 mb-1 rounded" style="background-color: #f5f6f7;">We will go
                        on
                        Sunday?</p>
                    <p class="small ms-3 mb-3 rounded text-muted">00:07</p>
                </div>
            </div>

            <div class="d-flex flex-row justify-content-end mb-4">
                <div>
                    <p class="small p-2 me-3 mb-1 text-white rounded bg-primary">That's awesome!</p>
                    <p class="small p-2 me-3 mb-1 text-white rounded bg-primary">I will meet you Sandon
                        Square
                        sharp at
                        10 AM</p>
                    <p class="small p-2 me-3 mb-1 text-white rounded bg-primary">Is that okay?</p>
                    <p class="small me-3 mb-3 rounded text-muted d-flex justify-content-end">00:09</p>
                </div>
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp" alt="avatar 1"
                    style="width: 45px; height: 100%;" class="ml-1">
            </div>

            <div class="d-flex flex-row justify-content-start mb-4">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1"
                    style="width: 45px; height: 100%;" class="mr-1">
                <div>
                    <p class="small p-2 ms-3 mb-1 rounded" style="background-color: #f5f6f7;">Okay i will
                        meet
                        you on
                        Sandon Square</p>
                    <p class="small ms-3 mb-3 rounded text-muted">00:11</p>
                </div>
            </div>

            <div class="d-flex flex-row justify-content-end mb-4">
                <div>
                    <p class="small p-2 me-3 mb-1 text-white rounded bg-primary">Do you have pictures of
                        Matley
                        Marriage?</p>
                    <p class="small me-3 mb-3 rounded text-muted d-flex justify-content-end">00:11</p>
                </div>
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp" alt="avatar 1"
                    style="width: 45px; height: 100%;" class="ml-1">
            </div>

            <div class="d-flex flex-row justify-content-start mb-4">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1"
                    style="width: 45px; height: 100%;" class="mr-1">
                <div>
                    <p class="small p-2 ms-3 mb-1 rounded" style="background-color: #f5f6f7;">Sorry I
                        don't
                        have. i
                        changed my phone.</p>
                    <p class="small ms-3 mb-3 rounded text-muted">00:13</p>
                </div>
            </div>

            <div class="d-flex flex-row justify-content-end">
                <div>
                    <p class="small p-2 me-3 mb-1 text-white rounded bg-primary">Okay then see you on
                        sunday!!
                    </p>
                    <p class="small me-3 mb-3 rounded text-muted d-flex justify-content-end">00:15</p>
                </div>
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp" alt="avatar 1"
                    style="width: 45px; height: 100%;" class="ml-1">
            </div>

            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <label for="image" class="mb-1"><b>Image</b></label>
                    <input type="file" placeholder="Image" id="image">
                    <br>
                    <label for="video" class="mb-1"><b>Video</b></label>
                    <input type="file" placeholder="Video" id="video">
                    <br>
                    <label for="document" class="mb-1"><b>Document</b></label>
                    <input type="file" placeholder="Document" id="document">
                </div>
            </div>
        </div>

        <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 3"
                style="width: 35px; height: 100%;" class=" mr-2">

            <input type="text" class="form-control mr-2" id="text" placeholder="Enter Chat">

            <a class="ms-1 text-muted mr-2" data-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-paperclip" style="width: 20px; height: 100%;"></i>
            </a>


            <a class="ms-3" href="#!">
                <i class="fas fa-paper-plane" style="width: 20px; height: 100%;"></i>
            </a>
        </div>
    </div>
</div>

<br>

<div style="display: flex; justify-content: flex-end; align-items: flex-end;">
    <a class="ms-auto ms-1 text-muted mr-4 bg-primary p-2" data-toggle="collapse" href="#collapseBoxChat"
        role="button" aria-expanded="false" aria-controls="collapseExample" style="border-radius: 50%;">
        <i class="fas fa-comment-dots text-white" style="width: 30px; height: 100%;"></i>
    </a>
</div>
