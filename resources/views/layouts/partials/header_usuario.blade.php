<header x-data="{ open: false }" class="bg-white shadow-md">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo / Título -->
            <div class="text-blue-600 font-bold text-sm sm:text-base md:text-lg">
                Sistema de gestión de residuos - Municipalidad de Huari
            </div>

            <!-- Navegación en pantallas grandes -->
            <div class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('quienes-somos') }}" class="{{ request()->routeIs('quienes-somos') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-500' }}">Quiénes Somos</a>
                <a href="{{ route('reciclaje') }}" class="{{ request()->routeIs('reciclaje') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-500' }}">Reciclaje</a>
                <a href="{{ route('recompensas') }}" class="{{ request()->routeIs('recompensas') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-500' }}">Recompensas</a>
                <a href="{{ route('contactanos.index') }}" class="{{ request()->routeIs('contactanos.index') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-500' }}">Atención al Usuario</a>

                @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-red-500 font-medium">Cerrar Sesión</button>
                </form>
                @endauth
            </div>

            <!-- Botón hamburguesa en móviles -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-gray-700 focus:outline-none">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Navegación desplegable para móviles -->
        <div x-show="open" class="md:hidden mt-2 pb-4 space-y-2" x-transition>
            <a href="{{ route('quienes-somos') }}" class="block px-4 py-2 {{ request()->routeIs('quienes-somos') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-500' }}">Quiénes Somos</a>
            <a href="{{ route('reciclaje') }}" class="block px-4 py-2 {{ request()->routeIs('reciclaje') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-500' }}">Reciclaje</a>
            <a href="{{ route('recompensas') }}" class="block px-4 py-2 {{ request()->routeIs('recompensas') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-500' }}">Recompensas</a>
            <a href="{{ route('contactanos.index') }}" class="block px-4 py-2 {{ request()->routeIs('contactanos.index') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-500' }}">Atención al Usuario</a>

            @auth
            <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2">
                @csrf
                <button type="submit" class="text-gray-700 hover:text-red-500 font-medium">Cerrar Sesión</button>
            </form>
            @endauth
        </div>
    </nav>
</header>

