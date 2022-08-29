<div class="container-fluid my-3">
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight">
            Liste des appareils
        </h2>
    </x-slot>

    <x-notification-flash />

    <div class="container-fluid py-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between mb-4">
                <input type="text" class="rounded" placeholder="Recherche un Appareil" wire:model.debounce.500ms="search">                
                @can('admin_access')
                    <a class="btn btn-info text-white" href=" {{route('devices.create')}} ">Ajouter un Appareil</a>
                @endcan 
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-hover mb-0 ">
                    <thead class="table-info">
                        <tr>
                            <x-table-header :direction="$orderDirection" name='name' :field="$orderField">
                                Réf Appareil
                            </x-table-header>
                            <x-table-header :direction="$orderDirection" name='location' :field="$orderField">
                                 Localisation
                            </x-table-header>
                            <x-table-header :direction="$orderDirection" name='date_taken' :field="$orderField">
                                Date de prise
                            </x-table-header>
                            <x-table-header :direction="$orderDirection" name='date_delivery' :field="$orderField">
                                Date prévue de remise
                            </x-table-header>
                            @can('admin_access')
                                <th>utilisateur</th>
                            @endcan
                            <x-table-header :direction="$orderDirection" name='state' :field="$orderField">Etat</x-table-header>
                            <th></th>
                            @can('admin_access')
                                <th></th>
                                <th></th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($devices as $device)
                        <tr>
                            <td @can('admin_access') class="hover:bg-cyan-100" @endcan wire:click="startEditName({{ $device->id }})">
                                {{ $device->name }}
                            </td>
                            <td>
                                {{ $device->location }}
                            </td>
                            <td>
                                {{  date('d/m/Y',strtotime($device->date_taken)) }}
                            </td>
                            <td>
                                {{  date('d/m/Y',strtotime($device->date_delivery)) }}
                            </td>
                            @can('admin_access')
                                <td class="hover:bg-cyan-100" wire:click="startEditUser( {{ $device->id }} )">
                                    {{ $device->user ? $device->user->name : '' }}
                                </td>
                            @endcan
                            <td class="hover:bg-cyan-100"  wire:click="startEditState( {{ $device->id }} )">
                                {{ $device->state ? 'Ok': 'Not ok' }}
                            </td>
                            <td>
                                @if($device->deleted_at)
                                    @can('admin_access')
                                    <form action="{{ route('devices.restore', $device->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button     type="submit" class="btn btn-sm btn-primary mx-3 mx-lg-0 text-primary">Restaurer</button>
                                    </form>
                                    @endcan
                                @else
                                    <a href="{{ route('devices.show', $device->id) }}" class="btn btn-sm btn-outline-primary mx-3 mx-lg-0">Afficher plus</a>
                                @endif    
                            </td>
                            @can('admin_access')
                                <td>
                                    @if($device->deleted_at)
                                    @else
                                        <a href="{{ route('devices.edit', $device->id) }} " class="btn btn-sm btn-outline-success mx-3 mx-lg-0">Modifier</a>
                                    @endif 
                                </td>
                            @endcan
                            @can('admin_access')
                                <td>
                                    <form action="{{ route($device->deleted_at ? 'devices.force.destroy' : 'devices.destroy', $device->id)}}" method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer ce device')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mx-3 mx-lg-0 text-danger">Supprimer</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                        @can('admin_access')
                            @if($editNameId === $device->id)    
                                <tr>
                                    <livewire:device-name :device="$device" :key="$device->id" />
                                </tr>
                            @endif
                            @if($editUserId === $device->id)    
                                <tr>
                                    <livewire:device-user :device="$device" :key="$device->id" />
                                </tr>
                            @endif
                        @endcan
                        @if($editStateId === $device->id)
                            <tr>
                                <livewire:device-state :device="$device" :key="$device->id" />
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                 
            </div>
            {{ $devices->links() }}
        </div>
    </div>
</div>