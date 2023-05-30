{{-- x-app-layout merupakan layouting yang disediakan laravel, x-app-layout mengarah ke file app.blade.php pada folder layouts --}}
<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        {{ __('You are logged in!') }}
    </div>
</x-app-layout>
