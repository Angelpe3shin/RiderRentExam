<footer class="bg-gray-200 dark:bg-gray-800 py-4 relative" style="background-image: url('{{ asset('images/logo/bottom.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container mx-auto flex items-center justify-between">
        <div class="ml-auto">
            <p class="text-cyan-400">
                Contact us: 
                    <a href="mailto:example@example.com" class="font-semibold">
                        example@example.com
                    </a>
            </p>
            <p class="text-cyan-400">
                Phone: 
                    <a href="tel:+123456789" class="font-semibold">
                        +123 456 789
                    </a>
            </p>
            <div class="flex space-x-4">
                <a href="https://www.instagram.com/" target="_blank">
                    <img src="{{ asset('images/logo/ig.png') }}" alt="Instagram Logo" class="w-10 h-10">
                </a>

                <a href="https://www.youtube.com/" target="_blank">
                    <img src="{{ asset('images/logo/youtube.png') }}" alt="YouTube Logo" class="w-10 h-10">
                </a>
            </div>
        </div>
    </div>
</footer>
