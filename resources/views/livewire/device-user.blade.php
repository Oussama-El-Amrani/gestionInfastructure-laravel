<td colspan="6">
    <form action="" wire:submit.prevent='save'>
        <div wire:loading="Chargement-en-cours"></div>
        <div class="mb-3">
            <label for="user_id">Affecter à</label>
            <select name="user_id" id="user_id" wire:model.defer="device.user_id" class="form-control @error('device.user_id') is-invalid @enderror">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{$user->id===$device->user_id ? 'selected' : ''}} >
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('device.user_id')
                    <p class="bg-danger text-white">{{ $message }}</p>
                @enderror
            </div>
        </div>
       
        <button class="btn btn-primary text-primary" type="submit" wire:loading.attr='disabled'>Sauvegarder</button>
    </form>
</td>
