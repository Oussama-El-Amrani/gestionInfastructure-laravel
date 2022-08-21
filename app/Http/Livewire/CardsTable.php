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
        'cardUserUpdated' => 'onCardUserUpdated',
        'cardPinUpdated' => 'onCardPinUpdated',
        'cardPasswordUpdated' => 'onCardPasswordUpdated',
        'cardMachineNameUpdated' => 'onCardMachineNameUpdated',
    ];

    public function startEditUser(int $id)
    {
        $this->editUserId = $id;
    }

    public function onCardUserUpdated()
    {
        session()->flash('info',"L'utilisateur de votre carte est bien été mis à jour");

        $this->reset('editUserId');
    }

    public function startEditPin(int $id)
    {
        $this->editPinId = $id;
    }

    public function onCardPinUpdated()
    {
        session()->flash('info',"Pin de votre carte est bien été mis à jour");
        
        $this->reset('editPinId');
    }

    public function startEditPassword(int $id)
    {
        $this->editPasswordId = $id;
    }

    public function onCardPasswordUpdated()
    {
        session()->flash('info',"Le mot de passe de votre carte est bien été mis à jour");

        $this->reset('editPasswordId');
    }

    public function startEditMachineName(int $id)
    {
        $this->editMachineNameId = $id;
    }

    
    public function onCardMachineNameUpdated()
    {
        session()->flash('info',"La machine de votre carte a bien été mis à jour de votre carte est bien été mis à jour");

        $this->reset('editMachineNameId');
    }

    public function updating($name)
    {
        if ($name === 'search') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $cards = Card::where('machine_name', 'LIKE',"%{$this->search}%")->withTrashed()->paginate(5);

        return view('livewire.cards-table', compact('cards'));
    }
}
