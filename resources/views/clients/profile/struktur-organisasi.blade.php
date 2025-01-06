<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <x-header-banner :background-image="'/assets/images/header.jpg'" :title="'STRUKTUR ORGANISASI'" />
        <div class="container">
        </div>
        <div class="container">
            @php
            $groupedUsers = $users->where('level', '>', 0)->groupBy('level')->sortKeys();
            @endphp

            @foreach ($groupedUsers as $level => $usersInLevel)
            <div class="mb-8">
                <div class="flex flex-wrap justify-center">
                    @foreach ($usersInLevel as $user)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden m-4 w-64">
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-full h-72 object-cover object-top">
                        <div class="p-4 text-center">
                            <h3 class="text-xl font-semibold mb-2">{{ $user->name }}</h3>
                            <p class="text-gray-600">{{ $user->position }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
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