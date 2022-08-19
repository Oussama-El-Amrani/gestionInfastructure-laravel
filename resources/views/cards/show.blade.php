<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Information sur la carte
        </h2>
    </x-slot>
    
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-end mb-4">
                @can('admin_access')
                    <a class="btn btn-info text-white" href="{{ route('cards.create') }}">Ajouter une carte</a>
                @endcan
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-hover mb-0">
                    <tbody>
                        <tr>
                            <td class="table-secondary">#Id</td>
                            <td>{{ $card->id }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Pin</td>
                            <td>{{ $card->pin }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Expiration Certificat</td>
                            <td>{{ $card->certificate_expiration_date }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Machine</td>
                            <td>{{ $card->machine_name }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Mot de passe</td>
                            <td>{{ $card->password }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Dernier dernier Accès</td>
                            <td>{{ $card->last_access_date }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Date de MAJ</td>
                            <td>{{ $card->update_date }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Affectation</td>
                            <td>{{ $user_name }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Profil</td>
                            <td>{{ $user_profile? 'interne' : 'Front' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>