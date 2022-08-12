<?php

namespace App\Http\Livewire;

use App\Models\Device;
use Livewire\Component;

class DeviceState extends Component
{

    public Device $device;

    protected $rules = [
        'device.state' => 'required|boolean'
    ];

    public function save()
    {
        $this->validate();
        $this->device->save();
        $this->emit('deviceUpdated');
        }

    public function render()
    {
        return view('livewire.device-state');
    }
}
