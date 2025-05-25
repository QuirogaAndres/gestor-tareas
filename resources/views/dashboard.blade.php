<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white-800 dark:text-white">
            📊 Dashboard
        </h2>
    </x-slot>

    <div class="py-6 px-6 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 animate-fade-in transition-transform transform hover:scale-105">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-300">📋 Tareas totales</h3>
                <p class="text-3xl font-bold text-blue-600 dark:text-blue-400 mt-2">{{ $totalTasks }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 animate-fade-in transition-transform transform hover:scale-105">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-300">✅ Completadas</h3>
                <p class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">{{ $completedTasks }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 animate-fade-in transition-transform transform hover:scale-105">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-300">⏳ Pendientes</h3>
                <p class="text-3xl font-bold text-yellow-500 dark:text-yellow-300 mt-2">{{ $pendingTasks }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 animate-fade-in transition-transform transform hover:scale-105">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-300">🕒 Hoy creadas</h3>
                <p class="text-3xl font-bold text-indigo-500 dark:text-indigo-400 mt-2">{{ $tasksToday }}</p>
            </div>

        </div>
    </div>
</x-app-layout>
