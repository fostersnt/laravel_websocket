<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

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

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('user.{userId}', function ($user, $userId) {
    // Log::info("CURRENTLY LOGGED-IN USER === " . json_encode($user) . "\nUSER ID === $userId");
    Log::info("CURRENTLY LOGGED-IN USER FROM REACT === " . json_encode($user) . "\nUSER ID === $userId");
    return $user->id === (int) $userId;
});
