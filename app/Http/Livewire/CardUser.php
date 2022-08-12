<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\User;
use Livewire\Component;

class CardUser extends Component
{

    public Card $card;

    protected $rule = [
        'card.user_id' => 'required|int'
    ];

    public function save()
    {
        $this->validate();
        $this->card->save();
        $this->emit('userUpdated');
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.card-user', compact('users'));
    }
}