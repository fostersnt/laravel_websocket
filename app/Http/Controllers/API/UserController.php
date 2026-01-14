<?php

namespace App\Http\Controllers\API;

use App\Events\UserInfoUpdated;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function send(Request $request)
    {
        try {
            $request->validate([
                'userId' => 'required|integer'
            ]);

            $user = User::query()->find($request->userId);

            event(new UserInfoUpdated($user));

            return response()->json(['status' => 'success', 'message' => 'Event sent successfully']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'sent', 'message' => $th->getMessage()]);
        }
    }
}
