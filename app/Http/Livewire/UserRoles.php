<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class UserRoles extends Component
{

    public User $user;

    protected $rules = [
        'user.role' => 'required|int'
    ];

    public function save()
    {
        $this->validate();
        $this->user->update($this->validate());
        $this->user->roles()->sync($this->input('roles', []));
        $this->card->save();
        $this->emit('roleupdated');
    }

    public function render()
    {
        $roles = Role::pluck('title', 'id');

        $this->user->load('roles');

        return view('livewire.user-roles', compact('roles'));
    }
}
