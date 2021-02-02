<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();
        return view('devices')->with('devices', $devices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::find($id);

        if($device != null){
            return view('deviceDetails')->with('device', $device);
        }
        else
        {
            return redirect()->route('devices')
                ->withErrors('Location with id=' . $id . ' not found!');
        }
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
        $this->validate($request,
            [
                'vendor' => 'required|max:100',
                'model' => 'required|max:100',
                'year' => 'required|max:50',
                'location' => 'required',
            ]
        );

        error_log($request->location);
        $device = Device::find($id);
        if($device != null){
            try{
                if($request->location == "-1"){
                    $device->borrowed = false;
                    $device->location_id = null;
                }
                else{
                    $device->borrowed = true;
                    $device->location_id = $request->location;
                }
                $device->vendor = $request->vendor;
                $device->model = $request->model;
                $device->year = $request->year;
                $device->save();
            }
            catch (Exception $ex){
                return redirect()->route('devices.index')
                    ->withErrors('Cannot update device ' . $id . '!');
            }
            return redirect()->route('devices.index');
        }
        else{
            redirect()->route('devices.index')
                ->withErrors('Device with id=' . $id . ' not found!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::find($id);
        if($device != null){
            Device::destroy($id);
            return redirect()->route('devices.index');
        }
        else{
            return redirect()->route('devices.index')
                ->withErrors('Cannot find device with ID: ' . $id);
        }
    }

    public function remove($id){

        $device = Device::find($id);

        if($device != null){
            $loId = $device->location_id;
            try{
                $device->location_id = null;
                $device->borrowed = false;
                $device->save();
            }
            catch(Exception $ex){
                error_log('Fails to remove device!');
                return redirect()->route('location.details')
                    ->with('location_id', $loId)
                    ->withErrors('Cannot remove device!');
            }
            return redirect()->route('location.details', $loId);
        }
        else{
            error_log('Can not find device!');
            return redirect()->route('index')
                ->withErrors('Cannot find device with ID: ' . $id);
        }
    }
}
