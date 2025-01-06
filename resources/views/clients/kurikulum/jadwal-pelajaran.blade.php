<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <x-header-banner :background-image="'/assets/images/header.jpg'" :title="'JADWAL PELAJARAN'" />
        <div class="container">

            <div class="py-10">
                <div class="mb-12 mx-0 lg:mx-4 bg-white rounded-lg shadow-md p-8 transition-all duration-300 hover:shadow-lg">
                    <h2 class="text-3xl font-bold text-green-700 mb-6 text-center">Jadwal Pelajaran</h2>
                    <style>
                        .content-pages p {
                            margin-bottom: 1rem;
                            text-indent: 50px;
                        }

                        .content-pages h1,
                        .content-pages h2,
                        .content-pages h3 {
                            color: #15803d;
                        }
                    </style>
                    <div class="content-pages w-full text-lg text-gray-700 leading-relaxed prose-lg text-justify">
                        {!! $kurikulum->jadwal_pelajaran !!}
                    </div>
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