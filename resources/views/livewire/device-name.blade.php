<td colspan="6">
    <form action="" wire:submit="save">
        <div wire:loading="Chargement-en-cours"></div>
        <div class="mb-3">
            <label>Etat</label>
            <input type="text" wire:model.defer='device.name' id='name' name='name' class="@error('name') is-danger @enderror" value="{{ old('name',$device->name) }}">
        </div>
        @error('name')
                <p class="bg-danger">{{ $message }}</p>
        @enderror
        <button class="btn btn-primary" type='submit' wire:loading.attr='disabled'>Sauvegarder</button>
    </form>
</td>
