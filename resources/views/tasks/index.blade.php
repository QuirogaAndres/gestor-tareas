<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-900 dark:text-white">
            📄 Lista de Tareas
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        @if (session('success'))
            <div class="bg-green-100 dark:bg-green-200 border border-green-400 text-green-800 px-4 py-3 rounded relative mb-4 animate-fade-in">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 text-right">
            <a href="{{ route('tasks.create') }}"
               class="bg-green-500 hover:bg-green-600 text-black font-semibold py-2 px-4 rounded shadow transition duration-200 ease-in-out transform hover:scale-105">
               ➕ Nueva Tarea
            </a>
        </div>

        @if ($tasks->isEmpty())
            <div class="text-gray-600 dark:text-gray-300 text-center mt-10">
                No hay tareas aún. ¡Creá la primera! ✨
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($tasks as $task)
                    <div class="bg-white dark:bg-gray-800 dark:border-gray-700 shadow-md rounded-xl p-5 border border-gray-200 transition duration-200 transform hover:scale-[1.01] animate-fade-in">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">{{ $task->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-300">{{ $task->description }}</p>
                        </div>

                        <div class="mt-4">
                            <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full 
                                {{ $task->completed 
                                    ? 'bg-green-200 text-white-800 dark:bg-green-300' 
                                    : 'bg-yellow-100 text-white-800 dark:bg-white-200' }}">
                                {{ $task->completed ? '✅ Completada' : '⏳ Pendiente' }}
                            </span>
                        </div>

                        <div class="mt-5 flex justify-end space-x-2">
                            <a href="{{ route('tasks.edit', $task) }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow text-sm transition duration-200 hover:scale-105">
                               ✏️ Editar
                            </a>

                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('¿Eliminar esta tarea?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow text-sm transition duration-200 hover:scale-105">
                                    🗑️ Eliminar
                                </button>
                            </form>

                            <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button
                                    class="px-3 py-1 text-sm rounded shadow transition duration-200 hover:scale-105
                                        {{ $task->completed 
                                            ? 'bg-green-500 hover:bg-green-600 text-white' 
                                            : 'bg-gray-300 hover:bg-gray-400 text-white-800 dark:bg-white-600 dark:hover:bg-gray-500 dark:text-white' }}">
                                    {{ $task->completed ? '✅ Completada' : '☐ Marcar como hecha' }}
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
