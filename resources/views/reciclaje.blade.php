@extends('layouts.plantilla_usuario')

@section('title', 'Reciclaje')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-green-500 to-teal-600 rounded-xl p-8 mb-10 text-center text-white">
            <h1 class="text-4xl font-bold mb-4">Reciclaje en Huari</h1>
            <p class="text-xl mb-6">Aprende cómo puedes contribuir al cuidado del medio ambiente y gana puntos por reciclar</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#beneficios" class="bg-white hover:bg-gray-100 text-green-600 px-6 py-2 rounded-lg transition font-medium">Beneficios</a>
                <a href="#materiales" class="bg-white hover:bg-gray-100 text-green-600 px-6 py-2 rounded-lg transition font-medium">Materiales</a>
                <a href="#puntos" class="bg-white hover:bg-gray-100 text-green-600 px-6 py-2 rounded-lg transition font-medium">Puntos de Reciclaje</a>
            </div>
        </div>

        <!-- Beneficios del Reciclaje -->
        <section id="beneficios" class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Beneficios del Reciclaje</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="text-green-500 text-4xl mb-4">♻️</div>
                    <h3 class="font-bold text-lg mb-2">Conservación de recursos</h3>
                    <p class="text-gray-600">Reciclar reduce la necesidad de extraer materias primas, conservando nuestros recursos naturales.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="text-green-500 text-4xl mb-4">🌱</div>
                    <h3 class="font-bold text-lg mb-2">Ahorro de energía</h3>
                    <p class="text-gray-600">Fabricar productos con materiales reciclados consume menos energía que hacerlo desde cero.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="text-green-500 text-4xl mb-4">🏭</div>
                    <h3 class="font-bold text-lg mb-2">Reducción de basura</h3>
                    <p class="text-gray-600">Menos residuos en vertederos significa menos contaminación para nuestro medio ambiente.</p>
                </div>
            </div>
        </section>

        <!-- Materiales Reciclables -->
        <section id="materiales" class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Materiales Reciclables</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Cartón -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="h-48 overflow-hidden">
                        <img src="https://www.smurfitkappa.com/sv/-/m/images/blog-full-width-931-x-400/recycling.jpg?rev=-1&arw=0&hash=A351049714B9E4F32D166F80D86B370C"
                             alt="Reciclaje de cartón" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2 flex items-center">
                            <span class="bg-amber-100 text-amber-800 text-xs px-2 py-1 rounded-full mr-2">MAR</span>
                            Cartón
                        </h3>
                        <p class="text-sm text-gray-600 mb-3">Dobla las cajas y elimina residuos antes de depositarlas en el contenedor marrón.</p>
                        <div class="text-xs text-gray-500">
                            <p class="font-medium">¿Qué incluir?</p>
                            <ul class="list-disc pl-5 mt-1">
                                <li>Cajas de embalaje</li>
                                <li>Envases de alimentos</li>
                                <li>Cartón corrugado</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Plásticos -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="h-48 overflow-hidden">
                        <img src="https://i0.wp.com/stopbasura.com/wp-content/uploads/2016/11/mr-tindc.jpg?fit=640%2C427&ssl=1"
                             alt="Reciclaje de plástico" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2 flex items-center">
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full mr-2">AMA</span>
                            Plásticos
                        </h3>
                        <p class="text-sm text-gray-600 mb-3">Limpia las botellas, aplástalas y sepáralas por tipo para facilitar el reciclaje.</p>
                        <div class="text-xs text-gray-500">
                            <p class="font-medium">¿Qué incluir?</p>
                            <ul class="list-disc pl-5 mt-1">
                                <li>Botellas PET</li>
                                <li>Envases de limpieza</li>
                                <li>Bolsas plásticas limpias</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Vidrio -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="h-48 overflow-hidden">
                        <img src="https://www.byond.es/cmsAdmin/uploads/o_1gpfhg4ms2tde3j1u608p71j4ea.jpeg"
                             alt="Reciclaje de vidrio" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2 flex items-center">
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full mr-2">VER</span>
                            Vidrio
                        </h3>
                        <p class="text-sm text-gray-600 mb-3">Deposita frascos y botellas sin tapas en el contenedor verde.</p>
                        <div class="text-xs text-gray-500">
                            <p class="font-medium">¿Qué incluir?</p>
                            <ul class="list-disc pl-5 mt-1">
                                <li>Botellas de bebidas</li>
                                <li>Frascos de alimentos</li>
                                <li>Envases de perfumería</li>
                            </ul>
                            <p class="font-medium mt-2">No incluir:</p>
                            <ul class="list-disc pl-5">
                                <li>Vidrios rotos</li>
                                <li>Espejos</li>
                                <li>Cerámica</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Orgánicos -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="h-48 overflow-hidden">
                        <img src="https://www.compostandociencia.com/wp-content/uploads/2020/07/compost-1024x683.jpg"
                             alt="Reciclaje orgánico" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2 flex items-center">
                            <span class="bg-brown-100 text-brown-800 text-xs px-2 py-1 rounded-full mr-2">ORG</span>
                            Residuos Orgánicos
                        </h3>
                        <p class="text-sm text-gray-600 mb-3">Aprovecha los residuos orgánicos para compostaje y abono natural.</p>
                        <div class="text-xs text-gray-500">
                            <p class="font-medium">¿Qué incluir?</p>
                            <ul class="list-disc pl-5 mt-1">
                                <li>Restos de frutas/verduras</li>
                                <li>Cáscaras de huevo</li>
                                <li>Restos de poda</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Puntos de Reciclaje -->
        <section id="puntos" class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Puntos de Reciclaje en Huari</h2>
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="md:w-1/2">
                        <h3 class="text-lg font-bold mb-4">Ubicaciones principales</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <div class="bg-green-100 p-2 rounded-full mr-3">
                                    ♻️
                                </div>
                                <div>
                                    <p class="font-medium">Plaza de Armas</p>
                                    <p class="text-sm text-gray-600">Contenedores para vidrio, plástico y papel</p>
                                    <p class="text-xs text-green-600 font-medium mt-1">Horario: 7:00 AM - 7:00 PM</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <div class="bg-green-100 p-2 rounded-full mr-3">
                                    ♻️
                                </div>
                                <div>
                                    <p class="font-medium">Mercado Central</p>
                                    <p class="text-sm text-gray-600">Punto limpio para residuos orgánicos y reciclables</p>
                                    <p class="text-xs text-green-600 font-medium mt-1">Horario: 6:00 AM - 6:00 PM</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <div class="bg-green-100 p-2 rounded-full mr-3">
                                    🏫
                                </div>
                                <div>
                                    <p class="font-medium">Municipalidad Provincial</p>
                                    <p class="text-sm text-gray-600">Centro de acopio para materiales especiales</p>
                                    <p class="text-xs text-green-600 font-medium mt-1">Horario: 8:00 AM - 4:00 PM</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Consejos para Reciclar -->
        <section class="bg-blue-50 rounded-xl p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Consejos para Reciclar Mejor</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <h3 class="font-bold text-lg mb-3 flex items-center">
                        <span class="bg-blue-100 text-blue-800 p-2 rounded-full mr-3">1</span>
                        Limpia los envases
                    </h3>
                    <p class="text-gray-600">Enjuaga los recipientes de comida antes de reciclarlos para evitar malos olores y contaminación.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <h3 class="font-bold text-lg mb-3 flex items-center">
                        <span class="bg-blue-100 text-blue-800 p-2 rounded-full mr-3">2</span>
                        Separa correctamente
                    </h3>
                    <p class="text-gray-600">Asegúrate de colocar cada material en su contenedor correspondiente según el código de colores.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <h3 class="font-bold text-lg mb-3 flex items-center">
                        <span class="bg-blue-100 text-blue-800 p-2 rounded-full mr-3">3</span>
                        Reduce y reutiliza
                    </h3>
                    <p class="text-gray-600">Antes de reciclar, considera si puedes reutilizar el artículo o reducir su consumo.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <h3 class="font-bold text-lg mb-3 flex items-center">
                        <span class="bg-blue-100 text-blue-800 p-2 rounded-full mr-3">4</span>
                        Compacta los residuos
                    </h3>
                    <p class="text-gray-600">Aplasta las botellas y cajas para ocupar menos espacio y facilitar el transporte.</p>
                </div>
            </div>
        </section>
    </div>
@endsection