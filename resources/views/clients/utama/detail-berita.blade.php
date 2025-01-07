<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <link rel="stylesheet" href="{{ Vite::asset('resources/css/swiper-bundle.min.css') }}">
    <script src="/assets/js/swiper-bundle.min.js"></script>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->

        <div class="container">
            <div class="mb-5">
                <img src="{{ asset('storage/' . $berita->banner) }}" class="w-full h-[240px] lg:h-[720px] object-cover" alt="image" />
            </div>
            <div class="flex justify-center lg:-mt-20 items-center">
                <div class="bg-[#fafafa] dark:bg-[#060818] lg:w-2/3 lg:text-center lg:px-10 py-5">
                    <div class="text-lg font-thin">{{ $berita->category->name }}</div>
                    <div class="text-4xl font-bold mb-5">{{ $berita->title }}</div>
                    <hr class="border border-green-700 w-16 mx-auto mb-5">
                    <div class="flex justify-center items-center space-x-6">
                        <div>Diupload oleh: {{ $berita->user->name }}</div>
                        <div class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ltr:mr-1 rtl:ml-1">
                                <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                                <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                            </svg>
                            {{ $berita->view_number }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:px-28">
                <div class="mb-4">Tag:
                    @foreach ($berita->tags as $tag)
                    #{{ $tag->name }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </div>
                <style>
                    .rich-editor-content p {
                        margin-bottom: 1rem;
                        text-indent: 50px;
                    }
                </style>
                <div class="rich-editor-content text-lg text-justify leading-relaxed">{!! $berita->description !!}</div>
            </div>
        </div>

        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("home", () => ({
                    init() {

                    },
                }));
            });
        </script>
    </div>
</x-layout.default>