<div>
<select>
        <option value="" @unless($pseudo) selected @endunless>
            Toutes les utilisateur
        </option>
        @foreach($users as $user)
            <option wire:model="search" value=" {{ $user->pseudo }}" {{ $pseudo == $user->pseudo ? 'selected' : '' }} >
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    <a href=" {{route('cards.create')}} ">Ajouter une carte</a>
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
                <td>{{ $card->pin }}</td>
                <td>{{ $card->machine_name }}</td>
                <td>{{ $card->password }}</td>
                <td>{{ $card->user->name }}</td>
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
                    <form action="{{ route($card->deleted_at ? 'cards.force.destroy' : 'cards.destroy', $card->id)}}" method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer cette carte')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$cards->links()}}
</div>
