<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <link rel="stylesheet" href="{{ Vite::asset('resources/css/swiper-bundle.min.css') }}">
    <script src="/assets/js/swiper-bundle.min.js"></script>

    <script src="/assets/js/simple-datatables.js"></script>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <x-header-banner :background-image="'/assets/images/header.jpg'" :title="'BERITA'" />

        <div class="container">
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-4 lg:col-span-3">
                    <table id="userTable" class="table -mt-10">
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <div class="grid grid-cols-9 gap-4 mb-4">
                                        <div class="col-span-1">
                                            <div class="text-xl lg:text-5xl text-center font-bold">{{ $post->created_at->format('d') }}</div>
                                            <hr class="w-6 lg:w-12 border mx-auto border-green-700">
                                            <div class="text-[10px] lg:text-lg text-center font-bold">{{ $post->created_at->format('M') }}/{{ $post->created_at->format('y') }}</div>
                                        </div>
                                        <div class="col-span-8 grid grid-cols-2 gap-4">
                                            <div class="col-span-2 lg:col-span-1">
                                                <img src="{{ asset('storage/' . $post->banner) }}" alt="image" class="w-full object-cover" />
                                            </div>
                                            <div class="col-span-2 lg:col-span-1">
                                                <div class="mb-2 text-2xl font-bold">{{ $post->title }}</div>
                                                <div class="mb-4">Diupload oleh: {{ $post->user->name }}</div>
                                                <div class="text-justify mb-4">{!! \Illuminate\Support\Str::words($post->description, 50, '...') !!}</div>
                                                <div class="flex items-center justify-start">
                                                    <a href="/baca/{{ $post->id }}" class="btn btn-success">Baca</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-span-4 lg:col-span-1">
                    <div class="mb-4">
                        <div class="text-xl m-2">Kategori</div>
                        <div class="flex flex-col rounded-md border border-[#e0e6ed] dark:border-[#1b2e4b]">
                            @foreach ($categories as $category)
                            <a href="/berita?category={{ urlencode($category->name) }}" class="border-b border-[#e0e6ed] dark:border-[#1b2e4b] px-4 py-2.5 hover:bg-[#eee] dark:hover:bg-[#eee]/10">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="text-xl m-2">Tag</div>
                        <div class="flex flex-col rounded-md border border-[#e0e6ed] dark:border-[#1b2e4b]">
                            @foreach ($tags as $tag)
                            <a href="/berita?tags={{ urlencode($tag->name) }}" class="border-b border-[#e0e6ed] dark:border-[#1b2e4b] px-4 py-2.5 hover:bg-[#eee] dark:hover:bg-[#eee]/10">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
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
            new simpleDatatables.DataTable("#userTable", {
                searchable: false, // Disables the search feature
                perPageSelect: false, // Disables the dropdown for selecting items per page,
                sortable: false, // Disables the sort feature
                labels: {
                    noRows: "No entries to show", // Message when no entries are available
                    info: "" // Empty string to hide the info text
                }
            });
        });
    </script>
    </div>
</x-layout.default>