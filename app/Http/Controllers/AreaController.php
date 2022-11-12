<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;


class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::get();
        return AreaResource::collection($areas);
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
            'name' =>  'required|unique:areas,name',
            'code' =>  'required|unique:areas,code',
        ]);
        $area = Area::create($data);
        return (new AreaResource($area))->additional(['status' => true , 'message' => 'create new area successfully'] , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = Area::findOrfail($id);
        return (new AreaResource($area))->additional(['status' => true , 'message' => 'Show  area successfully'] , 200);
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
        $area = Area::findOrfail($id);
        $data = $request->validate([
            'name' => ['required',Rule::unique('areas')->ignore($area->name, 'name')],
            'code' => ['required',Rule::unique('areas')->ignore($area->code, 'code')],
        ]);
        $area->create([
            'name' => $data['name'],
            'code' => $data['code']
        ]);
        return (new AreaResource($area))->additional(['status' => true , 'message' => 'Update  area successfully'] , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::findOrfail($id);
        $area->delete();
        return (new AreaResource($role))->additional(['status' => true , 'message' => 'Delete area successfully'] , 200);
    }
}
