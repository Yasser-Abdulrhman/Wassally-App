<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Response\Utility\ResponseType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;





class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users',
            'identity_card' => 'required|unique:users',
            'address' => 'required|max:255',
            'password' => 'required'
        ]);
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $token = $user->createToken('API Token')->accessToken;
        $userRole = Role::where('name' ,'=' , 'user')->get();
        $user->assignRole($userRole);
        return (new UserResource($user))->additional(['access token' => $token , 'message' => 'Register  successfully'] , 200);
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

        return (new UserResource(auth()->user()))->additional(['access token' => $token , 'message' => 'Login  successfully'] , 200);

    }

    public function logOut(Request $request)
    {
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
         }

    }


}
