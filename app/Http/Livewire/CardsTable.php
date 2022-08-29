<?php

namespace App\Http\Livewire;

use App\Models\Card;
use DateTimeInterface;
use Livewire\Component;
use Livewire\WithPagination;

class CardsTable extends Component
{
    use WithPagination;

    public $id;
    public string $search = '';
    public int $editUserId = 0;
    public int $editPinId = 0;
    public int $editPasswordId = 0;
    public int $editMachineNameId = 0;
    public string $orderDirection = 'ASC';
    public string $orderField = "certificate_expiration_date";

    protected $listeners = [
        'cardUserUpdated' => 'onCardUserUpdated',
        'cardPinUpdated' => 'onCardPinUpdated',
        'cardPasswordUpdated' => 'onCardPasswordUpdated',
        'cardMachineNameUpdated' => 'onCardMachineNameUpdated',
    ];

    public function __construct($id)
    {
        $this->id = $id;
    }


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

    public function setOrderField(string $order)
    {
        if ($order === $this->orderField) {
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC' : 'ASC';
        } else {
            $this->orderField = $order;
            $this->reset('orderDirection');
            $this->orderDirection = 'ASC';
        }
    }

    public function render()
    {
        if ($this->id) {
            $cards = Card::where('user_id',"{$this->id}")
                         ->where('machine_name', 'LIKE',"%{$this->search}%")
                         ->orderBy($this->orderField, $this->orderDirection)
                         ->paginate(5);
        } 
        if (!($this->id)) {
            $cards = Card::where('machine_name', 'LIKE',"%{$this->search}%")
                         ->withTrashed()
                         ->orderBy($this->orderField, $this->orderDirection)
                         ->paginate(5);
        }
        
        return view('livewire.cards-table', compact('cards'));
    }
}
