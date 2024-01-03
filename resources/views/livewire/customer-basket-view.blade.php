<div class="flex overflow-x-auto space-x-4 mb-4 mt-4 min-w-full h-full">
    <div class="flex flex-col overflow-x-auto space-x-4 mb-4 min-w-full h-full">
        <form wire:submit.prevent="applyFilter" class="mx-4 h-full"> 
            <div class="flex items-center justify-center mb-4 h-full">
                @foreach($types as $type)
                    <div class="flex items-center ml-4">
                        <input
                            type="radio"
                            id="{{ $type }}"
                            name="transactionType"
                            value="{{ $type }}"
                            wire:model="transactionType"
                            wire:change="applyFilter"
                            class="hidden"
                        >
                        <label for="{{ $type }}" class="ml-2 text-sm text-gray-700 dark:text-gray-300 radio-label {{ $transactionType == $type ? 'selected' : '' }}">
                            {{ $this->getTransactionTypeLabel($type) }}
                        </label>
                    </div>
                @endforeach
            </div>
            @if($basketItems->isEmpty())
                <p class="text-center w-full h-full">Basket Is Empty.</p>
            @else
                <div class="mb-4">
                    <div class="grid grid-cols-1 gap-4">
                        @foreach ($basketItems as $basketItem)
                            <div class="flex items-center bg-blue-100 dark:bg-gray-800 rounded-lg p-4">
                                <img src="{{ $basketItem->moto->motoModel->image_url }}" alt="Description" class="w-16 h-16 mb-2 rounded">
                                <div class="ml-4">
                                    <div class="mb-2">{{ $basketItem->moto->motoModel->name }}</div>
                                    <div>{{ $basketItem->total_price }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div>Total price: {{ $totalBasketPrice }} </div>
        </form>
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
            background-color: #3490dc;
        }
    </style>
</div>
