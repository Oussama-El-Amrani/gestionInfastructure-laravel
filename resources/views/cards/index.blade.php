<x-app-layout>
    @can('admin_access')
        <livewire:cards-table :id="0" />
    @endcan
    @can('user_access')
        <livewire:cards-table :id="Auth::user()->id"/>
    @endcan    
</x-app-layout>