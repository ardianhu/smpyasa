<div class="relative -mx-6 -mt-6 overflow-hidden mb-4">
    <!-- Image background -->
    <div class="absolute inset-0 bg-cover bg-top" style="background-image: url('{{ $backgroundImage }}');"></div>

    <!-- White overlay with backdrop brightness -->
    <div class="relative h-32 md:h-48 bg-black bg-opacity-50 filter backdrop-brightness-90 flex items-center justify-center">
        <h1 class="text-2xl md:text-4xl font-bold text-white drop-shadow-lg">{{ $title }}</h1>
    </div>
</div>