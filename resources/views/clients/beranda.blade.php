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
                    @foreach($featured as $item)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $item->banner) }}" class="w-full h-[240px] lg:h-[720px] object-cover" alt="image" />
                        <div class="absolute z-[999] text-white bottom-8 left-1/2 w-full -translate-x-1/2 text-center sm:px-0 px-11">
                            <div class="text-3xl font-bold">{{ $item->title }}</div>
                            <div class="mb-4 sm:text-base font-medium">
                                {!! \Illuminate\Support\Str::words($item->description, 20, '...') !!}
                            </div>
                        </div>
                    </div>
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
            <div class="flex flex-col lg:flex-row gap-6 mb-6 bg-green-700 text-white p-4 rounded-lg">
                <div class="flex-0 flex items-center justify-center">
                    <img src="/assets/images/kepala-sekolah.jpg" alt="Kepala Sekolah" class="rounded-lg object-cover max-h-[480px]">
                </div>
                <div class="flex-1 lg:flex lg:flex-col lg:justify-center text-justify mx-auto">
                    <div class="text-2xl font-bold ">Sambutan Kepala Sekolah SMP YAS'A</div>
                    <br>
                    <div class="text-lg">Bismillaahirohmaannirrohiim.</div>
                    <div class="text-lg">Assalaamualaikum Warahmatullaahi Wabarakaatuh.</div>
                    <br>
                    <div class="text-lg leading-tight">Alhamdulillaahi Robbil ‘Aalamiin, kami panjatkan Puji dan Syukur kehadlirat Allah SWT, bahwasannya dengan hidayah, rahmat dan karunia-Nya lah akhirnya Website Yayasan Pendidikan Islam Abdullah Kota Sumenep ini dengan alamat <strong>yasasumenep.sch.id</strong> ini dapat kami terbit. Kami mengucapkan selamat datang di Website kami.</div>
                    <br>
                    <div class="text-lg leading-tight">Kami berharap Website ini dapat dijadikan wahana interaksi yang positif baik antar civitas akademika maupun masyarakat pada umumnya sehingga dapat menjalin silaturahmi yang erat dan ukhuwah yang di antara kita di segala unsur. Mari kita bekerja dan berkarya dengan mengharap ridho Sang Maha Kuasa dan keikhlasan yang tulus di jiwa demi generasi penerus bangsa yang lebih baik dan maju.</div>
                    <br>
                    <div class="text-lg leading-tight">Terima kasih atas kebersamaan semuanya dan mohon maaf atas segala salah dan khilaf serta kekurangan kami, semoga Allah ‘Azza Wa Jalla menyertai doa kita semua dan mengabulkan cita-cita dan harapan serta niat baik kita semua …… Aamiin.</div>
                    <br>
                    <div class="text-lg">Wassalaamu’alaikum Wr.Wb.</div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-0 lg:gap-6">
                <!-- carousel -->
                <div class="swiper w-full mx-auto mb-5 col-span-3" id="slider2">
                    <div class="swiper-wrapper">
                        @foreach($featured as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $item->banner) }}" class="w-full h-full max-h-[512px] object-cover rounded-lg" alt="image" />
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
                <div class="w-full">
                    <div class="text-2xl font-bold mb-4">Berita terbaru lainnya</div>
                    <div>
                        @foreach($posts->take(3) as $latest)
                        <div class="w-full bg-white rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none mb-2">
                            <div class="p-3 flex items-center flex-col sm:flex-row">
                                <div class="mb-2 w-20 h-20 overflow-hidden">
                                    <img src="{{ asset('storage/' . $latest->banner) }}" alt=" image" class="w-full h-full object-cover" />
                                </div>
                                <div class="flex-1 ltr:sm:pl-3 rtl:sm:pr-5 text-left">
                                    <h5 class="text-[#3b3f5c] text-[15px] font-semibold mb-2 dark:text-white-light">{{ $latest->title }}</h5>
                                    <p class="font-semibold text-white-dark mt-4">{!! \Illuminate\Support\Str::words($latest->description, 10, '...') !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <hr class="border-solid border-[1px] my-4 border-green-700">
            <div class="text-2xl font-bold">Berita</div>
            <div class="pt-5 grid grid-cols1 lg-grid-cols-4 gap-6">
                <div class="col-span-3">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                        @foreach($posts as $post)
                        <a href="">
                            <div class="max-w-[22rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
                                <div class="py-7 px-6">
                                    <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[260px] overflow-hidden">
                                        <img src="{{ asset('storage/' . $post->banner) }}" alt="image" class="w-full h-full object-cover" />
                                    </div>
                                    <p class="text-primary text-xs mb-1.5 font-bold">{{ $post->created_at->format('d F Y') }}</p>
                                    <h5 class="text-[#3b3f5c] text-[15px] font-bold mb-4 dark:text-white-light">{{ $post->title}}</h5>
                                    <p class="text-white-dark ">{!! \Illuminate\Support\Str::words($post->description, 20, '...') !!}</p>
                                    <div class="relative flex justify-between mt-6 pt-4 before:w-[250px] before:h-[1px] before:bg-[#e0e6ed] before:inset-x-0 before:top-0 before:absolute before:mx-auto dark:before:bg-[#1b2e4b]">
                                        <div class="flex items-center font-semibold">
                                            <div class="w-9 h-9 rounded-full overflow-hidden inline-block ltr:mr-2 rtl:ml-2.5">
                                                <span class="flex w-full h-full items-center justify-center bg-[#515365] text-[#e0e6ed]">AG</span>
                                            </div>
                                            <div class="text-[#515365] dark:text-white-dark">{{ $post->user->name}}</div>
                                        </div>
                                        <div class="flex font-semibold">
                                            <div class="text-primary flex items-center ltr:mr-3 rtl:ml-3">

                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ltr:mr-1 rtl:ml-1">
                                                    <path d="M12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path opacity="0.5" d="M12 5.50063C16.4998 0.825464 22 4.27416 22 9.1371C22 14 17.9806 16.5914 15.0383 18.9109C14 19.7294 13 20.5 12 20.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                51
                                            </div>
                                            <div class="text-primary flex items-center">

                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ltr:mr-1 rtl:ml-1">
                                                    <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                                                    <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                                </svg>
                                                250
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
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