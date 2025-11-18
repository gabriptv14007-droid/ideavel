<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-white text-xl font-semibold">Productos</h2>
    </x-slot>

    <div class="p-6">

        @if(session('ok'))
            <div class="mb-4 p-3 bg-green-500 text-white rounded">
                {{ session('ok') }}
            </div>
        @endif

        <form method="POST" action="{{ route('productos.store') }}" class="mb-6 grid grid-cols-4 gap-2">
            @csrf

            <input name="codigo" placeholder="Código" required class="border p-2 rounded">
            <input name="nombre" placeholder="Nombre" required class="border p-2 rounded">
            <input name="precio" placeholder="Precio" required type="number" step="0.01" class="border p-2 rounded">
            <input name="stock" placeholder="Stock" required type="number" class="border p-2 rounded">

            <button class="bg-green-600 text-white px-4 py-2 rounded col-span-4">
                Añadir Producto
            </button>
        </form>

        <table class="w-full border text-left">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 text-white">Código</th>
                    <th class="p-2 text-white">Nombre</th>
                    <th class="p-2 text-white">Precio</th>
                    <th class="p-2 text-white">Stock</th>
                    <th class="p-2 text-white"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr class="border-b">
                        <td class="p-2 text-white">{{ $producto->codigo }}</td>
                        <td class="p-2 text-white">{{ $producto->nombre }}</td>
                        <td class="p-2 text-white">{{ $producto->precio }} €</td>
                        <td class="p-2 text-white">{{ $producto->stock }}</td>
                        <td class="p-2 text-white">
                            <form method="POST" action="{{ route('productos.destroy', $producto) }}">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white px-3 py-1 rounded">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
