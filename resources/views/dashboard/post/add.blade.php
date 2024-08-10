<x-layout.default>
    <div>
        <script src="/assets/js/simple-datatables.js"></script>
        <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
        <script src="/assets/js/quill.js"></script>
        <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

        <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
            <div class="px-5 mb-5 text-xl font-bold">Tambah Postingan</div>
            <div class="px-5" x-data="postForm">
                <form @submit.prevent="submitPost" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="title">Judul</label>
                        <input id="title" x-model="title" type="text" placeholder="Judul" class="form-input" required />
                    </div>
                    <div class="mb-4">
                        <label for="description">Isi</label>
                        <div id="editor" class="form-input"></div>
                    </div>
                    <div class="mb-4">
                        <label for="image">Gambar</label>
                        <input id="image" type="file" class="form-input" @change="handleFileUpload" />
                    </div>
                    <div class="mb-4 flex items-center space-x-3">
                        <label class="w-12 h-6 relative">
                            <input type="checkbox" class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer" x-model="is_published" />
                            <span class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
                        </label>
                        <div class="">Publikasi</div>
                    </div>
                    <div class="mb-4 flex items-center space-x-3">
                        <label class="w-12 h-6 relative">
                            <input type="checkbox" class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer" x-model="is_featured" />
                            <span class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
                        </label>
                        <div class="">Featured</div>
                    </div>
                    <div class="mb-4">
                        <label for="category">Kategori</label>
                        <select class="selectize" x-model="category">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="post btn btn-primary mt-6">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="/assets/js/nice-select2.js"></script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('postForm', () => ({
                title: '',
                description: '',
                image: null,
                is_published: false,
                is_featured: false,
                category: '',

                handleFileUpload(event) {
                    this.image = event.target.files[0];
                },

                async submitPost() {
                    const formData = new FormData();
                    formData.append('title', this.title);
                    formData.append('description', quill.root.innerHTML); // Use Quill editor content
                    if (this.image) {
                        formData.append('image', this.image);
                    }
                    formData.append('is_published', this.is_published ? 1 : 0);
                    formData.append('is_featured', this.is_featured ? 1 : 0);
                    formData.append('category', this.category);

                    try {
                        const response = await fetch('/dashboard/post', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: formData
                        });

                        const result = await response.json();
                        if (result.success) {
                            alert('Post created successfully!');
                            // Optionally reset form fields here
                        } else {
                            alert('Failed to create post');
                        }
                    } catch (error) {
                        console.error('Error submitting form:', error);
                    }
                }
            }));
        });

        const toolbarOptions = [
            ['bold', 'italic', 'underline'],
            ['link', 'image']
        ];

        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            },
        });

        document.addEventListener('DOMContentLoaded', function() {
            new simpleDatatables.DataTable("#userTable");
        });

        document.addEventListener("DOMContentLoaded", function(e) {
            var els = document.querySelectorAll(".selectize");
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });
        });
    </script>
</x-layout.default>