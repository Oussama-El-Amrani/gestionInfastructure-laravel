<div class="container-fluid my-3">
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight">
            Liste des cartes
        </h2>
    </x-slot>

    <x-notification-flash />

    <div class="container-fluid py-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between mb-4">
                <input type="text" placeholder="Entrer nom d'une machine" class="rounded" wire:model.debounce.500ms="search">        
                @can('admin_access')
                    <a class="btn btn-info text-white" href="{{ route('cards.create') }}">Ajouter une carte</a>
                @endcan
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-hover mb-0">
                    <thead class="table-info">
                        <tr>
                            <x-table-header :direction="$orderDirection" name='pin' :field="$orderField">
                                Pin
                            </x-table-header>
                            <x-table-header :direction="$orderDirection" name='machine_name' :field="$orderField">
                                Machine
                            </x-table-header>
                            <th>Mot de passe</th>
                            @can('admin_access')
                                <th>Affectation</th>
                                <th>Profil</th>
                            @endcan
                            <x-table-header :direction="$orderDirection" name='certificate_expiration_date' :field="$orderField">
                                Expiration de certificat
                            </x-table-header>
                            <x-table-header :direction="$orderDirection" name='update_date' :field="$orderField">
                                Date de MÀJ
                            </x-table-header>
                            <th></th>
                            @can('admin_access')
                                <th></th>
                                <th></th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cards as $card)
                            <tr>
                                <td @can('admin_access') class="hover:bg-cyan-100" @endcan wire:click="startEditPin( {{ $card->id }} )">
                                    {{ $card->pin }}
                                </td>
                                <td @can('admin_access') class="hover:bg-cyan-100" @endcan wire:click="startEditMachineName( {{ $card->id }} )">
                                    {{ $card->machine_name }}
                                </td>
                                <td @can('admin_access') class="hover:bg-cyan-100" @endcan wire:click="startEditPassword( {{ $card->id }} )">
                                    {{ $card->password }}
                                </td>
                                @can('admin_access')
                                    <td class="hover:bg-cyan-100" wire:click="startEditUser( {{ $card->id }} ) ">
                                        {{ $card->user ? $card->user->name : '' }}
                                    </td>
                                    <td>
                                        @if($card->user)
                                            {{ $card->user->state ? 'Back': 'Front' }}
                                        @endif
                                    </td>
                                @endcan
                                <td> {{ date('d/m/Y',strtotime($card->certificate_expiration_date)) }} </td>
                                <td> {{ date('d/m/Y',strtotime($card->update_date)) }} </td>
                                <td>
                                    @if($card->deleted_at)
                                        @can('admin_access')
                                            <form action="{{ route('cards.restore', $card->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-primary mx-3 mx-lg-0 text-primary">Restaurer</button>
                                            </form>
                                        @endcan
                                    @else
                                        <a href="{{ route('cards.show', $card->id) }}" class="btn btn-sm btn-outline-primary mx-3 mx-lg-0">Afficher plus</a>
                                    @endif  
                                </td>
                                @can('admin_access')
                                    <td>
                                        @if($card->deleted_at)
                                        @else
                                            <a href="{{ route('cards.edit', $card->id) }} " class="btn btn-sm btn-outline-success mx-3 mx-lg-0">Modifier</a>
                                        @endif 
                                    </td>
                                @endcan
                                @can('admin_access')
                                    <td>
                                        <form action="{{ route($card->deleted_at ? 'cards.force.destroy' : 'cards.destroy', $card->id)}}" method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer cette carte')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mx-3 mx-lg-0 text-danger">Supprimer</button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                            @can('admin_access')
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
                            @endcan    
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $cards->links() }}
        </div>
    </div>
</div>
