<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Motos') }}
        </h2>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    </x-slot>

    <div x-data="{ activeTab: 'motos' }">
        <!-- Табы -->
        <ul class="flex">
            <li @click="activeTab = 'motos'" :class="{ 'bg-gray-200 dark:bg-gray-700': activeTab === 'motos' }" class="cursor-pointer py-2 px-4">
                {{ __('Motos') }}
            </li>
            <li @click="activeTab = 'payment_rules'" :class="{ 'bg-gray-200 dark:bg-gray-700': activeTab === 'payment_rules' }" class="cursor-pointer py-2 px-4">
                {{ __('Payment Rules') }}
            </li>
            <li @click="activeTab = 'rent_point_conditions'" :class="{ 'bg-gray-200 dark:bg-gray-700': activeTab === 'rent_point_conditions' }" class="cursor-pointer py-2 px-4">
                {{ __('Rent Point Conditions') }}
            </li>
            <li @click="activeTab = 'about_us'" :class="{ 'bg-gray-200 dark:bg-gray-700': activeTab === 'about_us' }" class="cursor-pointer py-2 px-4">
                {{ __('About Us') }}
            </li>
        </ul>

        <!-- Содержимое табов -->
        <div x-show="activeTab === 'motos'">
            <livewire:moto-list/>
        </div>
        <div x-show="activeTab === 'payment_rules'">
            <x-payment-details-component />
        </div>
        <div x-show="activeTab === 'rent_point_conditions'">
            <x-rent-point-conditions-component />
        </div>
        <div x-show="activeTab === 'about_us'">
            <x-rent-point-info-component />
        </div>
    </div>

    <x-footer />
</x-app-layout>
