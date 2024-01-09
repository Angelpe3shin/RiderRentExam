<div>
    @auth
        <div class="flex justify-center space-x-4 mb-4 mt-4 min-w-full items-center">
            <label for="datepicker" class="font-semibold text-l text-gray-800 dark:text-gray-200 leading-tight w-auto">{{ __('Pick rent dates') }}:</label>
            <input type="text" class="w-1/4 rounded ml-4 form-control rounded ml-4" id="datepicker" name="datepicker">
        </div>
    @endauth

    <div class="flex space-x-4 mb-4 mt-4 min-w-full min-h-full">
        <div class="flex-col space-x-4 mb-4 w-1/4 min-h-full my-4">
            <form wire:submit.prevent="applyFilter" class="mx-4"> 
                <div class="flex flex-col items-start justify-start mb-4">
                    @foreach($types as $type)
                        <div class="flex items-center mb-2">
                            <input
                                type="radio"
                                id="{{ $type }}"
                                name="motoType"
                                value="{{ $type }}"
                                wire:model="motoType"
                                wire:change="applyFilter"
                                class="opacity-0 absolute h-0 w-0"
                            >
                            <label for="{{ $type }}" class="ml-2 text-sm text-gray-700 dark:text-gray-300 radio-label {{ $motoType == $type ? 'selected' : '' }}">
                                {{ $type }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($motos as $moto)
                <div class="flex flex-col items-center bg-blue-100 dark:bg-gray-800 rounded-lg p-4">
                    <a href="{{ route('moto-details', ['id' => $moto->id]) }}">
                        <img src="{{ asset($moto->motoModel->image_url) }}" alt="Description" class="mb-2 rounded" loading="lazy">
                        <div>{{ $moto->motoModel->name }}</div>
                        <div>{{ $moto->base_rent_price }}</div>
                        @auth
                            @if ($this->isAbleToRent() && !$this->isRentedOnSelectedDate($moto))
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
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .radio-label {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .selected {
            color: #fff;
            background-color: #3490dc; /* Измените это на ваш цвет фона */
        }

        .flex {
            flex: 1;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .grid div {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .grid a {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            text-decoration: none;
        }

        .grid img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px 8px 8px 8px;
        }

        .grid div > a > div {
            flex-grow: 1;
        }
    </style>
</div>
