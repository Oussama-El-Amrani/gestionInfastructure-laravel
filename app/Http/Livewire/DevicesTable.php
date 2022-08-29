<?php

namespace App\Http\Livewire;

use App\Models\Device;
use Livewire\Component;
use Livewire\WithPagination;

class DevicesTable extends Component
{
    use WithPagination; 

    public $id;
    public string $search = '';
    public int $editStateId = 0;
    public int $editNameId = 0;
    public int $editUserId = 0;
    public string $orderDirection = 'DESC';
    public string $orderField = "date_taken";

    protected $listeners = [
        'deviceNameUpdated' => 'onDeviceNameUpdated',
        'deviceStateUpdated' => 'onDeviceStateUpdated',
        'deviceUserUpdated' => 'onDeviceUserUpdated'
    ];

    public function __construct($id)
    {
        $this->id = $id;
    }

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


    public function updating($name)
    {
        if ($name === 'search') {
            $this->resetPage();
        }
    }

    public function setOrderField(string $order)
    {
        if ($order === $this->orderField) {
            $this->orderDirection = $this->orderDirection === 'DESC' ? 'ASC' : 'DESC';
        } else {
            $this->orderField = $order;
            $this->reset('orderDirection');
            $this->orderDirection = 'DESC';
        }
    }

    public function render()
    {
        if($this->id){
            $devices = Device::where('user_id',"{$this->id}")
                             ->where('name', 'LIKE',"%{$this->search}%")
                             ->orderBy($this->orderField, $this->orderDirection)
                             ->paginate(5);
        } 
        if(!($this->id)){
            $devices = Device::where('name', 'LIKE',"%{$this->search}%")
                             ->withTrashed()
                             ->orderBy($this->orderField, $this->orderDirection)
                             ->paginate(5);
        }
        
        return view('livewire.devices-table', compact('devices'));
    }
}
