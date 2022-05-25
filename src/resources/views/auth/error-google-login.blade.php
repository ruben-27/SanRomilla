<x-guest-layout>
    {{-- <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>        
    </x-auth-card> --}}
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">    
        <div class="w-full flex flex-col items-center sm:max-w-md mt-6 px-6  py-9 bg-white text-center shadow-md overflow-hidden sm:rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-octagon" width="80" height="80" viewBox="0 0 24 24" stroke-width="2" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M8.7 3h6.6c.3 0 .5 .1 .7 .3l4.7 4.7c.2 .2 .3 .4 .3 .7v6.6c0 .3 -.1 .5 -.3 .7l-4.7 4.7c-.2 .2 -.4 .3 -.7 .3h-6.6c-.3 0 -.5 -.1 -.7 -.3l-4.7 -4.7c-.2 -.2 -.3 -.4 -.3 -.7v-6.6c0 -.3 .1 -.5 .3 -.7l4.7 -4.7c.2 -.2 .4 -.3 .7 -.3z" />
                <line x1="12" y1="8" x2="12" y2="12" />
                <line x1="12" y1="16" x2="12.01" y2="16" />
              </svg>
            <h1 class="mt-5 mb-3 text-2xl font-extrabold ">Vaya...</h1>
            <p>
                Parece que no tienes permisos para acceder a este sitio web. Si crees que se debe a un error 
                contacta con algún coordinador del centro.
            </p>
            <button class="mt-5 focus-visible:outline-none">
                <a href="{{ route('login') }}" class="relative inline-block text-sm font-medium text-gray group active:text-[#f7dc6f]-500 focus:outline-none focus-visible:outline-none">
                    <span class="absolute inset-0 transition-transform translate-x-0.5 translate-y-0.5 bg-[#f7dc6f] group-hover:translate-y-0 group-hover:translate-x-0"></span>
        
                    <span class="relative block px-8 py-3 bg-white text-[#5f6876] border border-[#f7dc6f]">
                        Volver
                    </span>
                </a>
            </button>
        </div>
    </div>
</x-guest-layout>