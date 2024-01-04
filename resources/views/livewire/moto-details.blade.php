<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <div class="flex justify-center space-x-4 mb-4 mt-4 min-w-full items-center">
        <label for="datepicker" class="font-semibold text-l text-gray-800 dark:text-gray-200 leading-tight w-auto">{{ __('Pick rent dates') }}:</label>
        <input type="text" class="w-1/4 rounded ml-4 form-control rounded ml-4" id="datepicker" name="datepicker">
    </div>

    <div class="container mx-auto mt-8">
        <div class="flex flex-col items-start">
            <img src="{{ asset($moto->motoModel->image_url) }}" alt="{{ $moto->motoModel->name }}" class="mb-4 rounded">
            <div class="flex flex-col items-start text-left">
                <h2 class="text-2xl font-semibold">{{ $moto->motoModel->brand->name }} {{ $moto->motoModel->name }}</h2>
                <p class="text-gray-600">{{ __('Rent Price')}}: {{ $moto->base_rent_price }} {{ $moto->base_rent_currency }}</p>
                <p class="text-gray-600">{{ __('Production Year')}}: {{ $moto->production_year }}</p>
                <p class="text-gray-600">{{ __('Status')}}: {{ $moto->status }}</p>
                <p class="text-gray-600">{{ __('Description')}}: {{ $moto->motoModel->description }}</p>
                <p class="text-gray-600">{{ __('Fuel Tank Capacity')}}: {{ $moto->motoModel->fuel_tank_capacity }} {{ $moto->motoModel->fuel_tank_capacity_type }}</p>
                <p class="text-gray-600">{{ __('Max Speed')}}: {{ $moto->motoModel->max_speed }} km/h</p>
                <p class="text-gray-600">{{ __('Moto Type')}}: {{ $moto->motoModel->type }}</p>
                <p class="text-gray-600">{{ __('Moto Wieght')}}: {{ $moto->motoModel->weight }}</p>
            </div>
        </div>
        @auth
            @if ($this->isAbleToRent() && !$this->isRentedOnSelectedDate())
                @if ($moto->isInBasketOf(Auth::user()))
                    <x-primary-button wire:click.prevent="removeFromBasket('{{ $moto->id }}')">
                        {{ __('Remove From Basket') }}
                    </x-primary-button>
                @else
                    <x-primary-button wire:click.prevent="addToBasket('{{ $moto->id }}')">
                        {{ __('Add To Basket') }}
                    </x-primary-button>
                @endif
            @elseif ($this->isAbleToRent())
                Unavailable on selected dates
            @endif
        @endauth
    </div>
</div>