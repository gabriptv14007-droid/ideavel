<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bienvenido!") }}
                    @if($bestIdea && $bestIdea->likes > 0)
                        <div class="mt-6 p-4 bg-white dark:bg-gray-700 rounded-lg shadow">
                                <h3 class="text-lg font-semibold text-green-600  dark:text-green-400">
                                    LA IDEA QUE MÁS GUSTA:
                                </h3>
                                <p class="text-gray-700 dark:text-gray-200 mt-2">
                                    <strong>{{ $bestIdea->title }}</strong><br>
                                    {{ $bestIdea->description }}
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                                    👍 Likes: {{ $bestIdea->likes }}
                                </p>
                        </div>
                    @else
                        <p class="mt-6 text-red-700 dark:text-red-400">
                            Aún no tienes ideas con likes.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
{{-- 
<div class="mt-6">
    <a href="{{ route('maquina') }}" 
    class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
    🧃 Ir a la Máquina Expendedora
</a>
</div>
</div>
<div>
--}}

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('maquina') }}" 
                        class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                        🧃 Ir a la Máquina Expendedora
                    </a>
            </div>
        </div>
    </div>
</div>
<div>
</x-app-layout>


