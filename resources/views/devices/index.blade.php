@extends('layouts.app')

@section('contenu')
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
                <td>{{ $device->user_full_name }}</td>
                <td>{{ $device->state ? 'Ok': 'Not ok' }}</td>
                <td><a href="{{ route('devices.show', $device->id) }}">Voir</a></td>
                <td><a href="{{ route('devices.edit', $device->id) }} ">Modifier</a></td>
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