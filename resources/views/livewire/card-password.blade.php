<td colspan="9">
    <form action="" wire:submit.prevent="save">
        <div wire:loading="Chargement-en-cours"></div>
        <div class="mb-3">
            <label>Password</label>
            <input type="text" wire:model.defer='card.password' id='password' name='name' class="@error('password') is-danger @enderror" value="{{ old('password',$card->password) }}">
        </div>
        @error('password')
                <p class="bg-danger">{{ $message }}</p>
        @enderror
        <button class="btn btn-primary text-primary" type='submit' wire:loading.attr='disabled'>Sauvegarder</button>
    </form>
</td>