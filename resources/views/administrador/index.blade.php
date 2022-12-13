@extends('layouts.app')

@section('titulo')
    Pedidos
@endsection

@section('contenido')
    <div class="w-full h-full bg-no-repeat bg-cover">
        @if ($orders->count())
            @if (session()->has('success_msg'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold"> {{ session()->get('success_msg') }}</strong>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
            <div class="grid md:grid-cols-2 sm:grid-cols-3 xl:grid-cols-6 gap-4">
                @foreach ($orders as $order)
                    <div class="bg-yellow-500 rounded p-3 mt-2 ml-2 mr-2  mb-5">
                        <div class="mb-4">
                            <p class="text-3xl font-Lobster text-center">Pedido: {{ $order->id }}</p>
                            <p class="text-3xl font-Lobster text-center">Código: {{ $order->code }}</p>
                        </div>
                        <div class="bg-yellow-600 rounded mb-1">
                            <p class="text-xl font-Merriweather Sans font-semibold mb-2 ml-2">Total: <span
                                    class="font-bold">{{ $order->total }}</span></p>
                            <p class="text-xl font-Merriweather Sans font-semibold mb-2 ml-2">Estado: {{ $order->status }}
                            </p>
                            <p class="text-xl font-Merriweather Sans font-semibold mb-6 ml-2">Número de Mesa:
                                {{ $order->tables_id }}
                            </p>
                            <p class="text-xl font-Merriweather Sans font-semibold mb-6 ml-2">Fecha de la Orden:
                                {{ date('d/m/Y', strtotime($order->date)) }}
                            </p>
                        </div>

                        <div class="flex flex-col justify-center items-center">
                            <button
                                class="block text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800 mb-4"
                                type="button" data-modal-toggle="defaultModal-{{ $order->id }}">
                                Ver Detalle Pédido
                            </button>
                        </div>

                        @if ($order->status === 'CONFIRMADO')
                            <div class="flex flex-col justify-center items-center">
                                <form method="POST" action="{{ route('administrador.timer', $order) }}" novalidate>
                                    @csrf
                                        <input name="timer" type="number" id="time" name="time"
                                            placeholder="Ingresa el tiempo de espera"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="" required>
                                        @error('timer')
                                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}</p>
                                        @enderror

                                    <button type="submit"
                                        class=" hover:bg-red-800 rounded bg-red-600 text-center font-bold uppercase pt-4 pb-4 pl-2 pr-2 mt-4 w-full">
                                        Confirmar Tiempo
                                    </button>

                                </form>
                            </div>
                        @elseif ($order->status === 'PREPARANDO')
                            <div class="flex flex-col justify-center items-center">
                                <form method="POST" action="{{ route('administrador.status', $order) }}" novalidate>
                                    @csrf
                                    <button type="submit"
                                        class=" hover:bg-green-800 rounded bg-green-400 text-center font-bold uppercase pt-4 pb-4 pl-2 pr-2 mt-4">
                                        Marcar como Entregada
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <!-- Main modal -->
                    <div id="defaultModal-{{ $order->id }}" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-2xl md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Detalle Pédido
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="defaultModal-{{ $order->id }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6">
                                    <div class="bg-orange-300 rounded p-2">
                                        @foreach ($order->productoVenta as $producto)
                                            <div class="border-t-2 border-gray-100 mt-4"> </div>
                                            <div class="flex justify-between mt-3 m-1">
                                                <div class="">
                                                    <p class="text-lg font-Lobster">Código: <span
                                                            class="text-xlk font-normal">{{ $producto->productoDatos->code }}</span>
                                                    </p>
                                                    <p class="text-lg font-Lobster">Producto: <span
                                                            class="text-xlk font-normal">{{ $producto->productoDatos->name }}</span>
                                                    </p>
                                                    <p class="text-lg font-Lobster">Precio:
                                                        {{ $producto->productoDatos->price }}</p>
                                                    <p class="text-lg font-Lobster">Cantidad: {{ $producto->quantity }}
                                                    </p>
                                                </div>
                                                <div class="w-24 h-24 align">
                                                    <img class="w-20 h-20 rounded-lg"
                                                        alt="img-{{ $producto->productoDatos->name }}"
                                                        src="{{ $producto->productoDatos->image }}" />

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button data-modal-toggle="defaultModal-{{ $order->id }}" type="button"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            <div class="mt-20 mb-20 bg-white p-8 ml-24 mr-24 rounded-xl">
                <h1 class="text-4xl text-center font-Merriweather Sans font-semibold">No hay pedidos por mostrar</h1>
            </div>
        @endif
    </div>
@endsection
