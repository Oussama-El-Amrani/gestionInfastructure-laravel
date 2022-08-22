    <td colspan="9">
    <form action="" wire:submit.prevent="save">
        <div wire:loading="Chargement-en-cours"></div>
        <div class="mb-3">
            <label>Machine name</label>
            <input type="text" wire:model.defer='card.machine_name' id='machine_name' name='machine_name' class="form-control @error('card.machine_name') is-invalid @enderror" value="{{ old('machine_name',$card->machine_name) }}">
            <div class="invalid-feedback">
                @error('card.machine_name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
        </div>
       
        <button class="btn btn-primary text-primary" type='submit' wire:loading.attr='disabled'>Sauvegarder</button>
    </form>
</td>