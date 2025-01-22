@if (Route::is('client.*'))
<div class="bg-green-700 text-white w-full">
    <div class="container">
        <div class="px-4 pt-16 mx-auto  md:px-24 lg:px-8">
            <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="sm:col-span-2">
                    <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
                        <img src="/assets/images/logo.png.webp" alt="Logo" class="w-10 h-10">
                        <span class="ml-2 text-xl font-bold tracking-wide text-white uppercase">SMP YAS'A</span>
                    </a>
                    <div class="mt-6 lg:max-w-sm">
                        @if($info && $info->about)
                        <p class="text-sm text-white">
                            {{ $info->about }}
                        </p>
                        @else
                        <p class="text-sm text-white">
                            belum ada data
                        </p>
                        @endif
                        <!-- <p class="mt-4 text-sm text-white">
                            Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                        </p> -->
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <p class="text-base font-bold tracking-wide text-white">Kontak</p>
                    <div class="flex">
                        <p class="mr-1 text-white">Telepon:</p>
                        @if ($info && $info->phone)
                        <a href="https://www.wa.me/{{ $info->phone }}" aria-label="Our phone" title="Our phone" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">{{ $info->phone }}</a>
                        @else
                        <p class="text-sm text-white">
                            belum ada data
                        </p>
                        @endif
                    </div>
                    <div class="flex">
                        <p class="mr-1 text-white">Email:</p>
                        @if ($info && $info->email)
                        <a href="mailto:{{ $info->email }}" aria-label="Our email" title="Our email" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">{{ $info->email }}</a>
                        @else
                        <p class="text-sm text-white">
                            belum ada data
                        </p>
                        @endif
                    </div>
                    <div class="flex">
                        <p class="mr-1 text-white">Alamat:</p>
                        @if ($info && $info->address)
                        <a href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer" aria-label="Our address" title="Our address" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">
                            {{ $info->address }}
                        </a>
                        @else
                        <p class="text-sm text-white">
                            belum ada data
                        </p>
                        @endif
                    </div>
                </div>
                <div>
                    <span class="text-base font-bold tracking-wide text-white">Sosial Media</span>
                    <div class="flex items-center mt-1 space-x-3">
                        @if ($info && $info->youtube_link)
                        <a href="{{ $info->youtube_link }}" class="text-gray-200 transition-colors duration-300 hover:text-deep-purple-accent-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                            </svg>
                        </a>
                        @endif
                        @if ($info && $info->twitter_link)
                        <a href="{{ $info->twitter_link }}" class="text-gray transition-colors duration-300 hover:text-deep-purple-accent-400">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                                <path
                                    d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z"></path>
                            </svg>
                        </a>
                        @endif
                        @if ($info && $info->instagram_link)
                        <a href="{{ $info->instagram_link }}" class="text-gray-200 transition-colors duration-300 hover:text-deep-purple-accent-400">
                            <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
                                <circle cx="15" cy="15" r="4"></circle>
                                <path
                                    d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z"></path>
                            </svg>
                        </a>
                        @endif
                        @if ($info && $info->facebook_link)
                        <a href="{{ $info->facebook_link }}" class="text-gray-200 transition-colors duration-300 hover:text-deep-purple-accent-400">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                                <path
                                    d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"></path>
                            </svg>
                        </a>
                        @endif
                        @if ($info && $info->tiktok_link)
                        <a href="{{ $info->tiktok_link }}" class="text-gray-200 transition-colors duration-300 hover:text-deep-purple-accent-400">
                            <svg fill="currentColor" width="20px" height="20px" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.53.02C13.84 0 15.14.01 16.44 0c.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                            </svg>
                        </a>
                        @endif

                    </div>
                    <p class="mt-4 text-sm text-gray-200">
                        Temukan kami di berbagai media sosial di atas.
                    </p>
                </div>
            </div>
            <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
                <p class="text-sm text-gray-300">
                    © Copyright {{ date('Y') }} SMP Yas'a (Yayasan Abdullah).
                </p>
                <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
                    <li>
                        <a href="/" class="text-sm text-gray-300 transition-colors duration-300 hover:text-deep-purple-accent-400">F.A.Q</a>
                    </li>
                    <li>
                        <a href="/" class="text-sm text-gray-300 transition-colors duration-300 hover:text-deep-purple-accent-400">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="/" class="text-sm text-gray-300 transition-colors duration-300 hover:text-deep-purple-accent-400">Terms &amp; Conditions</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@else
<p class="dark:text-white-dark text-center ltr:sm:text-left rtl:sm:text-right pt-6 px-6">© <span id="footer-year">2024</span>.
    Admin.</p>
@endif