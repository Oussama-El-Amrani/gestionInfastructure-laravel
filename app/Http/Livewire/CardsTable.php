<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;
use Livewire\WithPagination;

class CardsTable extends Component
{
    use WithPagination;

    public string $search = '';
    public int $editUserId = 0;
    public int $editPinId = 0;
    public int $editPasswordId = 0;
    public int $editMachineNameId = 0;
    protected $listeners = [
        'userUpdated' => 'onUserUpdated'
    ];

    public function startEditUser(int $id)
    {
        $this->editUserId = $id;
    }

    public function startEditPin(int $id)
    {
        $this->editPinId = $id;
    }

    public function startEditPassword(int $id)
    {
        $this->editPasswordId = $id;
    }

    public function startEditMachineName(int $id)
    {
        $this->editMachineNameId = $id;
    }

    public function onUserUpdated()
    {
        session()->flash('success',"Votre changement à bien été mis à jour");

        $this->reset();
    }

    public function updating($name)
        {
        if ($name === 'search') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $cards = Card::where('machine_name', 'LIKE',"%{$this->search}%")->withTrashed()->paginate(7);

        return view('livewire.cards-table', compact('cards'));
    }
}
