<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;

class CardPin extends Component
{
    public Card $card;
    protected $rules = [
        'card.pin' => 'required|string|max:100'
    ];

    public function save()
    {
        $this->validate();
        $this->card->save();
        $this->emit('cardPinUpdated');
    }

    public function render()
    {
        return view('livewire.card-pin');
    }
}
