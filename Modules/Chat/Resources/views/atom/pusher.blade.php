{{-- realtime echo dan pusher SEND & GET notif --}}
{{-- <script>
    const findUser = <?php echo json_encode($userNow); ?>;
    const idUser = findUser.id;
    const getTotalNotif = document.querySelector('.get-ticket-total');
    const getTitleTotalNotif = document.querySelector('.title-total-ticket');
    const getDataNotifRealtime = document.querySelector('.get-data-realtime');

    const sendTotastNotif = document.querySelector('.toast-notification');

    // SEND
    Echo.private("chats." + idUser).listen("NotifTicket", ({
        message
    }) => {
        console.log(message);

        axios.get('{{ route('ticket.getTicketNotif') }}')
            .then(response => {
                const currentUser = response.data.currentUser;

                getTotalNotif.innerHTML = `${message[0]}`;
                getTitleTotalNotif.innerHTML = `Anda Memiliki ${message[0]} Notifikasi Baru`;

                // reply ticket
                if (message[1].parent_id != null) {
                    getDataNotifRealtime.innerHTML += `
                            <a href="/tickets/${message[1].room_uuid}" class=" ml-2" style="display: flex; align-items: center;">

                                <div style="display: flex; align-items: center; justify-content: center; height: 10px; width: 10px; margin-right: 10px;" class="ml-2">
                                    ${!message[1].notifikasi ? '<div class="fa fa-check-square text-primary"></div>' : '<div class="fa fa-check-square"></div>'}
                                </div>

                                <p style="font-size: 12px;" class="notif-content ml-2">
                                    <b>${message[1].name_sender}</b> telah reply ticket untuk <b>${message[1].department}</b> dengan complaint <b>${message[1].complaint}</b> <br> ${new Date(message[1].created_at).toLocaleString()}    
                                </p>

                            </a>
                        `;
                } else {
                    // open ticket
                    getDataNotifRealtime.innerHTML += `
                        <a href="/tickets/${message[1].room_uuid}" class=" ml-2" style="display: flex; align-items: center;">

                            <div style="display: flex; align-items: center; justify-content: center; height: 10px; width: 10px; margin-right: 10px;" class="ml-2">
                                ${!message[1].notifikasi ? '<div class="fa fa-check-square text-primary"></div>' : '<div class="fa fa-check-square"></div>'}
                            </div>

                            <p style="font-size: 12px;" class="notif-content ml-2">
                                <b>${message[1].name_sender}</b> telah membuat ticket untuk <b>${message[1].department}</b> dengan complaint <b>${message[1].complaint}</b> <br> ${new Date(message[1].created_at).toLocaleString()}    
                            </p>

                        </a>
                    `;
                    sendTotastNotif.innerHTML += `<h1>ngewek</h1>`;
                }
            })
            .catch(error => {
                console.log(error);
            });
    });

    // GET
    function getTicketStatus() {
        axios.get('{{ route('ticket.getTicketNotif') }}')
            .then(response => {
                const totalNotifikasi = response.data.totalNotif;
                const dataNotifikasi = response.data.dataTicket;
                const cekAdmin = response.data.cekAdmin;

                console.log(totalNotifikasi)
                console.log('ini data notif', dataNotifikasi)
                console.log('status : ', cekAdmin)

                getTotalNotif.innerHTML = `${totalNotifikasi}`;
                getTitleTotalNotif.innerHTML = `Anda Memiliki ${totalNotifikasi} Notifikasi Baru`;

                dataNotifikasi.forEach(data => {
                    if (data.notif_delete != 0) {
                        // reply ticket
                        if (data.parent_id != null) {
                            getDataNotifRealtime.innerHTML += `
                                    <a href="/tickets/${data.room_uuid}" class=" ml-2" style="display: flex; align-items: center;">

                                        <div style="display: flex; align-items: center; justify-content: center; height: 10px; width: 10px; margin-right: 10px;" class="ml-2">
                                            ${!data.notifikasi ? '<div class="fa fa-check-square text-primary"></div>' : '<div class="fa fa-check-square"></div>'}
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
                                    <a href="/tickets/${data.room_uuid}" class=" ml-2" style="display: flex; align-items: center;">

                                        <div style="display: flex; align-items: center; justify-content: center; height: 10px; width: 10px; margin-right: 10px;" class="ml-2">
                                            ${!data.notifikasi ? '<div class="fa fa-check-square text-primary"></div>' : '<div class="fa fa-check-square"></div>'}
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
</script> --}}
