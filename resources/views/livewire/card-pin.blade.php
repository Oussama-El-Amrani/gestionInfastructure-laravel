<td colspan="6">
    <form action="" wire:submit="save">
        <div wire:loading="Chargement-en-cours"></div>
        <div class="mb-3">
            <label>Pin</label>
            <input type="text" wire:model.defer='card.pin' id='pin' name='pin' class="@error('pin') is-danger @enderror" value="{{ old('pin',$card->pin) }}">
        </div>
        @error('pin')
                <p class="bg-danger">{{ $message }}</p>
        @enderror
        <button class="btn btn-primary" type='submit' wire:loading.attr='disabled'>Sauvegarder</button>
    </form>
</td>

