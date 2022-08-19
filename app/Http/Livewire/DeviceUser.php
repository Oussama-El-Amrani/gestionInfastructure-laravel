<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Device;
use Livewire\Component;

class DeviceUser extends Component
{
    public Device $device;

    protected $rules =  [
        'device.user_id' => 'required|int'
    ];

    public function save()
    {
        $this->validate();
        $this->device->save();
        $this->emit('deviceUserUpdated');
    }
    
    public function render()
    {
        $users = User::all();
        return view('livewire.device-user', compact('users'));
    }
}
