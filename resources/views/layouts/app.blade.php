<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@1,700&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Restaurant - @yield('titulo') </title>
</head>

<body class=" bg-slate-50"
    style="background-image: url('https://ruemag.com/wp-content/uploads/2017/08/09-09-17-rwl-wallpaper-07.jpg')">

    <nav class="bg-yellow-500 border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="{{ route('home') }}" class="flex items-center"> <img src="https://freesvg.org/img/aiga-restaurant-bg.png"
                    class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-3xl font-semibold whitespace-nowrap dark:text-white uppercase">Restaurant
                    Web </span>
            </a>
            <div class="hidden w-full md:block md:w-auto mr-8" id="navbar-default">
                <ul
                    class="flex flex-col p-4 mt-4 rounded-lg border  md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
                    <li>
                        <a href="{{ route('home') }}"
                            class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent uppercase text-lg">Inicio</a>
                    </li>

                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium  text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent uppercase text-lg">Pedidos
                            <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="{{ route('administrador.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"> Todos los Pedidos</a>
                                </li>
                                <li>
                                    <a href="{{route('administrador.search', "CONFIRMADO")}}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"> Pedidos Confirmados</a>
                                </li>
                                <li>
                                    <a href="{{route('administrador.search', "PREPARANDO")}}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"> Pedidos Preparación</a>
                                </li>
                                <li>
                                    <a href="{{route('administrador.search', "ENTREGADO")}}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"> Pedidos Entregados</a>
                                </li>
                            </ul>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('contenido')
    </main>
    <footer class="text-center p-5 text-white font-bold uppercase  abs">
        Restaurant APP - Todos los derechos reservados {{ now()->year }}
    </footer>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</body>

</html>
