<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public string $search = '';
    public int $editId = 0;
    protected $listeners = [
        'roleUpdated' => 'onRoleUpdated'
    ];
    public function startEdit(int $id)
    {
        $this->editId = $id;
    }

    public function onRoleUpdated()
    {
        session()->flash('success', "Votre changement a bien été mis à jour");

        $this->reset('editId');
    }

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
