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

// Public channel for chat
Broadcast::channel('chat', function ($user) {
    return true; // Anyone can join the chat channel
});

// Private channel example
Broadcast::channel('private-chat.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
}); 