<div>
    @if(session()->has('success'))
        {{ session('success') }}
    @endif
    
    <input type="text"  placeholder="Recherche un Device" wire:model.debounce.500ms="search">
    
    @can('admin_access')
        <a href=" {{route('devices.create')}} ">Ajouter un Device</a>
    @endcan    
    <table>
        <thead>
            <tr>
                <th>Réf.Device</th>
                <th>utilisateur</th>
                <th>Etat</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($devices as $device)
                <tr>
                    @php
                        if($device->user_id===Auth::user()->id){
                            echo('hh');
                        }
                        
                    @endphp
                    @if($device->user_id===Auth::user()->id)
                        <div>{{ Auth::user()->id }}</div>
                    @endif 
                    <td class=' ' wire:click="startEditName({{ $device->id }})">
                        {{ $device->name }}
                    </td>
                    <td class=" " wire:click="startEditUser( {{ $device->id }} )">
                        {{ $device->user->name }}
                    </td>
                    <td class=" " wire:click="startEditState( {{ $device->id }} )">
                        {{ $device->state ? 'Ok': 'Not ok' }}
                    </td>
                    <td>
                        @if($device->deleted_at)
                            <form action="{{ route('devices.restore', $device->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit">Restaurer</button>
                            </form>
                        @else
                            <a href="{{ route('devices.show', $device->id) }}">Voir plus</a>
                        @endif    
                    </td>
                    <td>
                        @if($device->deleted_at)
                        @else
                            <a href="{{ route('devices.edit', $device->id) }} ">Modifier</a>
                        @endif  
                    </td>    
                    <td>
                        @can('admin_access')
                            <form action="{{ route($device->deleted_at ? 'devices.force.destroy' : 'devices.destroy', $device->id)}}" method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer ce device')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @if($editStateId === $device->id)
                    <tr>
                        <livewire:device-state :device="$device" :key="$device->id" />
                    </tr>
                @endif
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
            @endforeach
        </tbody>
    </table>
    {{ $devices->links() }}
</div>
