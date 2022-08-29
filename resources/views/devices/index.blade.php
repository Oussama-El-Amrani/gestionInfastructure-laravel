<x-app-layout>
    @can('admin_access')
        <livewire:devices-table :id="0"/>
    @endcan
    @can('user_access')
        <livewire:devices-table :id="Auth::user()->id" />
    @endcan
</x-app-layout>