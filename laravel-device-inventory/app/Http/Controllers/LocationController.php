<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view('index')->with('locations', $locations);
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
        $location = Location::find($id);
        if ($location != null)
        {
            return view('details')->with(['location' => $location, 'devices' => $location->devices]);
        }
        else
        {
            return redirect()->route('index')
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
                'name' => 'required|max:100',
                'size' => 'required|max:50'
            ]
        );

        $location = Location::find($id);
        if($location != null){
            try{
                $location->name = $request->name;
                $location->size = $request->size;
                $location->save();
            }
            catch (Exception $ex) {
                return redirect()->route('index')
                    ->withErrors('Cannot update location ' . $id . '!');
            }
            return redirect()->route('index');
        }
        else{
            redirect()->route('index')
                ->withErrors('Location with id=' . $id . ' not found!');
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
        $location = Location::find($id);
        if($location != null){
            if(count($location->devices) == 0){
                Location::destroy($id);
                return redirect()->route('index');
            }
            else{
                return redirect()->route('location.details', $location->id)
                    ->withErrors("Can not delete Location because devices are still assigned to it!");
            }
        }
        else{
            return redirect()->route('index')
                ->withErrors('Cannot find location with ID: ' . $id);
        }
    }
}
