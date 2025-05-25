<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Gestor de Tareas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900 text-black dark:text-white">
    <div class="min-h-screen">
        <!-- NAVBAR -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <!-- Logo -->
                    <div class="flex items-center space-x-4">
                        <div class="bg-red-500 hover:bg-red-600 text-gray px-3 py-1 rounded shadow font-medium">
                            📝 GestorTareas
                        </div>

                        <!-- Links -->
                        <div class="hidden sm:flex space-x-4">
                            <a href="{{ route('dashboard') }}" class="bg-red-500 hover:bg-red-600 text-gray px-3 py-1 rounded shadow font-medium">Dashboard </a>
                            <a href="{{ route('tasks.index') }}" class="bg-red-500 hover:bg-red-600 text-gray px-3 py-1 rounded shadow font-medium">Mis Tareas</a>
                            <a href="{{ route('tasks.create') }}" class="bg-red-500 hover:bg-red-700 text-gray px-3 py-1 rounded shadow font-medium">
                                ✍️ Nueva
                            </a>
                        </div>
                    </div>

                    <!-- Usuario & Logout -->
                    <div class="flex items-center space-x-3">
                        <!-- Nombre del usuario -->
                        <div class="text-black-700 dark:text-gray-200 font-medium hidden sm:block">
                            👤 {{ Auth::user()->name }}
                        </div>

                        <!-- Botón Modo Oscuro -->
                        <button id="toggle-dark" type="button"
                            class="text-xl text-black hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition">
                            🌗
                        </button>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="bg-red-500 hover:bg-red-600 text-black px-3 py-1 rounded shadow font-medium">
                                🚪 Salir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>


        <!-- Contenido de la página -->
        <main class="py-6 px-4 sm:px-6 lg:px-8">
            {{ $slot }}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-3 mx-6" role="alert">
                    <strong class="font-bold">¡Éxito! </strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
        </main>
    </div>
    
    
    <script>
        const toggleDarkBtn = document.getElementById('toggle-dark');
        toggleDarkBtn.addEventListener('click', function(e) {
            e.preventDefault(); // evita que haga submit o recargue la página
            document.documentElement.classList.toggle('dark');

            // Guardar preferencia en localStorage para que persista
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });

        // Al cargar la página, aplicar el tema guardado
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>

</body>
</html>
