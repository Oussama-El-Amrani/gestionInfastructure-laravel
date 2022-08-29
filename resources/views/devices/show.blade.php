<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Information Sur l'appareil
      </h2>
    </x-slot>

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-end mb-4">
                @can('admin_access')
                    <a class="btn btn-info text-white" href="{{ route('devices.create') }}">Ajouter un appareil</a>
                @endcan
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-hover mb-0">
                    <tbody>
                        <tr>
                            <td class="table-secondary">Réf.Appareil</td>
                            <td>{{ $device->name }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Localisation</td>
                            <td>{{ $device->location }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Utilisateur</td>
                            <td>{{ $device->user ? $device->user->name : '' }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Etat</td>
                            <td>{{ $device->state ? 'Ok' : 'Not ok' }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Date de prise</td>
                            <td>{{ date('d/m/Y',strtotime($device->date_taken))
                                }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Date prévue de remise</td>
                            <td>{{ date('d/m/Y',strtotime($device->date_delivery)) }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Commentaire</td>
                            <td>{{ $device->comment }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>