@extends('layouts.app')

@section('contenu')
    <select onchange="window.location.href = this.value">
        <option value="{{ route('devices.index') }}" @unless($pseudo) selected @endunless>
            Toutes les utilisateur
        </option>
        @foreach($users as $user)
            <option value=" {{ route('devices.user', $user->pseudo) }}" {{ $pseudo == $user->pseudo ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    <a href=" {{route('devices.create')}} ">Ajouter un Device</a>
    <table>
        <thead>
            <tr>
                <th>Réf.Device</th>
                @unless($pseudo)
                    <th>utilisateur</th>
                @endunless
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
                @unless($pseudo)
                    <td>{{ $device->user->name }}</td>
                @endunless
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
                    <form action="{{ route('devices.destroy', $device->id)}}" method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer ce device')">
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
@endsection