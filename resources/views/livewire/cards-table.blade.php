<div class="container-fluid my-3">
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight">
            Liste des cartes
        </h2>
    </x-slot>

    <x-notification-flash />

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <!-- <h6 class="mb-0">Cartes</h6> -->
                <input type="text" placeholder="Entrer nom d'une machine" wire:model.debounce.500ms="search">        
                @can('admin_access')
                    <a class="btn btn-info text-white" href="{{ route('cards.create') }}">Ajouter une carte</a>
                @endcan
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-hover mb-0">
                    <thead class="table-info">
                        <tr>
                            <th>#id Card</th>
                            <th>Pin</th>
                            <th>Machine</th>
                            <th>Mot de passe</th>
                            <th>Affectation</th>
                            <th>Profil</th>
                            <th></th>
                            <th></th>
                            @can('admin_access')
                                <th></th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cards as $card)
                            <tr>
                                <td>
                                    {{ $card->id }}
                                </td>
                                <td class="hover:bg-cyan-100" wire:click="startEditPin( {{ $card->id }} )">
                                    {{ $card->pin }}
                                </td>
                                <td class="hover:bg-cyan-100" wire:click="startEditMachineName( {{ $card->id }} )">
                                    {{ $card->machine_name }}
                                </td>
                                <td class="hover:bg-cyan-100" wire:click="startEditPassword( {{ $card->id }} )">
                                    {{ $card->password }}
                                </td>
                                <td class="hover:bg-cyan-100" wire:click="startEditUser( {{ $card->id }} ) ">
                                    {{ $card->user->name }}
                                </td>
                                <td>
                                    {{ $card->user->state ? 'Back': 'Front' }}
                                </td>
                                <td>
                                    @if($card->deleted_at)
                                        <form action="{{ route('cards.restore', $card->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-primary mx-3 mx-lg-0 text-primary">Restaurer</button>
                                        </form>
                                    @else
                                        <a href="{{ route('cards.show', $card->id) }}" class="btn btn-sm btn-outline-primary mx-3 mx-lg-0">Afficher plus</a>
                                    @endif  
                                </td>
                                <td>
                                    @if($card->deleted_at)
                                    @else
                                        <a href="{{ route('cards.edit', $card->id) }} " class="btn btn-sm btn-outline-success mx-3 mx-lg-0">Modifier</a>
                                    @endif 
                                </td>
                                <td>
                                    @can('admin_access')
                                        <form action="{{ route($card->deleted_at ? 'cards.force.destroy' : 'cards.destroy', $card->id)}}" method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer cette carte')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mx-3 mx-lg-0 text-danger">Supprimer</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                            @if($editUserId === $card->id)
                                <tr>
                                    <livewire:card-user :card="$card"
                                    :key="$card->id" />
                                </tr>
                            @endif
                            @if($editPinId === $card->id)
                                <tr>
                                    <livewire:card-pin :card="$card" :key="$card->id"/>
                                </tr>
                            @endif
                            @if($editPasswordId === $card->id)
                                <tr>
                                    <livewire:card-password :card="$card" :key="$card->id" />
                                </tr>
                            @endif
                            @if($editMachineNameId === $card->id)
                                <tr>
                                    <livewire:card-machine-name :card="$card" :key="$card->id" />
                                </tr>
                            @endif    
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $cards->links() }}
        </div>
    </div>
</div>
