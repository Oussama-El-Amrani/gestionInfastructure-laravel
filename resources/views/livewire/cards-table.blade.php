<div>
    <input type="text" placeholder="Entrer nom d'une machine" wire:model.debounce.500ms="search">
    @can('admin_access')
        <a href="{{ route('cards.create') }}">Ajouter une carte</a>
    @endcan
    <table>
        <thead>
            <tr>
                <th>#id Card</th>
                <th>Pin</th>
                <th>Machine</th>
                <th>Mot de passe</th>
                <th>Affectation</th>
                <th>Profil</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cards as $card)
                <tr>
                    <td>{{ $card->id }}</td>
                    <td class=" " wire:click="startEditPin( {{ $card->id }} )">{{ $card->pin }}</td>
                    <td class=" " wire:click="startEditMachineName( {{ $card->id }} )">{{ $card->machine_name }}</td>
                    <td class=" " wire:click="startEditPassword( {{ $card->id }} )">{{ $card->password }}</td>
                    <td class=" " wire:click="startEditUser( {{ $card->id }} ) ">{{ $card->user->name }}</td>
                    <td>{{ $card->user->state ? 'interne': 'Stagiaire' }}</td>
                    <td>
                        @if($card->deleted_at)
                            <form action="{{ route('cards.restore', $card->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit">Restaurer</button>
                            </form>
                        @else
                            <a href="{{ route('cards.show', $card->id) }}">Voir plus</a>
                        @endif    
                    </td>
                    <td>
                        @if($card->deleted_at)
                        @else
                            <a href="{{ route('cards.edit', $card->id) }} ">Modifier</a>
                        @endif  
                    </td>    
                    <td>
                        @can('admin_access')
                        <form action="{{ route($card->deleted_at ? 'cards.force.destroy' : 'cards.destroy', $card->id)}}" method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer cette carte')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
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
    {{$cards->links()}}
</div>
