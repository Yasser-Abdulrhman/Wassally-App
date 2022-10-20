<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrfail($id);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users',
            'identity_card' => 'required|unique:users',
            'address' => 'required|max:255',
        ]);
        $user = User::findOrfail($id);
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'identity_card' => $data['identity_card'],
            'address' => $data['address']
        ]);
        return (new UserResource($user))->additional(['status' => true , 'message' => 'Update user successfully'] , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return (new UserResource($user))->additional(['status' => true , 'message' => 'Delete user successfully'] , 200);

    }

    /**
     * Assign role to specific user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assignRoleToUser(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);
        $user = User::findOrfail($data['user_id']);
        $newRole = Role::findOrfail($data['role_id']);
        $user->syncRoles([$newRole]);
        return (new UserResource($user))->additional(['status' => true , 'message' => 'Assign role to user successfully'] , 200);

    }
    /**
     * Give permission to specific user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function givePermissionToUser(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'permissions.*.id' => 'required|exists:permissions,id',
        ]);
        $user = User::findOrfail($data['user_id']);
        $user->syncPermissions($data['permissions']);
        return (new UserResource($user))->additional(['status' => true , 'message' => 'Give permission to user successfully'] , 200);

    }


}
