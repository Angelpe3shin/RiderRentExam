<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Hello, ') }}{{ Auth::user()->first_name }} {{ __('. Welcome in your Basket') }}
        </h2>
    </x-slot>

    <livewire:customer-basket-view />

    <x-footer />
</x-app-layout>
