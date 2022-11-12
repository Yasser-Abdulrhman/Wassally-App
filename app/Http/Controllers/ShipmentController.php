<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;


class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipments = Shipment::paginate(50);
        return ShipmentResource::collection($shipments);
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
            'name' =>  'required',
            'no_piece' =>  'required|number',
            'weight' =>  'number',
            'description' =>  'required',
            'sender_id' =>  'required|exists:users,id',
            'reciever_id' =>  'required|exists:users,id',
            'specific_address' =>  'required',
        ]);

        Shipment::create(array_merge($request->all(), ['shipment_number' => 'value']));

        $shipment = Shipment::create($request->all());
        return (new ShipmentResource($shipment))->additional(['status' => true , 'message' => 'create new shipment successfully'] , 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
