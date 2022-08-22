<td colspan="9">
    <form action="" wire:submit.prevent="save">
        <div wire:loading="Chargement-en-cours"></div>
        <div class="mb-3">
            <label>Pin</label>
            <input type="text" wire:model.defer='card.pin' id='pin' name='pin' class="form-control  @error('card.pin') is-danger @enderror" value="{{ old('pin',$card->pin) }}">
            <div class="invalid-feedback">
                @error('card.pin')
                    <p>{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <button class="btn btn-primary" type='submit' wire:loading.attr='disabled'>Sauvegarder</button>
    </form>
</td>

