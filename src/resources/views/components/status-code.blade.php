<main class="h-screen w-full flex flex-col justify-center items-center bg-gray">
    <h1 class="text-9xl font-extrabold text-gray-500 tracking-widest">{{ $code }}</h1>
    <div class="bg-[#f7dc6f] px-2 text-sm text-gray rounded rotate-12 absolute">
        {{ $description }}
    </div>
    <button class="mt-5 focus-visible:outline-none">
        <a href="{{ route('login') }}" class="relative inline-block text-sm font-medium text-gray group active:text-[#f7dc6f]-500 focus:outline-none focus-visible:outline-none">
            <span class="absolute inset-0 transition-transform translate-x-0.5 translate-y-0.5 bg-[#f7dc6f] group-hover:translate-y-0 group-hover:translate-x-0"></span>

            <span class="relative block px-8 py-3 bg-white text-[#5f6876] border border-[#f7dc6f]">
                Volver
            </span>
        </a>
    </button>
</main>