<x-layout.default>


    <div>
        <script src="/assets/js/simple-datatables.js"></script>


        <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
            <div class="px-5">
                <div class="mb-5" x-data="modal">
                    <div class="flex items-center justify-start">
                        <button type="button" class="btn btn-info" @click="toggle">Tambah User</button>
                    </div>
                    <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                        <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
                            <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                                <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                    <h5 class="font-bold text-lg">Modal Title</h5>
                                    <button type="button" class="text-white-dark hover:text-dark" @click="toggle">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                            <line x1="18" y1="6" x2="6" y2="18">
                                            </line>
                                            <line x1="6" y1="6" x2="18" y2="18">
                                            </line>
                                        </svg>
                                    </button>
                                </div>
                                <form id="addUserForm">
                                    @csrf
                                    <div class="p-5">
                                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                            <div>
                                                <label for="ctnName">Nama</label>
                                                <input id="ctnName" name="name" type="text" placeholder="nama" class="form-input" required />
                                            </div>
                                            <div>
                                                <label for="ctnEmail">Email</label>
                                                <input id="ctnEmail" name="email" type="email" placeholder="name@example.com" class="form-input" required />
                                            </div>
                                            <div>
                                                <label for="ctnPassword">Password</label>
                                                <input id="ctnPassword" name="password" type="password" placeholder="" class="form-input" required />
                                            </div>
                                            <div>
                                                <label for="ctnSelect">Example select</label>
                                                <select id="ctnSelect" name="role" class="form-select text-white-dark">
                                                    @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
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
        </div>
        <div class="table-responsive p-4">
            <table id="userTable" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ $index +1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
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

        document.getElementById('addUserForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let form = e.target;
            let formData = new FormData(form);

            fetch('{{ route("users.store") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('User added successfully');
                        window.location.reload(); // Reload the page to see the new user
                    } else {
                        alert('Error adding user');
                    }
                })
                .catch(error => console.error('Error:'));

        });
    </script>
</x-layout.default>