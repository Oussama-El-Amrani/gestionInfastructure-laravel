<td colspan="5">
    <form action="" wire:submit='save'>
        <div wire:loading="Changement-en-cours"></div>
        <div class="mb-3">
            <label for="">Affecter à</label>
            <select name="user_id" wire:model.defer="card.user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id === $card->user_id ? 'selected' : '' }} >
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-info" type="submit" wire:loading.attr='disabled'>Sauvegarder</button>
    </form>
</td>
