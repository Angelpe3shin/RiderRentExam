<?php

use App\Models\Customer;
use App\Models\Address;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $phone = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $street = '';
    public string $house_number = '';
    public string $zip_code = '';
    public string $city = '';
    public int $country_id = 0;
    public string $error = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void {
        try {
            $validated = $this->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:customers'],
                'phone' => ['required', 'string', 'max:255', 'unique:customers'],
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
                'street' => ['required', 'string', 'max:255'],
                'house_number' => ['required', 'string', 'max:255'],
                'zip_code' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'country_id' => ['required', 'integer'],
            ]);        
    
            $validated['password'] = bcrypt($validated['password']);

            $address = Address::create([
                'country_id' => $validated['country_id'],
                'street' => $validated['street'],
                'house_number' => $validated['house_number'],
                'zip_code' => $validated['zip_code'],
                'city' => $validated['city'],
            ]);

            Customer::creating(function (Customer $customer) use ($address) {
                $customer->address_id = $address->id;
            });

            event(new Registered($customer = Customer::create($validated)));

            try {
                if (Auth::login($customer)) {
                    $this->redirect(RouteServiceProvider::HOME, navigate: true);
                } else {
                    $this->error = 'Ошибка, пользователь не залогинен';
                }
            } catch (\Exception $e) {
                $this->error = $e->getMessage(); // Если произошло исключение, передаем сообщение об ошибке
            }
        } catch (\Exception $e) {
            $this->error = $e->getMessage(); // Если произошло исключение, передаем сообщение об ошибке
        }
    }
}; ?>

<div>
    <form wire:submit="register">
        @csrf
        <div class="mt-4">
            @if ($error)
                <p class="text-red-500">{{ $error }}</p>
            @endif
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="first_name" :value="__('Name')" />
            <x-text-input wire:model="first_name" id="first_name" class="block mt-1 w-full" type="text" name="first_name" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input wire:model="last_name" id="last_name" class="block mt-1 w-full" type="text" name="last_name" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="phone" name="phone" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="street" :value="__('Street')" />

            <x-text-input wire:model="street" id="street" class="block mt-1 w-full"
                            type="street"
                            name="street" required autocomplete="street" />

            <x-input-error :messages="$errors->get('street')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="house_number" :value="__('House #')" />

            <x-text-input wire:model="house_number" id="house_number" class="block mt-1 w-full"
                            type="house_number"
                            name="house_number" required autocomplete="house_number" />

            <x-input-error :messages="$errors->get('house_number')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="zip_code" :value="__('Zip')" />

            <x-text-input wire:model="zip_code" id="zip_code" class="block mt-1 w-full"
                            type="zip_code"
                            name="zip_code" required autocomplete="zip_code" />

            <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />

            <x-text-input wire:model="city" id="city" class="block mt-1 w-full"
                            type="city"
                            name="city" required autocomplete="city" />

            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="country_id" :value="__('Country')" />

            <x-text-input wire:model="country_id" id="country_id" class="block mt-1 w-full"
                            type="country_id"
                            name="country_id" required autocomplete="country_id" />

            <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
