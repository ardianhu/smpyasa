<x-layout.default>


    <div>
        <script src="/assets/js/simple-datatables.js"></script>


        <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
            <div class="px-5">
                <div class="mb-5">
                    <div class="flex items-center justify-start">
                        <a href="/dashboard/post/tambah" class="btn btn-info">Tambah Postingan</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive p-4">
                <table id="userTable" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Publikasi</th>
                            <th>Featured</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Gambar</th>
                            <th>Tag</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $index => $post)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{!! \Illuminate\Support\Str::words($post->description, 5, '...') !!}</td>
                            <td><span class="badge badge-outline-success">{{ $post->is_published == 1 ? "diposting" : "tidak diposting" }}</span></td>
                            <td><span class="badge badge-outline-success">{{ $post->is_featured == 1 ? "featured" : "tidak featured" }}</span></td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $post->banner) }}" class="h-8" alt="">
                            </td>
                            <td>
                                @foreach ($post->tags as $tag)
                                {{ $tag->name }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
    </script>
</x-layout.default>