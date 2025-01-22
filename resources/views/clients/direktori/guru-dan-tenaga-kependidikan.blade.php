<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <x-header-banner :background-image="'/assets/images/header.jpg'" :title="'DIREKTORI'" />
        <div class="container">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($teachers as $teacher)
                <div class="bg-white dark:bg-[#0e1726] shadow-md rounded-lg overflow-hidden m-4 w-64 mx-auto">
                    <img src="{{ asset('storage/' . $teacher->avatar) }}" alt="{{ $teacher->name }}" class="w-full h-72 object-cover object-top">
                    <div class="p-4 text-center">
                        <h3 class="text-xl font-semibold mb-2">{{ $teacher->name }}</h3>
                        @foreach ($teacher->study as $study)
                        <p class="">{{ $study['subject'] }}</p>
                        @endforeach
                    </div>
                </div>
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
    </script>
    </div>
</x-layout.default>