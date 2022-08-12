<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\User;
use Livewire\Component;

class CardsTable extends Component
{
    public function render($pseudo = null)
    {
        $query = $pseudo ? User::wherePseudo($pseudo)->firstOrFail()->cards() : Card::query();
        $cards = $query->withTrashed()->paginate(7);
        $users = User::all();

        return view('livewire.cards-table', compact('cards', 'users', 'pseudo'));
    }
}
