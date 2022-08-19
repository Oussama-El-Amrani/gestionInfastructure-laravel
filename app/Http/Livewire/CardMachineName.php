<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;

class CardMachineName extends Component
{
    public Card $card;
    protected $rules = [
        'card.machine_name' => 'Required|string|max:100'
    ];  

    public function save()
    {
        $this->validate();
        $this->card->save();
        $this->emit('cardMachineNameUpdated');
    }

    public function render()
    {
        return view('livewire.card-machine-name');
    }
}
