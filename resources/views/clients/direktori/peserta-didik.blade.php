<!-- Blade Template (clients/index.blade.php) -->

<x-layout.default>

    <div x-data="home">
        <!-- loop -->
        <!-- Wrap the slider in a full-width container -->
        <x-header-banner :background-image="'/assets/images/header.jpg'" :title="'DIREKTORI'" />
        <div class="container bg-white dark:bg-[#0e1726] rounded-lg p-2 md:p-10">

            <div class="grid grid-cols-4 gap-8">
                <div class="col-span-4 lg:col-span-3">
                    <div class="table-responsive">
                        <table id="studentTable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>NIS</th>
                                    <th>NISN</th>
                                    <th>Alamat</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($students) > 0)
                                @foreach ($students as $student)
                                <tr>
                                    <td class="whitespace-nowrap">{{ $student->name }}</td>
                                    <td>{{ $student->dob ?? '-' }}</td>
                                    <td>{{ $student->nis ?? '-' }}</td>
                                    <td>{{ $student->nisn ?? '-' }}</td>
                                    <td>{{ $student->address ?? '-' }}</td>
                                    <td class="text-center whitespace-nowrap">
                                        {{ $student->studentClass->full_name ?? '-' }}
                                    </td>
                                    <td class="text-center whitespace-nowrap">
                                        @if($student->graduation_year)
                                        <span class="text-green-900 bg-green-200 py-1 px-3 rounded-full text-sm">Lulus - {{ $student->graduation_year }}</span>
                                        @else
                                        <span class="text-blue-900 bg-blue-200 py-1 px-3 rounded-full text-sm">Aktif</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4" class="text-center text-xl text-gray-700">Tidak ada data.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-span-4 lg:col-span-1">
                    <div class="flex flex-col rounded-md border border-[#e0e6ed] dark:border-[#1b2e4b]">
                        <a href="/peserta-didik" class="border-b border-[#e0e6ed] dark:border-[#1b2e4b] px-4 py-2.5 hover:bg-[#eee] dark:hover:bg-[#eee]/10">Tampilkan semua</a>
                    </div>
                    <div class="mb-4">
                        <div class="text-xl m-2">Kelas</div>
                        <div class="flex flex-col rounded-md border border-[#e0e6ed] dark:border-[#1b2e4b]">
                            @foreach ($classes as $class)
                            <a href="/peserta-didik?class={{ urlencode($class->id) }}" class="border-b border-[#e0e6ed] dark:border-[#1b2e4b] px-4 py-2.5 hover:bg-[#eee] dark:hover:bg-[#eee]/10">{{ $class->full_name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="text-xl m-2">Lulusan</div>
                        <div class="flex flex-col rounded-md border border-[#e0e6ed] dark:border-[#1b2e4b]">
                            @foreach ($graduationYears as $graduationYear)
                            @if($graduationYear != null)
                            <a href="/peserta-didik?graduation-year={{ urlencode($graduationYear) }}" class="border-b border-[#e0e6ed] dark:border-[#1b2e4b] px-4 py-2.5 hover:bg-[#eee] dark:hover:bg-[#eee]/10">{{ $graduationYear }}</a>
                            @endif
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
            new simpleDatatables.DataTable("#studentTable", {
                searchable: true, // Disables the search feature
                perPageSelect: true, // Disables the dropdown for selecting items per page,
                sortable: true, // Disables the sort feature
                labels: {
                    noRows: "No entries to show", // Message when no entries are available
                    info: "" // Empty string to hide the info text
                }
            });
        });
    </script>
    </div>
</x-layout.default>