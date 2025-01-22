<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <x-header-banner :background-image="'/assets/images/header.jpg'" :title="'HUBUNGI KAMI'" />
        <div class="container">
            <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                    <div class="max-w-lg">
                        <h2 class="text-3xl font-bold sm:text-4xl">Hubungi Kami</h2>
                        <ul class="mt-4 text-lg">
                            <li>Alamat:
                                Jl. Kartini Gg Vi/04, PANGARANGAN, Kec. Kota Sumenep, Kab. Sumenep, Jawa Timur
                            </li>
                            <li>Telepon: 032-866-9776</li>
                            <li>Email: smpyasa2022@gmail.com</li>
                            <li>Website: smpyasa.sch.id</li>
                        </ul>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <iframe class="rounded-lg max-w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5958.36829281974!2d113.86449414684587!3d-7.003066764370234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd9e53a79cfb4a3%3A0x70e538228888f8bd!2sSMP%20Yayasan%20Abdullah%20(YAS&#39;A)!5e0!3m2!1sen!2sid!4v1737170605787!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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