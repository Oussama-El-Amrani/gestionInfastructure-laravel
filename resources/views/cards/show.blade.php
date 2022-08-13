<x-app-layout>
    <div>{{ $card->id }}</div>
    <div>{{ $card->pin }}</div>
    <div>{{ $card->certificate_expiration_date }}</div>
    <div> {{ $card->machine_name }} </div>
    <div> {{ $card->password }} </div>
    <div> {{ $card->last_access_date }} </div>
    <div> {{ $card->update_date }} </div>
    <div> {{ $user_name }} </div>
    <div> {{ $user_profile? 'interne' : 'stagiaire' }} </div>
</x-app-layout>