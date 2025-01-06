<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <x-header-banner :background-image="'/assets/images/header.jpg'" :title="'KALENDER AKADEMIK'" />
        <div class="container">
            <div class="container">


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