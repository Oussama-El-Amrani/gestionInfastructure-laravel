<td colspan="9">
    <form action="" wire:submit.prevent='save'>
        <div wire:loading="Chargement-en-cours"></div>
        <div class="mb-3">
            <label for="user_id">Affecter à</label>
            <select name="user_id" id="user_id" wire:model.defer="card.user_id" class="form-control @error('card.user_id') is-invalid @enderror">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{$user->id===$card->user_id ? 'selected' : ''}} >
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-info text-primary" type="submit" wire:loading.attr='disabled'>Sauvegarder</button>
    </form>
</td>
