<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <link rel='stylesheet' type='text/css' media='screen' href="{{ Vite::asset('resources/css/fancybox.css') }}">
    <script src="/assets/js/fancybox.umd.js"></script>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <x-header-banner :background-image="'/assets/images/header.jpg'" :title="'GALERI'" />
        <div class="container">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 mt-10">
                <!-- Loop through the photos and display them -->
                @foreach ($photos as $photo)
                @foreach (json_decode($photo->image_path) as $image)
                <a href="{{ asset('storage/' . $image) }}" data-fancybox="gallery" data-caption="{{ $photo->title }}" class="block">
                    <img src="{{ asset('storage/' . $image) }}" alt="Photo" class="rounded-md w-full h-64 object-cover">
                </a>
                @endforeach
                @endforeach
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
        Fancybox.bind('[data-fancybox="gallery"]', {
            Carousel: {
                Navigation: {
                    prevTpl: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11 5l-7 7 7 7"/><path d="M4 12h16"/></svg>',
                    nextTpl: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M4 12h16"/><path d="M13 5l7 7-7 7"/></svg>',
                },
            },
        });
    </script>
    </div>
</x-layout.default>