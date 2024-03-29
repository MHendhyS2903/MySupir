<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('category', function () {
    return true();
});

Broadcast::channel('rate', function () {
    return true();
});

//Broadcast::channel('order-now', function ($orderNowID) {
//    return Auth::check();
//  });

Broadcast::channel('order.{orderID}', function () {
    return true();
});

Broadcast::channel('complaint.{complaintID}', function () {
    return true();
});

Broadcast::channel('cancellation.{cancelID}', function () {
    return true();
});

Broadcast::channel('post-order-ontime', function () {
    return true();
});
