<nav x-data="{ open: false }" class="fixed w-full bg-white border-b border-gray-100 z-10 shadow">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto sm:px-4 sm:px-4 lg:px-6">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <button>
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </button>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>
                                {{ Auth::user()->email }}
                            </div>
                            <div class="ml-3">
                                <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-full w-10 mr-5" referrerpolicy="no-referrer">
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Cerrar sesión
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                {{-- <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button> --}}
                <button @click="open = ! open">
                    <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-full w-10 mr-5" referrerpolicy="no-referrer">
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Cerrar sesión
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<!-- Sidebar -->            
<div class="fixed flex flex-col top-16 left-0 w-14 hover:w-64 md:w-64 bg-white h-full text-white transition-all duration-300 border-none z-9 sidebar shadow" x-show="asideOpen">
    <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
        <ul class="flex flex-col w-full">
            <li class="my-px">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            class="h-6 w-6">
                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </span>
                    <span class="ml-3 tracking-wide truncate">Inicio</span>
                </x-nav-link>
            </li>
            <li class="my-px">
                <span class="hidden md:block flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Carrera</span>
            </li>
            <li class="my-px">
                <x-nav-link :href="route('inscription')" :active="request()->routeIs('inscription')">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            class="h-6 w-6">
                            <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </span>
                    <span class="ml-3 tracking-wide truncate">Inscripciones</span>
                </x-nav-link>
            </li>
            <li class="my-px">
                <x-nav-link :href="route('clasification')" :active="request()->routeIs('clasification')">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="icon icon-tabler icon-tabler-list"
                            width="25" height="25"
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            fill="none" 
                            stroke-linecap="round" 
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M11 6h9" />
                            <path d="M11 12h9" />
                            <path d="M12 18h8" />
                            <path d="M4 16a2 2 0 1 1 4 0c0 .591 -.5 1 -1 1.5l-3 2.5h4" />
                            <path d="M6 10v-6l-2 2" />
                          </svg>
                    </span>
                    <span class="ml-3 tracking-wide truncate">Marcas</span>
                </x-nav-link>
            </li>
            <li class="my-px">
                <a href="#"
                class="flex flex-row items-center h-12 px-4 text-gray-600 hover:bg-gray-100 md:border-l-4 border-transparent hover:border-[#f7dc6f]">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="icon icon-tabler icon-tabler-list"
                            width="25" height="25"
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            fill="none" 
                            stroke-linecap="round" 
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="18" y1="6" x2="18" y2="6.01" />
                            <path d="M18 13l-3.5 -5a4 4 0 1 1 7 0l-3.5 5" />
                            <polyline points="10.5 4.75 9 4 3 7 3 20 9 17 15 20 21 17 21 15" />
                            <line x1="9" y1="4" x2="9" y2="17" />
                            <line x1="15" y1="15" x2="15" y2="20" />
                          </svg>
                    </span>
                    <span class="ml-3 tracking-wide truncate">Ruta</span>
                </a>
            </li>
            <li class="my-px">
                <a href="#"
                class="flex flex-row items-center h-12 px-4 text-gray-600 hover:bg-gray-100 md:border-l-4 border-transparent hover:border-[#f7dc6f]">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="icon icon-tabler icon-tabler-list"
                            width="25" height="25"
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            fill="none" 
                            stroke-linecap="round" 
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="15" y1="8" x2="15.01" y2="8" />
                            <rect x="4" y="4" width="16" height="16" rx="3" />
                            <path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5" />
                            <path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2" />
                          </svg>
                    </span>
                    <span class="ml-3 tracking-wide truncate">Imágenes</span>
                </a>
            </li>
            <li class="my-px">
                <span class="hidden md:block flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Gestión</span>
            </li>
            <li class="my-px">
                <x-nav-link :href="route('year')" :active="request()->routeIs('year')">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg class="w-6 h-6" 
                            data-darkreader-inline-stroke="" 
                            fill="none" 
                            stroke="currentColor" 
                            style="--darkreader-inline-stroke: currentColor;" 
                            viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" 
                                stroke-linejoin="round" 
                                stroke-width="2" 
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </span>
                    <span class="ml-3 tracking-wide truncate">Años</span>
                </x-nav-link>
            </li>
            <li class="my-px">
                <x-nav-link :href="route('colaborator')" :active="request()->routeIs('colaborator')">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            class="h-6 w-6">
                            <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                    <span class="ml-3 tracking-wide truncate">Colaboradores</span>
                </x-nav-link>
            </li>
            <li class="my-px">
                <x-nav-link :href="route('category')" :active="request()->routeIs('category')">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="icon icon-tabler icon-tabler-list"
                            width="25" height="25"
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            fill="none" 
                            stroke-linecap="round" 
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="9" y1="6" x2="20" y2="6" />
                            <line x1="9" y1="12" x2="20" y2="12" />
                            <line x1="9" y1="18" x2="20" y2="18" />
                            <line x1="5" y1="6" x2="5" y2="6.01" />
                            <line x1="5" y1="12" x2="5" y2="12.01" />
                            <line x1="5" y1="18" x2="5" y2="18.01" />
                          </svg>
                    </span>
                    <span class="ml-3 tracking-wide truncate">Categorías</span>
                </x-nav-link>
            </li>
            <li class="my-px">
                <x-nav-link :href="route('donation')" :active="request()->routeIs('donation')">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="icon icon-tabler icon-tabler-list"
                            width="25" height="25"
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            fill="none" 
                            stroke-linecap="round" 
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <rect x="7" y="9" width="14" height="10" rx="2" />
                            <circle cx="14" cy="14" r="2" />
                            <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" />
                          </svg>
                    </span>
                    <span class="ml-3 tracking-wide truncate">Fila0</span>
                </x-nav-link>
            </li>
            <li class="my-px">
                <x-nav-link :href="route('sponsors')" :active="request()->routeIs('sponsors')">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg class="w-6 h-6" 
                            data-darkreader-inline-stroke="" 
                            fill="none" 
                            stroke="currentColor" 
                            style="--darkreader-inline-stroke: currentColor;" 
                            viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" 
                                stroke-linejoin="round" 
                                stroke-width="2" 
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </span>
                    <span class="ml-3 tracking-wide truncate">Patrocinadores</span>
                </x-nav-link>
            </li>
            <li class="my-px">
                <x-nav-link :href="route('documentation')" :active="request()->routeIs('documentation')">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg class="w-6 h-6" 
                            data-darkreader-inline-stroke="" 
                            fill="none" 
                            stroke="currentColor" 
                            style="--darkreader-inline-stroke: currentColor;" 
                            viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" 
                                stroke-linejoin="round" 
                                stroke-width="2" 
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </span>
                    <span class="ml-3 tracking-wide truncate">Documentación</span>
                </x-nav-link>
            </li>
        </ul>
    </div>
</div>
<!-- ./Sidebar -->