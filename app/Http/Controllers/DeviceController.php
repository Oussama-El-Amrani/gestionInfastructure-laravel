<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Requests\DeviceRequest;

class DeviceController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pseudo = null)
    {
        $query = $pseudo ? User::wherePseudo($pseudo)->firstOrFail()->devices() : Device::query();
        $devices = $query->withTrashed()->oldest('name')->paginate(5);
        $users = User::all();
        // $devices = Device::paginate(5);
        
        return view('devices.index', compact('devices', 'users', 'pseudo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('devices.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceRequest $request)
    {
        Device::create($request->all());

        return redirect()->route('devices.index')->with('info',"Votre nouvelle device a bien été ajouter");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        $user = $device->user->name;
        return view('Devices.show', compact('device', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $users = User::all();
        return view('devices.edit', compact('device', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeviceRequest $deviceRequest, Device $device)
    {
        $device->update($deviceRequest->all());

        return redirect()->route('devices.index')->with('info','Votre device a bien été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        $device->delete();

        return back()->with('info', 'Cette device a bien été mis dans la corbeille');
    }

    public function forceDestroy($id)
    {
        Device::withTrashed()->whereId($id)->firstOrFail()->restore();

        return back()->with('info', 'Device a bien été supprimer devinitivement de la base de données');
    }

    public function restore($id)
    {
        Device::withTrashed()->whereId($id)->firstOrFail()->restore();

        return back()->with('info', 'Cette device a bien été restauré');
    }
}
