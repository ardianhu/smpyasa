<x-layout.default>
    <div>
        <link rel='stylesheet' type='text/css' media='screen' href="{{ Vite::asset('resources/css/fancybox.css') }}">
        <script src="/assets/js/fancybox.umd.js"></script>

        <div class="panel px-0 border-[rgb(224,230,237)] dark:border-[#1b2e4b]">
            <div class="px-5">
                <div class="mb-5" x-data="modal">
                    <div class="flex items-center justify-start">
                        <button type="button" class="btn btn-info" @click="toggle">Tambah Foto</button>
                    </div>
                    <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                        <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
                            <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                                <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                    <h5 class="font-bold text-lg">Tambah Foto</h5>
                                    <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                </div>
                                <form id="addPhotoForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="p-5">
                                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                            <div>
                                                <label for="title">Judul</label>
                                                <input id="title" name="title" type="text" class="form-input">
                                            </div>
                                            <div>
                                                <label for="ctnProfile">Foto</label>
                                                <input id="ctnProfile" name="images[]" type="file" class="form-input" multiple>
                                            </div>
                                        </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger" @click="toggle">Discard</button>
                                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4" @click="toggle">Save</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="font-semibold text-lg dark:text-white-light mb-5">Photo Gallery</h5>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 mt-10">
                <!-- Loop through the photos and display them -->
                @foreach ($photos as $photo)
                @foreach (json_decode($photo->image_path) as $image)
                <a href="{{ asset('storage/' . $image) }}" data-fancybox="gallery" data-caption="{{ $photo->title }}" class="block">
                    <img src="{{ asset('storage/' . $image) }}" alt="Photo" class="rounded-md w-full h-64 object-cover">
                </a>
                @endforeach
                @endforeach
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('userList', () => ({
                deleteRow() {
                    // Handle row deletion
                }
            }));
        });

        // Initialize DataTable
        document.addEventListener('DOMContentLoaded', function() {
            new simpleDatatables.DataTable("#userTable");
        });

        document.addEventListener("alpine:init", () => {
            Alpine.data("modal", (initialOpenState = false) => ({
                open: initialOpenState,
                toggle() {
                    this.open = !this.open;
                },
            }));
        });

        document.getElementById('addPhotoForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let form = e.target;
            let formData = new FormData(form);

            fetch('{{ route("photos.store") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Photos added successfully');
                        window.location.reload(); // Reload the page to see the new photos
                    } else {
                        alert('Error adding photos');
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        Fancybox.bind('[data-fancybox="gallery"]', {
            Carousel: {
                Navigation: {
                    prevTpl: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11 5l-7 7 7 7"/><path d="M4 12h16"/></svg>',
                    nextTpl: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M4 12h16"/><path d="M13 5l7 7-7 7"/></svg>',
                },
            },
        });
    </script>
</x-layout.default>