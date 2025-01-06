<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <x-header-banner :background-image="'/assets/images/header.jpg'" :title="'VISI MISI & TUJUAN'" />
        <div class="container">
            <div class="py-10">
                <!-- Visi Section -->
                <div class="mb-12 bg-white rounded-lg shadow-md p-8 transition-all duration-300 hover:shadow-lg">
                    <h2 class="text-3xl font-bold text-green-700 mb-6">Visi</h2>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Unggul dalam keshalehan individual dan sosial serta kompetitif di era global
                    </p>
                </div>

                <!-- Misi Section -->
                <div class="mb-12 bg-white rounded-lg shadow-md p-8 transition-all duration-300 hover:shadow-lg">
                    <h2 class="text-3xl font-bold text-green-700 mb-6">Misi</h2>
                    <ul class="list-disc list-inside text-lg text-gray-700 space-y-4">
                        <li>Meningkatkan mutu belajar mengajar secara efektif dan efisien</li>
                        <li>Mengembangkan potensi dasar sesuai minat dan bakat siswa</li>
                        <li>Menumbuh kembangkan pemahaman terhadap nilai-nilai keagamaan yang moderat dan seimbang</li>
                        <li>Meningkatkan penghayatan terhadap budaya bangsa dan kearifan lokal sebagai inspirasi bersikap</li>
                        <li>Menerapkan manajemen partisipatif dengan melibatkan masyarakat sekolah serta warga masyarakat secara terbuka dan demokratis</li>
                        <li>Mewujudkan keadilan pendidikan yang berkualitas</li>
                        <li>Mengembangkan kurikulum terpadu antara sekolah dan pesantren yang berorientasi Aswajah An-Nahdhiyah</li>
                    </ul>
                </div>

                <!-- Tujuan Section -->
                <div class="bg-white rounded-lg shadow-md p-8 transition-all duration-300 hover:shadow-lg">
                    <h2 class="text-3xl font-bold text-green-700 mb-6">Tujuan</h2>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Tujuan kami adalah menciptakan lingkungan belajar yang inspiratif dan kondusif, di mana setiap peserta didik dapat mengembangkan potensi dirinya secara maksimal. Kami berkomitmen untuk mempersiapkan generasi penerus yang tidak hanya unggul dalam akademik, tetapi juga memiliki kecakapan hidup, kepekaan sosial, dan semangat kepemimpinan yang diperlukan untuk menjadi agen perubahan positif dalam masyarakat global yang terus berkembang.
                    </p>
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