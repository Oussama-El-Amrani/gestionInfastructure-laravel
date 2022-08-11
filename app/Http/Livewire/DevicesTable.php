<?php

namespace App\Http\Livewire;

use App\Models\Device;
use Livewire\Component;
use Livewire\WithPagination;

class DevicesTable extends Component
{
    // use WithPagination;
    public string $search = '';

    public function render()
    {
        $devices = Device::where('name', 'LIKE',"%{$this->search}%")->withTrashed()->paginate(5);
        return view('livewire.devices-table', compact('devices'));
    }
}
