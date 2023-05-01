<?php

use Illuminate\Support\Facades\Route;
use Modules\Chat\Http\Controllers\{UserController, DashboardController, PanelsController, TicketController};
use Chatify\Http\Controllers\MessagesController;

Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard', DashboardController::class);

    // USER MANAJEMEN
    Route::resource('/user', UserController::class);



    // CHAT PANEL
    Route::controller(PanelsController::class)->group(function () {
        Route::get('/panels', 'getContactAll')->name('panel.getContactAll');
        Route::get('/panels/find', 'searchUser')->name('panel.searchUser');
        Route::get('/panels/create/{id}', 'createChat')->name('panel.createChat');

        Route::get('/panels/userNow/{uuid}', 'getNameUserNow');
        Route::get('/panels/{uuid}/{id}', 'showHistoryChat')->name('panel.showHistoryChat');

        Route::post('/panels/store', 'storeChat')->name('panel.storeChat');
        Route::post('/panels/reply', 'replyChat')->name('panel.replyChat');
    });



    // TICKET
    Route::controller(TicketController::class)->group(function () {
        Route::post('/tickets/sender', 'storeSender')->name('ticket.storeSender');
        Route::post('/tickets/receiver', 'storeReceiver')->name('ticket.storeReceiver');
        Route::get('/tickets/inbox/notif', 'getTicketNotif')->name('ticket.getTicketNotif');

        Route::middleware(['role:admin'])->group(function () {
            Route::get('/tickets/inbox', 'indexReceiver')->name('ticket.indexReceiver');
            Route::get('tickets/{uuid}/{ticket}/replyAdmin', 'showReplyFormAdmin')->name('ticket.replyAdmin');
            Route::get('/tickets/inbox/{status?}', 'indexReceiver')->name('inbox.filterTicketAdmin');
        });

        Route::get('/tickets/sent', 'indexSender')->name('ticket.indexSender');
        Route::get('/tickets/sent/{status?}', 'indexSender')->name('inbox.filterTicketUser');

        Route::get('/tickets/notifications/list', 'listNotification')->name('ticket.listNotification');
        Route::get('/tickets/notifications/list/{notif?}', 'listNotification')->name('ticket.cekNotif');

        Route::get('/tickets/create/{user}', 'create')->name('ticket.create');

        // untuk sender
        Route::get('/tickets/{uuid}/{id}', 'show')->name('ticket.show');
        // untuk receiver
        Route::get('/tickets/{uuid}/{id}/response', 'showResponse')->name('ticket.showResponse');

        Route::get('tickets/{uuid}/{ticket}/replyTicket', 'showReplyForm')->name('ticket.reply');

        Route::post('/tickets/{message}', 'reply')->name('ticket.reply.post');
        Route::post('/tickets/{message}/superuser', 'replyAdmin')->name('ticket.reply.postAdmin');

        Route::put('/ticket/{uuidNow}/status/close', 'updateStatus')->name('ticket.status.close');
        Route::put('/ticket/{uuidNow}/status/open', 'updateStatus')->name('ticket.status.open');

        Route::delete('/tickets/receiver/{id}', 'destroyReceiver')->name('ticket.destroyReceiver');
        Route::delete('/tickets/sender/{id}', 'destroySender')->name('ticket.destroySender');

        Route::delete('/ticket/delete/{uuid}', 'deleteTicketHistory')->name('ticket.deleteTicketHistory');

        Route::put('/delete-notification', 'updateAllNotifDelete');
        Route::put('/delete-notif/{senderId}/{receiverId}', 'updateUserNotifDelete')->name('ticket.updateUserNotifDelete');
    });
});
