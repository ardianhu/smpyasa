<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <x-header-banner :background-image="'/assets/images/header.jpg'" :title="'KOMITE SEKOLAH'" />
        <div class="container">
            <div class="container">
                @php
                $groupedUsers = $comite->where('comite_level', '>', 0)->groupBy('comite_level')->sortKeys();
                @endphp

                @foreach ($groupedUsers as $level => $usersInLevel)
                <div class="mb-0 lg:mb-4">
                    <div class="flex flex-wrap justify-center">
                        @foreach ($usersInLevel as $user)
                        <div class="bg-white dark:bg-[#0e1726] shadow-md rounded-lg overflow-hidden m-4 w-64">
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-full h-72 object-cover object-top">
                            <div class="p-4 text-center">
                                <h3 class="text-xl font-semibold mb-2">{{ $user->name }}</h3>
                                <p class="">{{ $user->comite_position }}</p>
                            </div>
                        </div>
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