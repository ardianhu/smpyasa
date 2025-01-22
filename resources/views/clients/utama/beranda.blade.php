<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <link rel="stylesheet" href="{{ Vite::asset('resources/css/swiper-bundle.min.css') }}">
    <script src="/assets/js/swiper-bundle.min.js"></script>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <div class="relative -mx-6 -mt-6">
            <div class="swiper mb-5" id="sliderCustom">
                <div class="swiper-wrapper">
                    @foreach ($galleries as $gallery)
                    @foreach ($gallery->photos as $photo)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $photo['photo']) }}" class="w-full h-[240px] lg:h-[720px] object-cover" alt="image" />
                        <div class="absolute z-[999] text-white bottom-8 left-1/2 w-full -translate-x-1/2 text-center sm:px-0 px-11">
                            <div class="text-3xl font-bold" style="text-shadow: 1px 1px 2px black;">{{ $gallery->title }}</div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>
                <a href="javascript:;" class="swiper-button-prev-ex4 grid place-content-center ltr:left-2 rtl:right-2 p-1 transition text-green-700 hover:text-white border border-green-700  hover:border-green-700 hover:bg-green-700 rounded-full absolute z-[999] top-1/2 -translate-y-1/2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:rotate-180">
                        <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <a href="javascript:;" class="swiper-button-next-ex4 grid place-content-center ltr:right-2 rtl:left-2 p-1 transition text-green-700 hover:text-white border border-green-700  hover:border-green-700 hover:bg-green-700 rounded-full absolute z-[999] top-1/2 -translate-y-1/2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:rotate-180">
                        <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- carousel -->
        <!-- <div class="swiper w-full mx-auto mb-5" id="slider2">
            <div class="swiper-wrapper">
                @foreach($featured as $item)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $item->banner) }}" class="w-full h-[240px] lg:h-[720px] object-cover" alt="image" />
                    <div class="absolute z-[999] text-white bottom-10 ltr:left-12 rtl:right-12">
                        <div class="sm:text-3xl text-base font-bold">{{ $item->title }}</div>
                        <div class="sm:mt-5 mt-1 w-4/5 text-base sm:block hidden font-medium">
                            {!! \Illuminate\Support\Str::words($item->description, 20, '...') !!}
                        </div>
                        <button type="button" class="mt-4 btn btn-primary">Baca</button>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="javascript:;" class="swiper-button-prev-ex2 grid place-content-center ltr:left-2 rtl:right-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:rotate-180">
                    <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <a href="javascript:;" class="swiper-button-next-ex2 grid place-content-center ltr:right-2 rtl:left-2 p-1 transition text-primary hover:text-white border border-primary  hover:border-primary hover:bg-primary rounded-full absolute z-[999] top-1/2 -translate-y-1/2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:rotate-180">
                    <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div> -->
        <div class="container">
            <div class="flex flex-col lg:flex-row gap-8 mb-8 bg-gradient-to-br from-green-600 to-green-800 text-white p-6 rounded-xl shadow-lg">
                <div class="flex-0 flex items-center justify-center lg:w-1/3">
                    <img src="/assets/images/kepala-sekolah.jpg" alt="Kepala Sekolah" class="rounded-lg object-cover object-top w-full h-full max-h-[480px] shadow-md hover:shadow-xl transition-shadow duration-300">
                </div>
                <div class="flex-1 lg:flex lg:flex-col lg:justify-center text-justify mx-auto lg:w-2/3">
                    <div class="text-3xl font-bold mb-4 border-b-2 border-white pb-2">Sambutan Kepala Sekolah SMP YAS'A</div>
                    <div class="text-lg italic mb-4">Bismillaahirohmaannirrohiim. Assalaamualaikum Warahmatullaahi Wabarakaatuh.</div>
                    @if ($info && $info->sambutan_kasek)
                    <div class="text-lg leading-relaxed">{{ $info->sambutan_kasek }}</div>
                    @else
                    <div class="text-lg leading-relaxed space-y-4">
                        <p>Alhamdulillaahi Robbil 'Aalamiin, kami panjatkan Puji dan Syukur kehadlirat Allah SWT, bahwasannya dengan hidayah, rahmat dan karunia-Nya lah akhirnya Website Yayasan Pendidikan Islam Abdullah Kota Sumenep ini dengan alamat <strong class="text-yellow-300">smpyasa.sch.id</strong> ini dapat kami terbit. Kami mengucapkan selamat datang di Website kami.</p>
                        <p>Kami berharap Website ini dapat dijadikan wahana interaksi yang positif baik antar civitas akademika maupun masyarakat pada umumnya sehingga dapat menjalin silaturahmi yang erat dan ukhuwah yang di antara kita di segala unsur. Mari kita bekerja dan berkarya dengan mengharap ridho Sang Maha Kuasa dan keikhlasan yang tulus di jiwa demi generasi penerus bangsa yang lebih baik dan maju.</p>
                        <p>Terima kasih atas kebersamaan semuanya dan mohon maaf atas segala salah dan khilaf serta kekurangan kami, semoga Allah 'Azza Wa Jalla menyertai doa kita semua dan mengabulkan cita-cita dan harapan serta niat baik kita semua …… Aamiin.</p>
                    </div>
                    @endif
                    <div class="text-lg italic mt-4">Wassalaamu'alaikum Wr.Wb.</div>
                </div>
            </div>
            <div class="w-full">
                <!-- carousel -->
                <div class="swiper w-full mx-auto mb-5 col-span-3" id="slider2">
                    <div class="swiper-wrapper">
                        @foreach($featured as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $item->banner) }}" class="w-full h-full max-h-[512px] object-cover rounded-lg" alt="image" />
                            <div class="absolute z-[999] text-white bottom-10 ltr:left-12 rtl:right-12">
                                <div class="sm:text-3xl text-base font-bold" style="text-shadow: 1px 1px 2px black;">{{ $item->title }}</div>
                                <div class="sm:mt-5 mt-1 w-4/5 text-base sm:block hidden font-medium" style="text-shadow: 1px 1px 2px black;">
                                    {!! \Illuminate\Support\Str::words($item->description, 20, '...') !!}
                                </div>
                                <a href="/baca/{{ $item->id }}" class="mt-4 btn btn-success inline-block">Baca</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="javascript:;" class="swiper-button-prev-ex2 grid place-content-center ltr:left-2 rtl:right-2 p-1 transition text-green-700 hover:text-white border border-green-700  hover:border-green-700 hover:bg-green-700 rounded-full absolute z-[999] top-1/2 -translate-y-1/2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:rotate-180">
                            <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <a href="javascript:;" class="swiper-button-next-ex2 grid place-content-center ltr:right-2 rtl:left-2 p-1 transition text-green-700 hover:text-white border border-green-700  hover:border-green-700 hover:bg-green-700 rounded-full absolute z-[999] top-1/2 -translate-y-1/2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:rotate-180">
                            <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>

                <!-- list berita di samping carousel -->

            </div>

            <hr class="border-solid border-[1px] my-4 border-green-700">
            <div class="text-2xl font-bold">Berita</div>
            <div class="pt-5 grid grid-cols1 lg-grid-cols-4 gap-6">
                <div class="col-span-3">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                        @foreach($posts as $post)
                        @if($post)
                        <a href="/baca/{{ $post->id }}" class="block transition-transform duration-300 hover:-translate-y-2">
                            <div class="max-w-[22rem] w-full bg-white shadow-md hover:shadow-lg rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $post->banner) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105" />
                                    <div class="absolute top-0 right-0 bg-green-600 text-white text-xs font-bold px-2 py-1 m-2 rounded">
                                        {{ $post->created_at->format('d M Y') }}
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h5 class="text-xl font-bold text-gray-800 dark:text-white line-clamp-2">{{ $post->title }}</h5>
                                    <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">{!! \Illuminate\Support\Str::words(strip_tags($post->description, '
                                    <p><b><i><strong><em>
                                                        <ul>
                                                            <li>'), 20, '...') !!}
                                    </p>
                                    <div class="flex items-center justify-between mt-4">
                                        <!-- <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full overflow-hidden mr-2">
                                                @if ($post->user->avatar)
                                                <img src="{{ asset('storage/' . $post->user->avatar) }}" alt="{{ $post->user->name }}" class="w-full h-full object-cover">
                                                @else
                                                <div class="w-full h-full flex items-center justify-center bg-gray-300 text-gray-600 font-semibold">
                                                    {{ substr($post->user->name, 0, 2) }}
                                                </div>
                                                @endif
                                            </div>
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $post->user->name }}</span>
                                        </div> -->
                                        <div class="flex items-center text-gray-500 dark:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <span class="text-sm">{{ $post->view_number }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div></div>
            </div>
        </div>

        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("home", () => ({
                    init() {
                        const swiper2 = new Swiper("#slider2", {
                            navigation: {
                                nextEl: '.swiper-button-next-ex2',
                                prevEl: '.swiper-button-prev-ex2',
                            },
                            autoplay: {
                                delay: 5000,
                            },
                        });
                        const swiper4 = new Swiper("#sliderCustom", {
                            slidesPerView: 1,
                            spaceBetween: 30,
                            loop: true,
                            pagination: {
                                el: ".swiper-pagination",
                                clickable: true,
                                type: "fraction",
                            },
                            navigation: {
                                nextEl: '.swiper-button-next-ex4',
                                prevEl: '.swiper-button-prev-ex4',
                            },
                            autoplay: {
                                delay: 4000,
                            },
                        });
                    },
                }));
            });
        </script>
    </div>
</x-layout.default>