<x-app-layout>
    @if(session()->has('info'))
        <div class="bg-info">
            {{ session('info')}}
        </div>
    @endif
    <form action="{{route('devices.update',$device->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="">Affecter à</label>
        <select name="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{$user->id == $device->user_id ? 'selected' : ''}} >
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <div class="mb-3 form-floating">
            <input type="text" name="name" id="name" class="form-control  @error('title') is-danger @enderror" placeholder="Réf.Device" value="{{ old('name',$device->name) }}" required >
            <label for="name">Réf.Device</label>
            @error('title')
                <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 form-floating">
            <input type="text" name="location" id="location" class="form-control  @error('location') is-danger @enderror" placeholder="localisation" value="{{old('location', $device->location)}}" required >
            <label for="location">localisation</label>
            @error('location')
                <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 form-floating">
            <input type="date" name="date_taken" id="date_taken" class="form-control  @error('date_taken') is-danger @enderror" placeholder="Date de prise" value="{{old('date_taken', $device->date_taken)}}" required >
            <label for="name">Date de prise</label>
            @error('date_taken')
                <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 form-floating">
            <input type="date" name="date_delivery" id="date_delivery" class="form-control  @error('date_delivery') is-danger @enderror" placeholder="Date de remise" value="{{old('date_delivery', $device->date_delivery)}}" required >
            <label for="name">Date de remise</label>
            @error('date_taken')
                <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 form-floating">
            <textarea name="comment" id="comment" class="form-control  @error('comment') is-danger @enderror" placeholder="Comment" >{{old('comment', $device->comment)}}</textarea>
            <label for="comment">commentaire</label>
            @error('comment')
                <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">   
            <label>Etat</label>
            <input type="radio" id="ok" name="state" value="1"
                {{$device->state ? 'checked' : ''}}>
            <label for="ok">Ok</label>
            <input type="radio" id="not_ok" name="state" value="0" {{$device->state ? '' : 'checked'}}>
            <label for="not_ok">Not Ok</label>
        </div>
        <button class="btn btn-primary" type="submit">mettre à jour</button>
    </form>
</x-app-layout>