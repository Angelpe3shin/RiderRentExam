<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Details') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8">
        <div class="flex flex-col items-center">
            <img src="{{ $moto->motoModel->image_url }}" alt="{{ $moto->motoModel->name }}" class="mb-4 rounded">
            <h2 class="text-2xl font-semibold">{{ $moto->motoModel->brand->name }} {{ $moto->motoModel->name }}</h2>
            <p class="text-gray-600">{{ $moto->base_rent_price }} {{ $moto->base_rent_currency }}</p>
            <p class="text-gray-600">{{ $moto->production_year }}</p>
            <p class="text-gray-600">{{ $moto->status }}</p>
            <p class="text-gray-600">{{ $moto->motoModel->description }}</p>
            <p class="text-gray-600">{{ $moto->motoModel->fuel_tank_capacity }} {{ $moto->motoModel->fuel_tank_capacity_type }}</p>
            <p class="text-gray-600">{{ $moto->motoModel->max_speed }} km/h</p>
            <p class="text-gray-600">{{ $moto->motoModel->type }}</p>
            <p class="text-gray-600">{{ $moto->motoModel->weight }}</p>
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="input-sm form-control" name="start" />
                <span class="input-group-addon">to</span>
                <input type="text" class="input-sm form-control" name="end" />
            </div>
            <!-- Add more details as needed -->
        </div>
    </div>

    <x-footer />
</x-app-layout>