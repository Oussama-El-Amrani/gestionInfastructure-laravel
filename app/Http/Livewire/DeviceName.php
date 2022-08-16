<?php

namespace App\Http\Livewire;

use App\Models\Device;
use Livewire\Component;

class DeviceName extends Component
{
    public Device $device;
    protected $rules = [
        'device.name' => 'Required|string|max:100'
    ];

    public function save()
    {
        $this->validate();
        $this->device->save();
        $this->emit('deviceUpdated');
    }

    public function render()
    {
        return view('livewire.device-name');
    }
}
