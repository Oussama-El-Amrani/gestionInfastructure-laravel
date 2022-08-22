<td colspan="6">
    <form action="" wire:submit.prevent="save">
        <div wire:loading="Chargement-en-cours"></div>
        <div class="mb-3">
            <label>Réf Appareil</label>
            <input type="text" wire:model.defer='device.name' id='name' name='name' class="form-control @error('device.name')  is-invalid @enderror" value="{{ old('name',$device->name) }}">
            <div class="invalid-feedback">
                 @error('device.name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button class="btn btn-primary text-primary" type='submit' wire:loading.attr='disabled'>Sauvegarder</button>
    </form>
</td>
