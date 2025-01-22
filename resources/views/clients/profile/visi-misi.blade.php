<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <x-header-banner :background-image="'/assets/images/header.jpg'" :title="'VISI MISI & TUJUAN'" />
        <div class="container">
            <div class="py-10">
                <!-- Visi Section -->
                <div class="mb-12 bg-white dark:bg-[#0e1726] rounded-lg shadow-md p-8 transition-all duration-300 hover:shadow-lg">
                    <h2 class="text-3xl font-bold text-green-700 mb-6">Visi</h2>
                    <ul class="list-disc list-inside text-lg space-y-4">
                        @if (!empty($info->visi))

                        @php
                        $visiItems = is_string($info->visi) ? json_decode($info->visi, true) : $info->visi;
                        @endphp

                        @if (is_array($visiItems) && !empty($visiItems))
                        @foreach ($visiItems as $visi)
                        @if (isset($visi['value']))
                        <li>{{ $visi['value'] }}</li>
                        @endif
                        @endforeach
                        @else
                        <li>Visi tidak tersedia.</li>
                        @endif

                        @else
                        <li>Visi tidak tersedia.</li>
                        @endif
                    </ul>
                </div>

                <!-- Misi Section -->
                <div class="mb-12 bg-white dark:bg-[#0e1726] rounded-lg shadow-md p-8 transition-all duration-300 hover:shadow-lg">
                    <h2 class="text-3xl font-bold text-green-700 mb-6">Misi</h2>
                    <ul class="list-disc list-inside text-lg space-y-4">
                        @if (!empty($info->misi))

                        @php
                        $misiItems = is_string($info->misi) ? json_decode($info->misi, true) : $info->misi;
                        @endphp

                        @if (is_array($misiItems) && !empty($misiItems))
                        @foreach ($misiItems as $misi)
                        @if (isset($misi['value']))
                        <li>{{ $misi['value'] }}</li>
                        @endif
                        @endforeach
                        @else
                        <li>Misi tidak tersedia.</li>
                        @endif

                        @else
                        <li>Misi tidak tersedia.</li>
                        @endif

                    </ul>
                </div>

                <!-- Tujuan Section -->
                <div class="bg-white dark:bg-[#0e1726] rounded-lg shadow-md p-8 transition-all duration-300 hover:shadow-lg">
                    <h2 class="text-3xl font-bold text-green-700 mb-6">Tujuan</h2>
                    <ul class="list-disc list-inside text-lg space-y-4">
                        @if (!empty($info->tujuan))

                        @php
                        $tujuanItems = is_string($info->tujuan) ? json_decode($info->tujuan, true) : $info->tujuan;
                        @endphp

                        @if (is_array($tujuanItems) && !empty($tujuanItems))
                        @foreach ($tujuanItems as $tujuan)
                        @if (isset($tujuan['value']))
                        <li>{{ $tujuan['value'] }}</li>
                        @endif
                        @endforeach
                        @else
                        <li>Tujuan tidak tersedia.</li>
                        @endif

                        @else
                        <li>Tujuan tidak tersedia.</li>
                        @endif

                    </ul>
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