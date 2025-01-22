<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <x-header-banner :background-image="'/assets/images/header.jpg'" :title="$title" />
        <div class="container">

            <div class="py-10">
                <div class="mb-12 mx-0 lg:mx-4 bg-white dark:bg-[#0e1726] rounded-lg shadow-md p-8 transition-all duration-300 hover:shadow-lg">
                    <h2 class="text-3xl font-bold text-green-700 mb-6 text-center">{{ $sub_title }}</h2>
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

                        .content-pages ol {
                            list-style-type: decimal;
                        }
                    </style>
                    @if ($data == null)
                    <div class="py-6 px-8 border-red-600 border-2 rounded-md text-lg font-bold text-center">Belum ada data</div>
                    @else
                    <div class="content-pages w-full text-lg leading-relaxed prose-lg text-justify">
                        {!! $data !!}
                    </div>
                    @endif
                </div>
            </div>


            @if(count($posts) > 0)
            <div class="text-2xl font-bold text-center text-green-700">Berita terkait</div>
            <div class="pt-5 grid grid-cols1 lg-grid-cols-4 gap-6">
                <div class="col-span-3">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                        @foreach($posts as $post)
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
                        @endforeach
                    </div>
                </div>
                <div></div>
            </div>
            @endif
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