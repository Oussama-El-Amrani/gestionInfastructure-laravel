<td colspan="6">
    <form action="" wire:submit.prevent="save">
        <div wire:loading=Chargement-en-cours></div>
        <div class="mb-3">   
            <label>Etat</label>
            <input type="radio" wire:model.defer="device.state" id="ok" name="state" value="1"
                {{$device->state ? 'checked' : ''}}>
            <label for="ok">Ok</label>
            <input type="radio" wire:model.defer="device.state" id="not_ok" name="state" value="0" {{$device->state ? '' : 'checked'}}>
            <label for="not_ok">Not Ok</label>
            <div class="invalid-feedback">
                @error('device.state')
                    <p class="bg-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary" type="submit" wire:loading.attr='disabled'>Sauvegarder</button>
    </form>
</td>
