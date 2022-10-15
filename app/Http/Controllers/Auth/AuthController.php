<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Response\Utility\ResponseType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $token = $user->createToken('API Token')->accessToken;

        return response([ 'user' => $user, 'token' => $token]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details.
            Please try again']);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        $user_with_all_direct_permissions = auth()->user()::with('roles.permissions')->get();



        // return (new OrderResource($this->orderService->show($order->id)))->additional(ResponseType::simpleResponse('Order item', true));



        return response(['user' => auth()->user(),'roles' =>$user_with_all_direct_permissions , 'token' => $token]);

    }


}
