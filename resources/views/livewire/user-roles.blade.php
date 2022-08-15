<td colspan="6">
    <form action="" wire:submit='save'>
        <div wire:loading="Chargement-en-cours"></div>
        <div class="mb-3">
            <label for="role"></label>
            <select name='roles[]' id='role' wire:model.defer="user.role">
                @foreach($roles as $id =>  $role)
                    <option value="{{ $id }}"  {{ in_array($id, $user->roles->pluck('id')->toArray()) ? ' selected' : '' }}>
                        {{ $role }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-info" type="submit" wire:loading.attr='disabled'>Sauvegarder</button>
    </form>
</td>
