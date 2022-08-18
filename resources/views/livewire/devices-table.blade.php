<div class="container-fluid my-3">
    @if(session()->has('info'))
        <div class="toast position-absolute end-0 bg-danger" data-bs-autohide="false" style="z-index: 10000;">
            <div class="toast-body text-white justify-c">
                <span>{{ session('info') }}</span> 
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <!-- <h6 class="mb-0">Appareil de test</h6> -->
                <input type="text"  placeholder="Recherche un Device" wire:model.debounce.500ms="search">                
                @can('admin_access')
                    <a class="btn btn-info text-white" href=" {{route('devices.create')}} ">Ajouter un Appareil</a>
                @endcan 
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-hover mb-0 ">
                    <thead class="table-info">
                        <tr>
                            <th>Réf Appareil</th>
                            <th>utilisateur</th>
                            <th>Etat</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($devices as $device)
                        <tr>
                            <td wire:click="startEditName({{ $device->id }})">
                                {{ $device->name }}
                            </td>
                            <td wire:click="startEditUser( {{ $device->id }} )">
                                {{ $device->user->name }}
                            </td>
                            <td wire:click="startEditState( {{ $device->id }} )">
                                {{ $device->state ? 'Ok': 'Not ok' }}
                            </td>
                            <td>
                                @if($device->deleted_at)
                                    <form action="{{ route('devices.restore', $device->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button     type="submit" class="btn btn-sm btn-primary mx-3 mx-lg-0 text-primary">Restaurer</button>
                                    </form>
                                @else
                                    <a href="{{ route('devices.show', $device->id) }}" class="btn btn-sm btn-outline-primary mx-3 mx-lg-0">Voir plus</a>
                                @endif    
                            </td>
                            <td>
                                @if($device->deleted_at)
                                @else
                                    <a href="{{ route('devices.edit', $device->id) }} " class="btn btn-sm btn-outline-success mx-3 mx-lg-0">Modifier</a>
                                @endif 
                            </td>
                            <td>
                                @can('admin_access')
                                    <form action="{{ route($device->deleted_at ? 'devices.force.destroy' : 'devices.destroy', $device->id)}}" method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer ce device')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mx-3 mx-lg-0 text-danger">Supprimer</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                        @if($editStateId === $device->id)
                            <tr>
                                <livewire:device-state :device="$device" :key="$device->id" />
                            </tr>
                        @endif
                        @if($editNameId === $device->id)    
                            <tr>
                                <livewire:device-name :device="$device" :key="$device->id" />
                            </tr>
                        @endif
                        @if($editUserId === $device->id)    
                            <tr>
                                <livewire:device-user :device="$device" :key="$device->id" />
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                 
            </div>
            {{ $devices->links() }}
        </div>
    </div>
</div>