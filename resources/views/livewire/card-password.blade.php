<td colspan="9">
    <form action="" wire:submit.prevent="save">
        <div wire:loading="Chargement-en-cours"></div>
        <div class="mb-3">
            <label>Password</label>
            <input type="text" wire:model.defer='card.password' id='password' name='name' class="form-control @error('card.password') is-invalid @enderror" value="{{ old('password',$card->password) }}">
            <div class="invalid-feedback">
                @error('card.password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary text-primary" type='submit' wire:loading.attr='disabled'>Sauvegarder</button>
    </form>
</td>