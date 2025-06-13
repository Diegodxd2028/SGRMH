<header>
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="text-xl font-bold text-blue-600">
                Sistema de gestión de residuos de la Municipalidad Provincial de Huari
            </div>
            <div class="space-x-6">
                <!-- <a href="{{route('inicio')}}" class="{{request()->routeIs('inicio') ? 'active' : ''}}">Inicio</a> -->
                <a href="{{route('quienes-somos')}}" class="{{request()->routeIs('quienes-somos') ? 'active' : ''}}">Quienes Somos</a>
                <a href="{{route('reciclaje')}}" class="{{request()->routeIs('reciclaje') ? 'active' : ''}}">Reciclaje</a>
                <a href="{{route('recompensas')}}" class="{{request()->routeIs('recompensas') ? 'active' : ''}}">Recompensas</a>
                <a href="{{route('contactanos.index')}}" class="{{request()->routeIs('contactanos.index') ? 'active' : ''}}">Atencion al usuario</a>

                @auth
                <!-- Botón de cerrar sesión solo si el usuario está autenticado -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-red-500 font-medium">
                        Cerrar Sesión
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </nav>

</header>