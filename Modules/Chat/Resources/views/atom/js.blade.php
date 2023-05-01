<script src="{{ asset('build/assets/app-c0e9ee00.js') }}"></script>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<!-- Fonts and icons -->
{{-- <script src="{{ Module::asset('Chat:assets/js/plugin/webfont/webfont.min.js') }}"></script> --}}

<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
    integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

{{-- <script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['assets/css/fonts.min.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script> --}}

<!--   Core JS Files   -->
<script src="{{ Module::asset('Chat:assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ Module::asset('Chat:assets/js/core/popper.min.js') }}"></script>
<script src="{{ Module::asset('Chat:assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ Module::asset('Chat:assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ Module::asset('Chat:assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ Module::asset('Chat:assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


<!-- Chart JS -->
<script src="{{ Module::asset('Chat:assets/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ Module::asset('Chat:assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ Module::asset('Chat:assets/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ Module::asset('Chat:assets/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ Module::asset('Chat:assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ Module::asset('Chat:assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ Module::asset('Chat:assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ Module::asset('Chat:assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Atlantis JS -->
<script src="{{ Module::asset('Chat:assets/js/atlantis.min.js') }}"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="{{ Module::asset('Chat:assets/js/setting-demo.js') }}"></script>

<script src="{{ Module::asset('Chat:assets/js/demo.js') }}"></script>

<script>
    Circles.create({
        id: 'circles-1',
        radius: 45,
        value: 60,
        maxValue: 100,
        width: 7,
        text: 5,
        colors: ['#f1f1f1', '#FF9E27'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-2',
        radius: 45,
        value: 70,
        maxValue: 100,
        width: 7,
        text: 36,
        colors: ['#f1f1f1', '#2BB930'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-3',
        radius: 45,
        value: 40,
        maxValue: 100,
        width: 7,
        text: 12,
        colors: ['#f1f1f1', '#F25961'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    // var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

    // var mytotalIncomeChart = new Chart(totalIncomeChart, {
    //     type: 'bar',
    //     data: {
    //         labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
    //         datasets: [{
    //             label: "Total Income",
    //             backgroundColor: '#ff9e27',
    //             borderColor: 'rgb(23, 125, 255)',
    //             data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
    //         }],
    //     },
    //     options: {
    //         responsive: true,
    //         maintainAspectRatio: false,
    //         legend: {
    //             display: false,
    //         },
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     display: false //this will remove only the label
    //                 },
    //                 gridLines: {
    //                     drawBorder: false,
    //                     display: false
    //                 }
    //             }],
    //             xAxes: [{
    //                 gridLines: {
    //                     drawBorder: false,
    //                     display: false
    //                 }
    //             }]
    //         },
    //     }
    // });

    $('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: '#ffa534',
        fillColor: 'rgba(255, 165, 52, .14)'
    });
</script>

{{-- ========== --}}
{{-- CHAT PANEL --}}
{{-- function GET, SEARCH, FILTER contact --}}
<script>
    const contactAll = document.querySelector('.dataContactAll');
    const searchForm = document.querySelector('.search-contact');
    const searchUser = document.querySelector('.search-user');
    const filterContact = document.querySelector('.filter-contact');
    const searchFilter = document.querySelector('.search-filter');

    // GET CONTACT
    function getDataContact() {
        axios.get('{{ route('panel.getContactAll') }}')
            .then(response => {
                const dataAllRoom = response.data.listRoom;
                const nameUserLogin = response.data.nameUserLogin;
                const listTotalNotif = response.data.listTotalNotif;

                dataAllRoom.forEach(room => {
                    const totalNotifikasi = listTotalNotif[room.uuid];

                    contactAll.innerHTML += `
                        <a href="#" onclick="getHistoryPanel('${room.panels[0].room_uuid}', '${room.panels[0].id}')" class="text-decoration-none">
                            <div style="display: flex; align-items: flex-start; background-color: #f8f8f8;" class="d-flex align-items-center p-2 rounded">
                                <div class="ml-2" style="position: relative;">
                                    <span class="green-dot" style="position: absolute; bottom: 0; right: 1px; width: 10px; height: 10px; border-radius: 50%; ${room.status == 'open' ? 'background-color: green;' : 'background-color: red;'}"></span>
                                </div>

                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;" class="mr-1">

                                <div class="ml-2">

                                <span class="small ms-3 mb-3 rounded text-muted">
                                    <b>
                                        ${nameUserLogin.name == room.panels[0].name_sender ? room.panels[0].name_receiver : room.panels[0].name_sender}
                                    </b>
                                </span>

                                <span class="small ms-3 mb-3 rounded text-muted">
                                    ${new Date(room.panels[0].created_at).toLocaleDateString()}
                                </span>
                                <br>

                                <span class="small ms-3 mb-3 rounded text-muted">${room.panels[0].message_content}</span>
                                </div>

                                <div class="bg-warning p-2" style="position: absolute; right: 0; width: 22px; height: 22px; border-radius: 50%; margin-right: 15px;">
                                    <div style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100%;">
                                        <div class="text-white">
                                        ${totalNotifikasi != null ? totalNotifikasi : '0'}
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </a>
                    `;
                });

            })
            .catch(error => {
                console.log(error);
            });
    }
    getDataContact();

    // SEARCH CONTACT
    searchForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const searchTerm = searchForm.querySelector('[name="search"]').value;

        if (searchTerm) {
            axios.get('{{ route('panel.getContactAll') }}', {
                    params: {
                        search: searchTerm
                    }
                })
                .then(response => {
                    const dataContactSearch = response.data.listRoom[0].panels[0];
                    const statusRoomCheck = response.data.listRoom[0].status;
                    const nameUserLogin = response.data.nameUserLogin;
                    const listTotalNotif = response.data.listTotalNotif;
                    const totalNotifikasi = listTotalNotif[dataContactSearch.room_uuid];

                    contactAll.innerHTML = `
                        <a href="#" onclick="getHistoryPanel('${dataContactSearch.room_uuid}', '${dataContactSearch.id}')" class="text-decoration-none">
                            <div style="display: flex; align-items: flex-start; background-color: #f8f8f8;" class="d-flex align-items-center p-2 rounded">
                                <div class="ml-2" style="position: relative;">
                                    <span class="green-dot" style="position: absolute; bottom: 0; right: 1px; width: 10px; height: 10px; border-radius: 50%; ${statusRoomCheck.status == 'open' ? 'background-color: green;' : 'background-color: red;'}"></span>
                                </div>

                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;" class="mr-1">

                                <div class="ml-2">
                                <span class="small ms-3 mb-3 rounded text-muted">
                                    <b>
                                        ${nameUserLogin.name == dataContactSearch.name_sender ? dataContactSearch.name_receiver : dataContactSearch.name_sender}
                                    </b>
                                </span>

                                <span class="small ms-3 mb-3 rounded text-muted">${new Date(dataContactSearch.created_at).toLocaleDateString()}</span>
                                <br>

                                <span class="small ms-3 mb-3 rounded text-muted">${dataContactSearch.message_content}</span>
                                </div>

                                <div class="bg-warning p-2" style="position: absolute; right: 0; width: 22px; height: 22px; border-radius: 50%; margin-right: 15px;">
                                    <div style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100%;">
                                        <div class="text-white">
                                            ${totalNotifikasi != null ? totalNotifikasi : '0'}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    `;
                })
                .catch(error => {
                    console.log(error);
                });
        } else {
            axios.get('{{ route('panel.getContactAll') }}')
                .then(response => {
                    const dataContactAll = response.data.listRoom;
                    const nameUserLogin = response.data.nameUserLogin;
                    const listTotalNotif = response.data.listTotalNotif;

                    contactAll.innerHTML = '';
                    dataContactAll.forEach(room => {
                        const totalNotifikasi = listTotalNotif[room.uuid];
                        contactAll.innerHTML += `

                            <a href="#" onclick="getHistoryPanel('${room.panels[0].room_uuid}', '${room.panels[0].id}')" class="text-decoration-none">
                                <div style="display: flex; align-items: flex-start; background-color: #f8f8f8;" class="d-flex align-items-center p-2 rounded">

                                    <div class="ml-2" style="position: relative;">
                                        <span class="green-dot" style="position: absolute; bottom: 0; right: 1px; width: 10px; height: 10px; border-radius: 50%; ${room.status == 'open' ? 'background-color: green;' : 'background-color: red;'}"></span>
                                    </div>

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;" class="mr-1">
                                    <div class="ml-2">

                                    <span class="small ms-3 mb-3 rounded text-muted">
                                        <b>
                                            ${nameUserLogin.name == room.panels[0].name_sender ? room.panels[0].name_receiver : room.panels[0].name_sender}
                                        </b>
                                    </span>

                                    <span class="small ms-3 mb-3 rounded text-muted">${new Date(room.panels[0].created_at).toLocaleDateString()}</span>
                                    
                                    <br>
                                    
                                    <span class="small ms-3 mb-3 rounded text-muted">${room.panels[0].message_content}</span>
                                    </div>

                                    <div class="bg-warning p-2" style="position: absolute; right: 0; width: 22px; height: 22px; border-radius: 50%; margin-right: 15px;">
                                        <div style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100%;">
                                            <div class="text-white">
                                                ${totalNotifikasi != null ? totalNotifikasi : '0'}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        `;
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        }
    });

    // SEARCH USER
    searchUser.addEventListener('submit', function(event) {
        event.preventDefault();
        const dataUser = searchUser.querySelector('[name="searchUser"]').value;

        if (dataUser) {
            axios.get('{{ route('panel.searchUser') }}', {
                    params: {
                        searchUser: dataUser
                    }
                })
                .then(response => {
                    const findUser = response.data.findUser;
                    const getUuid = response.data.getUuid;

                    // console.log('berhasil search', findUser[0].id)
                    // console.log('berhasil dapet uuid yang sama : ', getUuid)

                    contactAll.innerHTML = '';

                    if (getUuid) {
                        contactAll.innerHTML += `
                            <a href="#" onclick="getHistoryPanel('${getUuid.room_uuid}', '${getUuid.id}')" class="text-decoration-none">
                                <div style="display: flex; align-items: flex-start; background-color: #f8f8f8;" class="d-flex align-items-center p-2 rounded">

                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;" class="mr-1">

                                        <div class="ml-2">
                                        <span class="small ms-3 mb-3 rounded text-muted">
                                            <b>
                                                ${getUuid.name_receiver}
                                            </b>
                                        </span>

                                        <br>

                                        <span class="small ms-3 mb-3 rounded text-muted">${getUuid.message_content}</span>
                                        </div>

                                    </div>
                                </a>
                            `;
                    } else {
                        contactAll.innerHTML += `
                            <a href="#" onclick="createChat(${findUser[0].id})" class="text-decoration-none">
                                <div style="display: flex; align-items: flex-start; background-color: #f8f8f8;" class="d-flex align-items-center p-2 rounded">
    
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;" class="mr-1">
    
                                    <div class="ml-2">
                                    <span class="small ms-3 mb-3 rounded text-muted">
                                        <b>
                                            ${findUser[0].name}
                                        </b>
                                    </span>
    
                                    <br>
    
                                    <span class="small ms-3 mb-3 rounded text-muted">Belum Memulai Chat!</span>
                                    </div>
    
                                </div>
                            </a>
                        `;
                    }

                })
                .catch(error => {
                    console.log(error);
                });

        } else {
            contactAll.innerHTML = ``
            contactAll.innerHTML += `
                <div class="text-center d-flex justify-content-center">data user tidak ada!</div>
                <br>
            `
        }

    });

    // FILTER CONTACT
    filterContact.addEventListener('submit', function(event) {
        event.preventDefault();
        const dataFilter = filterContact.querySelector('[name="notifikasi"]').value;

        console.log(dataFilter)

        axios.get('{{ route('panel.getContactAll') }}', {
                params: {
                    notifikasi: dataFilter
                }
            })
            .then(response => {
                const dataContactFilter = response.data.listRoom;
                const nameUserLogin = response.data.nameUserLogin;
                const listTotalNotif = response.data.listTotalNotif;
                contactAll.innerHTML = '';

                dataContactFilter.forEach(filter => {
                    const totalNotifikasi = listTotalNotif[filter.uuid];
                    contactAll.innerHTML += `
                            <a href="#" onclick="getHistoryPanel('${filter.panels[0].room_uuid}', '${filter.panels[0].id}')" class="text-decoration-none">
                                <div style="display: flex; align-items: flex-start; background-color: #f8f8f8;" class="d-flex align-items-center p-2 rounded">
                                    <div class="ml-2" style="position: relative;">
                                        <span class="green-dot" style="position: absolute; bottom: 0; right: 1px; width: 10px; height: 10px; border-radius: 50%; ${filter.status == 'open' ? 'background-color: green;' : 'background-color: red;'}"></span>
                                    </div>
    
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;" class="mr-1">
    
                                    <div class="ml-2">
                                    <span class="small ms-3 mb-3 rounded text-muted">
                                        <b>
                                            ${nameUserLogin.name == filter.panels[0].name_sender ? filter.panels[0].name_receiver : filter.panels[0].name_sender}
                                        </b>
                                    </span>
    
                                    <span class="small ms-3 mb-3 rounded text-muted">${new Date(filter.panels[0].created_at).toLocaleDateString()}</span>
                                    <br>
    
                                    <span class="small ms-3 mb-3 rounded text-muted">${filter.panels[0].message_content}</span>
                                    </div>

                                    <div class="bg-warning p-2" style="position: absolute; right: 0; width: 22px; height: 22px; border-radius: 50%; margin-right: 15px;">
                                        <div style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100%;">
                                            <div class="text-white">
                                                ${totalNotifikasi != null ? totalNotifikasi : '0'}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        `;
                });
            })
            .catch(error => {
                console.log(error);
            });
    });
</script>


<script>
    // BACK TO LIST CHAT
    function backToListRoom() {
        contactAll.innerHTML = '';
        searchFilter.style.display = 'block';
        getDataContact();
    }

    // CREATE CHAT
    function createChat(getId) {
        console.log('ini parameter id nya', getId)

        axios.get(`/panels/create/${getId}`, {
                params: {
                    // searchUser: dataUser
                }
            })
            .then(response => {
                // sender_id
                const userNow = response.data.userNow.id;
                // receiver_id
                console.log('id receiver : ', getId)
                // name_sender
                const nameSender = response.data.userNow.name;
                // room_uuid
                const dataRoom = response.data.room_location;

                const nameChat = response.data.nameChat[0].name;
                const current_time = response.data.current_time;

                console.log('ini waktu ', current_time)

                searchFilter.style.display = 'none';
                contactAll.innerHTML = '';

                // nama lawan chat & tombol kembali
                contactAll.innerHTML += `
                    <div class="d-flex justify-content-between border p-2 rounded" style="margin-top: -20px; margin-bottom: 10px;">
                        <a href="#" onclick="backToListRoom()">
                            <i class="fa fa-angle-double-left" style="width: 20px; height: 100%;"></i>
                        </a>     

                        <b style="font-size: 18px;">${nameChat}</b>   
                    </div>
                `

                // tombol input
                contactAll.innerHTML += `
                    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3 btn-submit-chat">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 3"
                            style="width: 35px; height: 100%;" class=" mr-2">

                        <input type="text" class="form-control mr-2 message_content" id="text" placeholder="Enter Chat" name="message_content">

                        <input type="hidden" class="form-control mr-2 notifikasi_id" name="notifikasi" value="1">

                        <input type="hidden" class="form-control mr-2 status_id" name="status" value="open">

                        <input type="hidden" class="form-control mr-2 created_id_store" name="created_at" value="${current_time}">

                        <a class="ms-1 text-muted mr-2 " data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-paperclip" style="width: 20px; height: 100%;"></i>
                        </a>

                        <a class="ms-3" href="#" onclick="storeChat('${userNow}', '${getId}', '${nameSender}', '${dataRoom}')">
                            <i class="fas fa-paper-plane" style="width: 20px; height: 100%;"></i>
                        </a>
                    </div>
                `
            })
            .catch(error => {
                console.log(error);
            });
    }

    // PUSH CHAT
    function storeChat(sender_id, receiver_id, nameSender, dataRoom) {
        // message_content
        const inputMessage = document.querySelector('.message_content');
        const dataMessage = inputMessage.value;

        // notifikasi_id
        const inputNotifikasi = document.querySelector('.notifikasi_id');
        const dataNotifikasi = inputNotifikasi.value;

        // status_id
        const inputStatus = document.querySelector('.status_id');
        const dataStatus = inputStatus.value;

        // created_id
        const inputCreated = document.querySelector('.created_id_store');
        const dataCreated = inputCreated.value;

        // addChatToHistory(dataMessage);
        addChatToHistory(dataMessage, dataCreated, dataRoom);

        axios.post('/panels/store', {
                // sender_id: sender_id,
                receiver_id: receiver_id,
                name_sender: nameSender,
                room_uuid: dataRoom,
                message_content: dataMessage,
                notifikasi: dataNotifikasi,
                status: dataStatus,
            })
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });

        console.log('terima sender_id : ', sender_id)
        console.log('terima receiver_id : ', receiver_id)
        console.log('terima nameSender : ', nameSender)
        console.log('terima dataRoom : ', dataRoom)
        console.log('terima dataMessage : ', dataMessage)
        console.log('terima dataNotifikasi : ', dataNotifikasi)
    }

    // GET HISTORY CHAT
    function getHistoryPanel(getUuid, getId) {
        console.log('ini data parameter : ', getUuid, getId)

        axios.get(`/panels/${getUuid}/${getId}`)
            .then(response => {
                const dataHistory = response.data.dataHistory;
                const userNow = response.data.userNow;
                const nameChat = response.data.nameChat;
                const nameReceiver = response.data.nameReceiver;
                const current_time = response.data.current_time;

                console.log('data show chat : ', current_time)

                searchFilter.style.display = 'none';
                contactAll.innerHTML = '';

                // nama lawan chat & tombol kembali
                contactAll.innerHTML += `
                    <div class="d-flex justify-content-between border p-2 rounded" style="margin-top: -20px; margin-bottom: 10px;">
                        <a href="#" onclick="backToListRoom()">
                            <i class="fa fa-angle-double-left" style="width: 20px; height: 100%;"></i>
                        </a>     

                        <b style="font-size: 18px;">${userNow.name == nameChat.name_sender ? nameReceiver.name : nameChat.name_sender}</b>   
                    </div>
                `

                // history chat
                dataHistory.forEach(history => {

                    const createdAt = new Date(history.created_at);
                    const formattedCreatedAt = createdAt.toLocaleString();

                    if (userNow.name == history.name_sender) {
                        contactAll.innerHTML += `
                            <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                <div>
                                    <p class="small p-2 me-3 mb-1 text-white rounded bg-primary">${history.message_content}</p>
                                    <p class="small me-3 mb-3 rounded text-muted d-flex justify-content-end">${formattedCreatedAt}</p>
                                </div>
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp" alt="avatar 1"
                                    style="width: 45px; height: 100%;" class=" ml-1">
                            </div>
                        `
                    } else {
                        contactAll.innerHTML += `
                            <div class="d-flex flex-row justify-content-start">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1"
                                    style="width: 45px; height: 100%;" class="mr-1">
                                <div>
                                    <p class="small p-2 ms-3 mb-1 rounded" style="background-color: #f5f6f7;">${history.message_content}</p>
                                    <p class="small ms-3 mb-3 rounded text-muted">${formattedCreatedAt}</p>
                                </div>
                            </div>
                        `
                    }
                })

                // tombol input pesan
                contactAll.innerHTML += `
                    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3 btn-submit-chat">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 3"
                            style="width: 35px; height: 100%;" class=" mr-2">

                        <input type="text" class="form-control mr-2 message_content" id="text" placeholder="Enter Chat" name="message_content">

                        <input type="hidden" class="form-control mr-2 notifikasi_id" name="notifikasi" value="1">

                        <input type="hidden" class="form-control mr-2 created_id" name="created_at" value="${current_time}">
                        
                        <a class="ms-1 text-muted mr-2" data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-paperclip" style="width: 20px; height: 100%;"></i>
                        </a>

                        <a class="ms-3" href="#" onclick="replyChat('${userNow.id}', '${userNow.name}', '${getUuid}')">
                            <i class="fas fa-paper-plane" style="width: 20px; height: 100%;"></i>
                        </a>
                    </div>
                `
            })
            .catch(error => {
                console.log(error);
            });
    }

    // REPLY CHAT
    function replyChat(sender_id, nameSender, dataRoom) {
        // message_content
        const inputMessage = document.querySelector('.message_content');
        const dataMessage = inputMessage.value;

        // notifikasi_id
        const inputNotifikasi = document.querySelector('.notifikasi_id');
        const dataNotifikasi = inputNotifikasi.value;

        // created_id
        const inputCreated = document.querySelector('.created_id');
        const dataCreated = inputCreated.value;

        addChatToHistory(dataMessage, dataCreated, dataRoom);

        axios.post('/panels/reply', {
                // sender_id: sender_id,
                // receiver_id: receiver_id,
                name_sender: nameSender,
                room_uuid: dataRoom,
                message_content: dataMessage,
                notifikasi: dataNotifikasi,
                created_at: dataCreated,
            })
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });

        console.log('terima sender_id : ', sender_id)
        // console.log('terima receiver_id : ', receiver_id)
        console.log('terima nameSender : ', nameSender)
        console.log('terima dataRoom : ', dataRoom)
        console.log('terima dataMessage : ', dataMessage)
        console.log('terima dataNotifikasi : ', dataNotifikasi)
        console.log('terima dataCreated : ', dataCreated)
    }

    function addChatToHistory(dataMessage, dataCreated, dataRoom) {
        const btnSubmitChat = document.querySelector('.btn-submit-chat');

        axios.get(`/panels/userNow/${dataRoom}`)
            .then(response => {
                const userNow = response.data.userNow;
                const getNameSender = response.data.getNameSender;

                // history chat
                if (userNow == getNameSender) {
                    const messageHTML = `
                        <div class="d-flex flex-row justify-content-end pt-1">
                            <div>
                                <p class="small p-2 me-3 mb-1 text-white rounded bg-primary">${dataMessage}</p>
                                <p class="small me-3 mb-3 rounded text-muted d-flex justify-content-end">${dataCreated}</p>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp" alt="avatar 1"
                                style="width: 45px; height: 100%;" class=" ml-1">
                        </div>
                    `;
                    btnSubmitChat.insertAdjacentHTML("beforebegin", messageHTML);
                } else {
                    const messageHTML = `
                        <div class="d-flex flex-row justify-content-start">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1"
                                style="width: 45px; height: 100%;" class="mr-1">
                            <div>
                                <p class="small p-2 ms-3 mb-1 rounded" style="background-color: #f5f6f7;">${dataMessage}</p>
                                <p class="small ms-3 mb-3 rounded text-muted">${dataCreated}</p>
                            </div>
                        </div>
                    `;
                    btnSubmitChat.insertAdjacentHTML("beforebegin", messageHTML);
                }
            })
            .catch(error => {
                console.log(error);
            });
    }
</script>
{{-- ========== --}}
{{-- CHAT PANEL --}}


{{-- Ticket realtime echo dan pusher SEND & GET notif --}}
<script>
    const findUser = <?php echo json_encode($userNow); ?>;
    const idUser = findUser.id;
    const getTotalNotif = document.querySelector('.get-ticket-total');
    const getTitleTotalNotif = document.querySelector('.title-total-ticket');
    const getDataNotifRealtime = document.querySelector('.get-data-realtime');
    const sendTotastNotif = document.querySelector('.toast-get');

    // console.log('id user saat ini', idUser)

    // SEND
    Echo.private("chats." + idUser).listen("NotifTicket", ({
        message
    }) => {
        // console.log(message);

        axios.get('{{ route('ticket.getTicketNotif') }}')
            .then(response => {
                const currentUser = response.data.currentUser;
                const getIdUserNow = response.data.idUserNow.id;

                getTotalNotif.innerHTML = `${message[0]}`;
                getTitleTotalNotif.innerHTML = `Anda Memiliki ${message[0]} Notifikasi Baru`;

                // reply ticket
                if (message[1].parent_id != null) {
                    getDataNotifRealtime.insertAdjacentHTML('afterbegin', `
                        <a href="${getIdUserNow == message[1].receiver_id ? `/tickets/${message[1].room_uuid}/${message[1].id}/response` : `/tickets/${message[1].room_uuid}/${message[1].id}`}" class=" ml-2" style="display: flex; align-items: center;">

                            <div style="display: flex; align-items: center; justify-content: center; height: 10px; width: 10px; margin-right: 10px;" class="ml-2">
                                <div class="fa fa-check-square text-primary"></div>
                            </div>

                            <p style="font-size: 12px;" class="notif-content ml-2">
                                <b>${message[1].name_sender}</b> telah reply ticket untuk <b>${message[1].department}</b> dengan complaint <b>${message[1].complaint}</b> <br> ${new Date(message[1].created_at).toLocaleString()}    
                            </p>

                        </a>
                    `);

                    // membuat elemen baru dengan class 'toast-notification' dan mengisi kontennya
                    var newElement = document.createElement('div');
                    newElement.classList.add('toast-notification', 'new');

                    newElement.style.height = "70px";
                    newElement.style.marginTop = "10px";
                    newElement.style.width = "250px";
                    newElement.style.padding = "10px";
                    newElement.style.border = "1px solid rgb(0, 69, 218)";
                    newElement.style.boxShadow = "rgba(0, 0, 0, 0.35) 0px 5px 15px";
                    newElement.style.borderRadius = "5px";
                    newElement.style.backgroundColor = "rgb(0, 69, 218)";
                    newElement.style.transition = "opacity 1s ease-in-out";
                    newElement.style.display = "flex";
                    newElement.style.alignItems = "center";
                    newElement.style.justifyContent = "center";

                    newElement.innerHTML = `
                        <a href="/tickets/${message[1].room_uuid}/${message[1].id}/response" class=" ml-2" style="display: flex; align-items: center;">
                            <i class="fas fa-bullhorn fa-2x mr-3 text-white"></i>
                            <div class="text-white"><b>${message[1].name_sender}</b> Telah Reply Ticket dengan Complaint <b>${message[1].complaint} </div>
                        </a>
                    `;

                    // memanggil elemen dengan id 'container'
                    var container = document.querySelector('.toast-get');

                    // menambahkan elemen baru ke dalam elemen dengan id 'container'
                    container.appendChild(newElement);

                    // batas waktu muncul notifnya
                    setTimeout(() => {
                        newElement.classList.remove('new');
                        newElement.classList.add('hide');
                        setTimeout(() => {
                                newElement.remove();
                            },
                            500);
                    }, 20000);
                } else {
                    // open ticket
                    getDataNotifRealtime.insertAdjacentHTML('afterbegin', `
                        <a href="${getIdUserNow == message[1].receiver_id ? `/tickets/${message[1].room_uuid}/${message[1].id}/response` : `/tickets/${message[1].room_uuid}/${message[1].id}`}" class=" ml-2" style="display: flex; align-items: center;">
                            <div style="display: flex; align-items: center; justify-content: center; height: 10px; width: 10px; margin-right: 10px;" class="ml-2">
                                <div class="fa fa-check-square text-primary"></div>
                            </div>
                            <p style="font-size: 12px;" class="notif-content ml-2">
                                <b>${message[1].name_sender}</b> telah membuat ticket untuk <b>${message[1].department}</b> dengan complaint <b>${message[1].complaint}</b> <br> ${new Date(message[1].created_at).toLocaleString()}    
                            </p>
                        </a>
                    `);


                    // membuat elemen baru dengan class 'toast-notification' dan mengisi kontennya
                    var newElement = document.createElement('div');
                    newElement.classList.add('toast-notification', 'new');

                    newElement.style.height = "70px";
                    newElement.style.marginTop = "10px";
                    newElement.style.width = "250px";
                    newElement.style.padding = "10px";
                    newElement.style.border = "1px solid rgb(0, 69, 218)";
                    newElement.style.boxShadow = "rgba(0, 0, 0, 0.35) 0px 5px 15px";
                    newElement.style.borderRadius = "5px";
                    newElement.style.backgroundColor = "rgb(0, 69, 218)";
                    newElement.style.transition = "opacity 1s ease-in-out";
                    newElement.style.display = "flex";
                    newElement.style.alignItems = "center";
                    newElement.style.justifyContent = "center";

                    newElement.innerHTML = `
                        <a href="/tickets/${message[1].room_uuid}/${message[1].id}/response" class=" ml-2" style="display: flex; align-items: center;">
                            <i class="fas fa-bullhorn fa-2x mr-3 text-white"></i>
                            <div class="text-white">User <b>${message[1].name_sender}</b> Membuat Ticket Dengan Complaint <b>${message[1].complaint} </div>
                        </a>
                    `;

                    // memanggil elemen dengan id 'container'
                    var container = document.querySelector('.toast-get');

                    // menambahkan elemen baru ke dalam elemen dengan id 'container'
                    container.appendChild(newElement);

                    // batas waktu muncul notifnya
                    setTimeout(() => {
                        newElement.classList.remove('new');
                        newElement.classList.add('hide');
                        setTimeout(() => {
                                newElement.remove();
                            },
                            500);
                    }, 20000);

                }
            })
            .catch(error => {
                console.log(error);
            });
    });

    // RESPONSE TICKET
    Echo.private("answer." + idUser).listen("ResponseTicket", ({
        answerTicket
    }) => {
        // console.log(answerTicket);

        axios.get('{{ route('ticket.getTicketNotif') }}')
            .then(response => {
                const currentUser = response.data.currentUser;

                getTotalNotif.innerHTML = `${answerTicket[0]}`;
                getTitleTotalNotif.innerHTML = `Anda Memiliki ${answerTicket[0]} Notifikasi Baru`;

                // membuat elemen baru dengan class 'toast-notification' dan mengisi kontennya
                var newElement = document.createElement('div');
                newElement.classList.add('toast-notification', 'new');

                newElement.style.height = "70px";
                newElement.style.marginTop = "10px";
                newElement.style.width = "250px";
                newElement.style.padding = "10px";
                newElement.style.border = "1px solid rgb(0, 69, 218)";
                newElement.style.boxShadow = "rgba(0, 0, 0, 0.35) 0px 5px 15px";
                newElement.style.borderRadius = "5px";
                newElement.style.backgroundColor = "rgb(0, 69, 218)";
                newElement.style.transition = "opacity 1s ease-in-out";
                newElement.style.display = "flex";
                newElement.style.alignItems = "center";
                newElement.style.justifyContent = "center";

                newElement.innerHTML = `
                    <a href="/tickets/${answerTicket[1].room_uuid}/${answerTicket[1].id}/response" class=" ml-2" style="display: flex; align-items: center;">
                        <i class="fas fa-exclamation-circle fa-2x mr-3 text-white"></i>
                        <div class="text-white">Ticket Dengan Complaint <b>${answerTicket[1].complaint}</b> Telah di Response </div>
                    </a>
                `;

                // memanggil elemen dengan id 'container'
                var container = document.querySelector('.toast-get');

                // menambahkan elemen baru ke dalam elemen dengan id 'container'
                container.appendChild(newElement);

                // var boxSound = document.querySelector('.toast-sound');
                // let notifSound = new Audio('storage/notifikasiSound.mp3');
                // boxSound.appendChild(notifSound);

                // batas waktu muncul notifnya
                setTimeout(() => {
                    newElement.classList.remove('new');
                    newElement.classList.add('hide');
                    setTimeout(() => {
                            newElement.remove();
                        },
                        500);
                }, 10000);
            })
            .catch(error => {
                console.log(error);
            });
    });

    // RESPONSE STATUS TICKET
    Echo.private("answerStatus." + idUser).listen("ResponseStatusTicket", ({
        answerStatusTicket
    }) => {
        // console.log('ini kondisi status setelah diubah: ', answerStatusTicket);

        var newElement = document.createElement('div');
        newElement.classList.add('toast-notification', 'new');

        newElement.style.height = "70px";
        newElement.style.marginTop = "10px";
        newElement.style.width = "250px";
        newElement.style.padding = "10px";
        newElement.style.border = "1px solid rgb(0, 69, 218)";
        newElement.style.boxShadow = "rgba(0, 0, 0, 0.35) 0px 5px 15px";
        newElement.style.borderRadius = "5px";
        newElement.style.backgroundColor = "rgb(0, 69, 218)";
        newElement.style.transition = "opacity 1s ease-in-out";
        newElement.style.display = "flex";
        newElement.style.alignItems = "center";
        newElement.style.justifyContent = "center";

        newElement.innerHTML = `
            <i class="fas fa-bell fa-2x mr-3 text-white"></i>
            <div class="text-white">
                Ticket Untuk Complaint
                <b>${answerStatusTicket[2]}</b> Telah di <b>${answerStatusTicket[0]}</b>
            </div>
        `;

        // memanggil elemen dengan id 'container'
        var container = document.querySelector('.toast-get');

        // menambahkan elemen baru ke dalam elemen dengan id 'container'
        container.appendChild(newElement);

        // batas waktu muncul notifnya
        setTimeout(() => {
            newElement.classList.remove('new');
            newElement.classList.add('hide');
            setTimeout(() => {
                    newElement.remove();
                },
                500);
        }, 10000);
    });

    // GET
    function getTicketStatus() {
        axios.get('{{ route('ticket.getTicketNotif') }}')
            .then(response => {
                const totalNotifikasi = response.data.totalNotif;
                const dataNotifikasi = response.data.dataTicket.data;
                const cekAdmin = response.data.cekAdmin;
                const getIdUserNow = response.data.idUserNow.id;
                // let sound = new Audio('storage/notifikasiSound.mp3');

                // console.log('ini suara', sound)
                // console.log(totalNotifikasi)
                // console.log('ini data notif', dataNotifikasi)
                // console.log('status : ', cekAdmin)

                getTotalNotif.innerHTML = `${totalNotifikasi}`;
                getTitleTotalNotif.innerHTML = `Anda Memiliki ${totalNotifikasi} Notifikasi Baru`;

                dataNotifikasi.forEach(data => {
                    if (data.notif_delete != 0) {
                        // reply ticket
                        if (data.parent_id != null) {
                            getDataNotifRealtime.innerHTML += `
                                    <a href="${getIdUserNow == data.receiver_id ? `/tickets/${data.room_uuid}/${data.id}/response` : `/tickets/${data.room_uuid}/${data.id}`}" class=" ml-2" style="display: flex; align-items: center;">

                                        <div style="display: flex; align-items: center; justify-content: center; height: 10px; width: 10px; margin-right: 10px;" class="ml-2">
                                            <div class="fa fa-check-square text-primary"></div>
                                        </div>        

                                        <p style="font-size: 12px;" class="notif-content ml-2">
                                            ${data.sender.roles.some(role => role.name === 'admin') ? '<b>admin</b> telah reply pada tiket' : `user <b>${data.sender.name}</b> telah reply pada tiket`}
                                            <b>${data.department}</b> dengan keluhan <b>${data.complaint}</b><br> 
                                            ${new Date(data.created_at).toLocaleString()}    
                                        </p>

                                    </a>
                                `;
                        } else {
                            // open ticket
                            getDataNotifRealtime.innerHTML += `
                                    <a href="${getIdUserNow == data.receiver_id ? `/tickets/${data.room_uuid}/${data.id}/response` : `/tickets/${data.room_uuid}/${data.id}`}" class=" ml-2" style="display: flex; align-items: center;">

                                        <div style="display: flex; align-items: center; justify-content: center; height: 10px; width: 10px; margin-right: 10px;" class="ml-2">
                                            <div class="fa fa-check-square text-primary"></div>
                                        </div>        

                                        <p style="font-size: 12px;" class="notif-content ml-2">
                                            user <b>${data.sender.name}</b> telah membuat ticket untuk <b>${data.department}</b> dengan complaint <b>${data.complaint}</b> <br> ${new Date(data.created_at).toLocaleString()}    
                                        </p>

                                    </a>
                                `;
                        }
                    }
                });
            })
            .catch(error => {
                console.log(error);
            });
    }

    getTicketStatus();
</script>
