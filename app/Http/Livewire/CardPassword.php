<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;

class CardPassword extends Component
{
    public Card $card;
    protected $rules = [
        'card.password' => 'required|string|max:100'    
    ];

    public function save()
    {
        $this->validate();
        $this->card->save();
        $this->emit('cardPasswordUpdated');
    }

    public function render()
    {
        return view('livewire.card-password');
    }
}
