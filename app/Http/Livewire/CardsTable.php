<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;
use Livewire\WithPagination;

class CardsTable extends Component
{
    use WithPagination;

    public string $search = '';
    public int $editId = 0;
    protected $listeners = [
        'userUpdated' => 'onUserUpdated'
    ];

    public function startEdit(int $id)
    {
        $this->editId = $id;
    }

    public function onUserUpdated()
    {
        session()->flash('success',"Votre changement à bien été mis à jour");

        $this->reset('editId');
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
