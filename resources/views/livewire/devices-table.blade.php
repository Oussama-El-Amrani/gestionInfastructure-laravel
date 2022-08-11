<div>
    <input type="text"  placeholder="Recherche un Device" wire:model="search">
    <a href=" {{route('devices.create')}} ">Ajouter un Device</a>
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
                <td>{{ $device->name }}</td>
                <td>{{ $device->user->name }}</td>
                <td>{{ $device->state ? 'Ok': 'Not ok' }}</td>
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
                    <form action="{{ route($device->deleted_at ? 'devices.force.destroy' : 'devices.destroy', $device->id)}}" method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer ce device')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$devices->links()}}
</div>
