<?php

namespace App\Http\Controllers\API;

use App\Events\UserInfoUpdated;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // Log::info("USER LOGIN == STARTED");

        try {
            if ($validator->fails()) {
                $error_message = $validator->errors()->first();
                Log::info("USER LOGIN ERROR == " . $error_message);
                return response()->json(['state' => 'failed', 'message' => $error_message], 200);
            } else {
                $user = User::query()->find(2);
                event(new UserInfoUpdated($user));
                Log::info("USER LOGIN == SUCCESS");
                return response()->json(['state' => 'failed', 'message' => 'Login success'], 200);
            }
        } catch (\Throwable $th) {
            Log::info("USER LOGIN == " . $th->getMessage());
            return response()->json(['state' => 'failed', 'message' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validator->errors()->first()
            ]);
        }
        // return response()->json($request->email);
        $user = User::query()->find(2);
        if ($user) {
            $user->update($request->all());
            event(new UserInfoUpdated($user));
        return response()->json(['status' => 'success', 'message' => 'Event triggered successfully'], 200);
        } else {
        return response()->json(['status' => 'failed', 'message' => 'User not found'], 200);
        }
    }
}
