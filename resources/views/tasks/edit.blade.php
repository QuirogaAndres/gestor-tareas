<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar tarea') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
            <strong>Ups... algo salió mal:</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-6">
        <div class="bg-black shadow-md rounded p-6">
            <form action="{{ route('tasks.update', $task) }}" method="POST" class="bg-white p-6 rounded shadow">
                @csrf
                @method('PUT')

                <div class="bg-white shadow-md rounded p-6">
                    <label for="title" class="block text-black-900">Título</label>
                    <input type="text" name="title" id="title" value="{{ $task->title }}" class="w-full border border-gray-300 rounded p-2" required>
                </div>

                <div class="bg-white shadow-md rounded p-6">
                    <label for="description" class="block text-black-900">Descripción</label>
                    <textarea name="description" id="description" class="w-full border border-gray-300 rounded p-2" required>{{ $task->description }}</textarea>
                </div>

                <button type="submit" class="bg-red-500 hover:bg-red-600 text-black px-3 py-1 rounded shadow font-medium">Actualizar</button>
            </form>
        </div>
    </div>
</x-app-layout>
