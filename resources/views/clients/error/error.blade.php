<x-layout.auth>

    <div class="flex justify-center items-center min-h-screen bg-gradient-to-t from-[#29bb77] to-[#eafaf5]">
        <div class="text-center p-5 font-semibold">
            <h2 class="text-[50px] md:text-[80px] leading-none mb-8 font-bold">Error</h2>
            <h4 class="mb-5 font-semibold text-xl sm:text-5xl text-success">Maaf!</h4>
            <p class="text-base">{{ $pesan ?? 'Error belum diketahui' }}</p>
            <a href="/" class="btn btn-success mt-10 w-max mx-auto">Laman Utama</a>
        </div>
    </div>

</x-layout.auth>