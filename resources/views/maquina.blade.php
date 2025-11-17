<x-app-layout>
    <div class="container">
        <h1 class="text-white ml-4">Máquina expendedora</h1>
        
        @if(session('error'))
        <div class="text-white ml-4 alert alert-danger">
            <p class="text-red-600">
                {{ session('error') }}
            </p>
        </div>
        @endif
        
        @if(session('success'))
        <div class="text-white ml-4 alert alert-success">
            <p class="text-green-600">
                {{ session('success') }}
            </p>
        </div>
        @endif
        
        <table class="table table-bordered ml-4">
            <thead>
                <tr>
                    <th class="text-white">Código</th>
                    <th class="text-white">Producto</th>
                    <th class="text-white">Precio</th>
                    <th class="text-white">Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td class="text-white">>{{ $producto->codigo }}</td>
                    <td class="text-white">>{{ $producto->nombre }}</td>
                    <td class="text-white">>{{ $producto->precio }}</td>
                    <td class="text-white">>{{ $producto->stock }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <h3 class="text-white ml-4">>Comprar producto</h3>
        <form action="{{ route('maquina.comprar') }}" method="POST">
            @csrf
            <div class="text-black ml-4 mb-3">
                <label for="codigo" class="text-white form-label">Código del producto</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required>
            </div>
            <div class="text-black ml-4 mb-3">
                <label for="dinero" class="text-white form-label">Dinero a introducir</label>
                <input type="number" step="0.01" class="ml-4 form-control" id="dinero" name="dinero" required>
            </div>
            <button type="submit" class="text-white ml-4 btn btn-primary">Comprar</button>
        </form>
    </div>
</x-app-layout>



