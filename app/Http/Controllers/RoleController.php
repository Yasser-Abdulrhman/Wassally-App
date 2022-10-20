<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Resources\RoleResource;



class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        return RoleResource::collection($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' =>  'required|unique:roles,name',
            'permission.*.id' => 'required|exists:permissions,id',
        ]);
        $role = Role::create(['name' => $data['name']]);
        $role->syncPermissions($data['permission']);
        return (new RoleResource($role))->additional(['status' => true , 'message' => 'create new role successfully'] , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrfail($id);
        return (new RoleResource($role))->additional(['status' => true , 'message' => 'Show  role successfully'] , 200);
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
            'name' =>  'required|unique:roles,name',
            'permission.*.id' => 'required|exists:permissions,id',
        ]);
        $role = Role::findOrfail($id);
        $role->name = $data['name'];
        $role->save();
        $role->syncPermissions($data['permission']);

        return (new RoleResource($role))->additional(['status' => true , 'message' => 'Update role successfully'] , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrfail($id);
        $role->delete();
        return (new RoleResource($role))->additional(['status' => true , 'message' => 'Delete role successfully'] , 200);
    }
}
