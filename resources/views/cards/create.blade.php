@extends('layouts.app')

@section('contenu')
    <form action="{{ route('cards.store') }}" method="POST">
        @csrf
        <label for="">Affecter à</label>
        <select name="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->name }} | {{ $user->state ? 'interne': 'Stagiaire' }}
                </option>
            @endforeach
        </select>
        <div class="mb-3 form-floating">
            <input type="text" name="pin" id="pin" class="form-control  @error('pin') is-danger @enderror" placeholder="Pin" value="{{old('pin')}}" required >
            <label for="pin">Pin</label>
            @error('pin')
                <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 form-floating">
            <input type="date" name="certificate_expiration_date" id="certificate_expiration_date" class="form-control  @error('certificate_expiration_date') is-danger @enderror" placeholder="Expiration certificat" value="{{old('certificate_expiration_date')}}" required >
            <label for="certificate_expiration_date">Expiration Certificat</label>
            @error('certificate_expiration_date')
                <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 form-floating">
            <input type="text" name="machine_name" id="machine_name" class="form-control  @error('machine_name') is-danger @enderror" placeholder="Nom du machine" value="{{ old('machine_name')}}" required >
            <label for="machine_name">Nom  du Machine</label>
            @error('machine_name')
                <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 form-floating">
            <input type="text" name="password" id="password" class="form-control  @error('password') is-danger @enderror" placeholder="Mot de passe" value="{{ old('password')} }" required >
            <label for="password">Mot de passe</label>
            @error('password')
                <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 form-floating">
            <input type="date" name="last_access_date" id="last_access_date" class="form-control  @error('last_access_date') is-danger @enderror" placeholder=" date dernier accès" value="{{ old('last_access_date') }}" required >
            <label for="last_access_date">date dernier accès</label>
            @error('last_access_date')
                <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 form-floating">
            <input type="date" name="update_date" id="update_date" class="form-control  @error('update_date') is-danger @enderror" placeholder="Date de MAJ" value="{{ old('update_date') }}" required >
            <label for="update_date">Date de MAJ</label>
            @error('update_date')
                <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Créer La carte</button>
    </form>
@endsection