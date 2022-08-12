<?php

namespace App\Http\Livewire;

use App\Models\Device;
use Livewire\Component;
use Livewire\WithPagination;

class DevicesTable extends Component
{
    use WithPagination; 

    public string $search = '';
    public int $editId = 0;
    public array $selection = [];
    protected $listeners =  [
        'deviceUpdated' => 'onDeviceUpdated'
    ];

    public function startEdit(int $id)
    {
        $this->editId = $id;
    }

    public function onDeviceUpdated()
    {
        session()->flash('success',"L'etat de votre appareil à bien été mis à jour");

        $this->reset('editId');
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
