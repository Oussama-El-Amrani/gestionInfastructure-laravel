<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Infomation sur L'utilisateur
        </h2>
    </x-slot>

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-end mb-4">
                    <a class="btn btn-info text-white" href="{{ route('users.create') }}">Ajouter un utilisateur</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-hover mb-0">
                    <tbody>
                        <tr>
                            <td class="table-secondary">#Id</td>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Nom & Prénom</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">E-mail vérifié à</td>
                            <td>{{ $user->email_verified_at }}</td>
                        </tr>
                        <tr>
                            <td class="table-secondary">les rôles</td>
                            <td>
                                @foreach($user->roles as $role)
                                   {{ $role->title }} 
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td class="table-secondary">Profile</td>
                            <td> {{ $user->state ? 'Back' : 'Front' }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
