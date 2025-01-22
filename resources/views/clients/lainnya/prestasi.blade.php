<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <link rel='stylesheet' type='text/css' media='screen' href="{{ Vite::asset('resources/css/fancybox.css') }}">
    <script src="/assets/js/fancybox.umd.js"></script>


    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <x-header-banner :background-image="'/assets/images/header.jpg'" :title="'PRESTASI'" />
        <div class="container mt-14">

            @foreach ($achievements as $achievement)
            <div class="text-xl text-center">{{ $achievement->name }} - {{ $achievement->description }}</span></div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 mt-10">
                <!-- Loop through the photos and display them -->
                @foreach ($achievement->photos as $photo)
                <a href="{{ asset('storage/' . $photo['photo']) }}" data-fancybox="achievement-{{ $achievement->id }}" data-caption="{{ $achievement->name }} - {{ $achievement->description}}" class="block">
                    <img src="{{ asset('storage/' . $photo['photo']) }}" alt="Photo" class="rounded-md w-full h-64 object-cover">
                </a>
                @endforeach

            </div>
            <hr class="my-5">
            @endforeach
            <div class="flex justify-center items-center">
                <div class="mt-4 md:max-w-xs">
                    {{ $achievements->links() }}
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("home", () => ({
                init() {

                },
            }));
        });
        document.addEventListener('DOMContentLoaded', function() {

        });
    </script>
    </div>
</x-layout.default>