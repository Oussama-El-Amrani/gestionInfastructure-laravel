    <td colspan="6">
    <form action="" wire:submit="save">
        <div wire:loading="Chargement-en-cours"></div>
        <div class="mb-3">
            <label>Machine name</label>
            <input type="text" wire:model.defer='card.machine_name' id='machine_name' name='machine_name' class="@error('machine_name') is-danger @enderror" value="{{ old('machine_name',$card->machine_name) }}">
        </div>
        @error('machine_name')
                <p class="bg-danger">{{ $message }}</p>
        @enderror
        <button class="btn btn-primary" type='submit' wire:loading.attr='disabled'>Sauvegarder</button>
    </form>
</td>

