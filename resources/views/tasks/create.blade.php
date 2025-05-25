<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-black dark:text-white">
            ✍️ Crear nueva tarea
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        {{-- Errores --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <strong>Ups... algo salió mal:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <div class="mb-5">
                <label for="title" class="block text-gray-800 dark:text-gray-200 font-semibold mb-2">
                    Título <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                    required
                    value="{{ old('title') }}"
                >
            </div>

            <div class="mb-6">
                <label for="description" class="block text-gray-800 dark:text-gray-200 font-semibold mb-2">
                    Descripción
                </label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="4" 
                    class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                >{{ old('description') }}</textarea>
            </div>

            <div class="text-right">
                <button 
                    type="submit" 
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-6 py-2 rounded-md 
                           shadow-md transition-colors duration-300"
                >
                    💾 Guardar tarea
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
