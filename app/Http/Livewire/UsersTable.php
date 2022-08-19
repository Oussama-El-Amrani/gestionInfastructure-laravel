<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public string $search = '';

    public function updating(string $name)
    {
        if ($name === 'search') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $users = User::Where('name', 'LIKE', "%{$this->search}%")->with('roles')->withTrashed()->paginate(5);

        return view('livewire.users-table', compact('users'));
    }
}
