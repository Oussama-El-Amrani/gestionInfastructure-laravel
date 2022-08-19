<?php

namespace App\Http\Livewire;

use App\Models\Device;
use Livewire\Component;
use Livewire\WithPagination;

class DevicesTable extends Component
{
    use WithPagination; 

    public string $search = '';
    public int $editStateId = 0;
    public int $editNameId = 0;
    public int $editUserId = 0;

    protected $listeners = [
        'deviceNameUpdated' => 'onDeviceNameUpdated',
        'deviceStateUpdated' => 'onDeviceStateUpdated',
        'deviceUserUpdated' => 'onDeviceUserUpdated'
    ];

    public function onDeviceNameUpdated()
    {
        session()->flash('info',"Le nom de vitre appareil est bien été mis à jour");
        $this->reset('editNameId');
    }

    public function onDeviceStateUpdated()
    {
        session()->flash('info',"L'etat de votre appareil a bien été mis à jour");
        $this->reset('editStateId');
    }

    public function onDeviceUserUpdated()
    {
        session()->flash('info',"L'utilisateur de cette carte à bien été modifier'");
        $this->reset('editUserId');
    }
    
    public function startEditState(int $id)
    {
        $this->editStateId = $id;
    }

    public function startEditName(int $id)
    {
        $this->editNameId = $id;
    }

    public function startEditUser(int $id)
    {
        $this->editUserId = $id;
    }


    public function updating($name, $value)
    {
        if ($name === 'search') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $devices = Device::where('name', 'LIKE',"%{$this->search}%")->withTrashed()->paginate(5);
        return view('livewire.devices-table', compact('devices'));
    }
}
