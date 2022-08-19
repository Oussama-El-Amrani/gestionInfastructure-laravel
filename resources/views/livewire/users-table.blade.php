<div>
    <x-slot name="header">
      <h2 class="font-semibold text-l text-gray-800 leading-tight">
            Liste des utilisateurs
      </h2>
  </x-slot>

    @if(session()->has('info'))
        <div class="toast position-absolute end-0 bg-info show " data-bs-autohide="false" style="z-index: 10000;">
            <div class="toast-body text-white justify-c">
                <span>{{ session('info') }}</span> 
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

    @if(session()->has('delete'))
        <div class="toast position-absolute end-0 bg-danger show " data-bs-autohide="false" style="z-index: 10000;">
            <div class="toast-body text-white justify-c">
                <span>{{ session('delete') }}</span> 
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

    @if(session()->has('restore'))
        <div class="toast position-absolute end-0 bg-success show " data-bs-autohide="false" style="z-index: 10000;">
            <div class="toast-body text-white justify-c">
                <span>{{ session('restore') }}</span> 
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <!-- <h6 class="mb-0">list du Utilisateurs</h6> -->
                <input type="text" placeholder="Entrez un nom d'utilisateur" wire:model.debounce.500ms="search">              
                @can('admin_access')
                    <a class="btn btn-info text-white" href="{{ route('users.create') }}">Ajouter un utilisateur</a>
                @endcan 
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-hover mb-0 ">
                    <thead class="table-info">
                        <tr>
                            <th>#ID</th>
                            <th>Nom & Prenom</th>
                            <th>Email</th>
                            <th>state</th>
                            <th>Roles</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->state ? 'Back' : 'Front' }}
                                </td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span>
                                            {{ $role->title }}
                                        </span>
                                    @endforeach
                                </td>
                                <td>
                                    @if($user->deleted_at)
                                        <form action=" {{ route('users.restore', $user->id) }} " method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type='submit' class="btn btn-sm btn-primary mx-3 mx-lg-0 text-primary">Restaurer</button>
                                        </form>
                                    @else
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-outline-primary mx-3 mx-lg-0">Afficher plus</a>
                                    @endif
                                    @unless($user->deleted_at)    
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-success mx-3 mx-lg-0">Modifier</a>

                                        <form action=" {{ route('users.destroy', $user->id) }} " method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer ce utilisateur')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mx-3 mx-lg-0 text-danger">Supprimer</button>
                                        </form>
                                    @endunless    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$users->links()}}
        </div>
    </div>
</div>