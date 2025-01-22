<div :class="{ 'dark text-white-dark': $store.app.semidark }">
    <nav x-data="sidebar" class="sidebar fixed min-h-screen h-full top-0 bottom-0 w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] z-50 transition-all duration-300">
        <div class="bg-white dark:bg-[#0e1726] h-full">
            <div class="flex justify-between items-center px-4 py-3">
                <a href="/" class="main-logo flex items-center shrink-0">
                    <img class="w-8 ml-[5px] flex-none" src="/assets/images/logo.png.webp" alt="image" />
                    <span class="text-2xl ltr:ml-1.5 rtl:mr-1.5  font-semibold  align-middle lg:inline dark:text-white-light">SMP YAS'A</span>
                </a>
                <a href="javascript:;" class="collapse-icon w-8 h-8 rounded-full flex items-center hover:bg-gray-500/10 dark:hover:bg-dark-light/10 dark:text-white-light transition duration-300 rtl:rotate-180" @click="$store.app.toggleSidebar()">
                    <svg class="w-5 h-5 m-auto" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <ul class="perfect-scrollbar relative font-semibold space-y-0.5 h-[calc(100vh-80px)] overflow-y-auto overflow-x-hidden  p-4 py-0" x-data="{ activeDropdown: null }">
                @if (Route::is('client.*'))
                <li class="menu nav-item">
                    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'utama' }" @click="activeDropdown === 'utama' ? activeDropdown = null : activeDropdown = 'utama'">
                        <div class="flex items-center">
                            <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Utama</span>
                        </div>
                        <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'utama' }">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                    <ul x-cloak x-show="activeDropdown === 'utama'" x-collapse class="sub-menu text-gray-500">
                        <li>
                            <a href="/">Beranda</a>
                        </li>
                        <li>
                            <a href="/berita">Berita</a>
                        </li>
                    </ul>
                </li>
                <li class="menu nav-item">
                    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'profile' }" @click="activeDropdown === 'profile' ? activeDropdown = null : activeDropdown = 'profile'">
                        <div class="flex items-center">
                            <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Profil</span>
                        </div>
                        <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'profile' }">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                    <ul x-cloak x-show="activeDropdown === 'profile'" x-collapse class="sub-menu text-gray-500">
                        <li>
                            <a href="/visi-misi">Visi Misi & Tujuan</a>
                        </li>
                        <li>
                            <a href="/struktur-organisasi">Struktur Organisasi</a>
                        </li>
                        <li>
                            <a href="/komite-sekolah">Komite Sekolah</a>
                        </li>
                    </ul>
                </li>
                <li class="menu nav-item">
                    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'direktori' }" @click="activeDropdown === 'direktori' ? activeDropdown = null : activeDropdown = 'direktori'">
                        <div class="flex items-center">
                            <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Direktori</span>
                        </div>
                        <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'direktori' }">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                    <ul x-cloak x-show="activeDropdown === 'direktori'" x-collapse class="sub-menu text-gray-500">
                        <li>
                            <a href="/guru-dan-tenaga-kependidikan">Guru & Tenaga Kependidikan</a>
                        </li>
                        <li>
                            <a href="/peserta-didik">Siswa</a>
                        </li>
                    </ul>
                </li>
                <li class="menu nav-item">
                    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'kurikulum' }" @click="activeDropdown === 'kurikulum' ? activeDropdown = null : activeDropdown = 'kurikulum'">
                        <div class="flex items-center">
                            <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Kurikulum</span>
                        </div>
                        <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'kurikulum' }">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                    <ul x-cloak x-show="activeDropdown === 'kurikulum'" x-collapse class="sub-menu text-gray-500">
                        <li>
                            <a href="/tentang-kurikulum">Tentang Kurikulum</a>
                        </li>
                        <li>
                            <a href="/info-kurikulum">Info Kurikulum</a>
                        </li>
                        <li>
                            <a href="/kalender-akademik">Kalender Akademik</a>
                        </li>
                        <li>
                            <a href="/jadwal-pelajaran">Jadwal Pelajaran</a>
                        </li>
                        <li>
                            <a href="/format-nilai">Format Nilai</a>
                        </li>
                        <li>
                            <a href="/jadwal-ujian">Jadwal Ujian</a>
                        </li>
                    </ul>
                </li>
                <li class="menu nav-item">
                    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'kesiswaan' }" @click="activeDropdown === 'kesiswaan' ? activeDropdown = null : activeDropdown = 'kesiswaan'">
                        <div class="flex items-center">
                            <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Kesiswaan</span>
                        </div>
                        <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'kesiswaan' }">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                    <ul x-cloak x-show="activeDropdown === 'kesiswaan'" x-collapse class="sub-menu text-gray-500">
                        <li>
                            <a href="/tentang-kesiswaan">Tentang Kesiswaan</a>
                        </li>
                        <li>
                            <a href="/ekstra-kurikuler">Ekstra Kurikuler</a>
                        </li>
                        <li x-data="{ subActive: null }">
                            <button type="button" class="before:bg-gray-300 before:w-[5px] before:h-[5px] before:rounded ltr:before:mr-2 rtl:before:ml-2 dark:text-[#888ea8] hover:bg-gray-100 dark:hover:bg-gray-900" @click="subActive === 'osis' ? subActive = null : subActive = 'osis'">Osis
                                <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180" :class="{ '!rotate-90': subActive === 'osis' }">

                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" d="M6.25 19C6.25 19.3139 6.44543 19.5946 6.73979 19.7035C7.03415 19.8123 7.36519 19.7264 7.56944 19.4881L13.5694 12.4881C13.8102 12.2073 13.8102 11.7928 13.5694 11.5119L7.56944 4.51194C7.36519 4.27364 7.03415 4.18773 6.73979 4.29662C6.44543 4.40551 6.25 4.68618 6.25 5.00004L6.25 19Z" fill="currentColor" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5119 19.5695C10.1974 19.2999 10.161 18.8264 10.4306 18.5119L16.0122 12L10.4306 5.48811C10.161 5.17361 10.1974 4.70014 10.5119 4.43057C10.8264 4.161 11.2999 4.19743 11.5695 4.51192L17.5695 11.5119C17.8102 11.7928 17.8102 12.2072 17.5695 12.4881L11.5695 19.4881C11.2999 19.8026 10.8264 19.839 10.5119 19.5695Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </button>
                            <ul class="sub-menu text-gray-500 ltr:ml-2 rtl:mr-2" x-show="subActive === 'osis'" x-collapse>
                                <li>
                                    <a href="/program-kerja-osis">Program Kerja Osis</a>
                                </li>
                                <li>
                                    <a href="/kegiatan-osis">Kegiatan Osis</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/daftar-nama-siswa">Daftar Nama Siswa</a>
                        </li>
                        <li>
                            <a href="/p-lima">P5</a>
                        </li>
                        <li>
                            <a href="/tata-tertib-siswa">Tata Tertib Siswa</a>
                        </li>
                        <li>
                            <a href="/bp-bk">BP / BK</a>
                        </li>
                    </ul>
                </li>
                <li class="menu nav-item">
                    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'sarpras' }" @click="activeDropdown === 'sarpras' ? activeDropdown = null : activeDropdown = 'sarpras'">
                        <div class="flex items-center">
                            <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Sarana Prasarana</span>
                        </div>
                        <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'sarpras' }">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                    <ul x-cloak x-show="activeDropdown === 'sarpras'" x-collapse class="sub-menu text-gray-500">
                        <li>
                            <a href="/tupoksi-sarana-prasarana">Tupoksi</a>
                        </li>
                        <li>
                            <a href="/ruang-kasek">Ruang Kasek</a>
                        </li>
                        <li>
                            <a href="/ruang-guru">Ruang Guru</a>
                        </li>
                        <li>
                            <a href="/aula">Aula</a>
                        </li>
                        <li>
                            <a href="/perpustakaan">Perpustakaan</a>
                        </li>
                    </ul>
                </li>
                <li class="menu nav-item">
                    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'humas' }" @click="activeDropdown === 'humas' ? activeDropdown = null : activeDropdown = 'humas'">
                        <div class="flex items-center">
                            <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Humas</span>
                        </div>
                        <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'humas' }">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                    <ul x-cloak x-show="activeDropdown === 'humas'" x-collapse class="sub-menu text-gray-500">
                        <li>
                            <a href="/tupoksi-humas">Tupoksi</a>
                        </li>
                        <li>
                            <a href="/info-humas">Info Humas</a>
                        </li>
                    </ul>
                </li>
                <li class="menu nav-item">
                    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'lainnya' }" @click="activeDropdown === 'lainnya' ? activeDropdown = null : activeDropdown = 'lainnya'">
                        <div class="flex items-center">
                            <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Lainnya</span>
                        </div>
                        <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'lainnya' }">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                    <ul x-cloak x-show="activeDropdown === 'lainnya'" x-collapse class="sub-menu text-gray-500">
                        <li>
                            <a href="/galeri">Galeri</a>
                        </li>
                        <li>
                            <a href="/hubungi-kami">Hubungi Kami</a>
                        </li>
                        <li>
                            <a href="/prestasi">Prestasi</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("sidebar", () => ({
            init() {
                const selector = document.querySelector('.sidebar ul a[href="' + window.location
                    .pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.click();
                            });
                        }
                    }
                }
            },
        }));
    });
</script>