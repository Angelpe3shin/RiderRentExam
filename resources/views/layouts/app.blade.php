<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <livewire:layout.navigation />

            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            @if (isset($showDatePicker))
                <form>
                    <div class="mb-3 mt-3 sm:px-6 lg:px-8">
                        <label for="datepicker" class="form-label font-semibold text-l text-gray-800 dark:text-gray-200 leading-tight">{{ __('Pick rent dates') }}:</label>
                        <input type="text" class="form-control rounded" id="datepicker" name="datepicker">
                    </div>
                </form>
            @endif

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    flatpickr('#datepicker', {
                        enableTime: true,
                        mode: "range",
                        minDate: "today",
                        dateFormat: "Y-m-d",
                        onClose: function(selectedDates, dateStr, instance) {
                            if (selectedDates.length > 1) {
                                Livewire.dispatch('didSelectDate', {
                                    startDate: selectedDates[0],
                                    endDate: selectedDates[1]
                                });
                            }
                        },
                    });
                });
            </script>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
