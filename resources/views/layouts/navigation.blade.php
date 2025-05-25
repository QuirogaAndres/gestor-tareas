<nav class="bg-white border-b border-gray-200 px-4 py-3 shadow-sm">
    <div class="flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="{{ route('dashboard') }}" class="text-xl font-bold text-blue-600">📋 Gestor de Tareas</a>
            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-500">🏠 Dashboard</a>
            <a href="{{ route('tasks.index') }}" class="text-gray-700 hover:text-blue-500">📄 Tareas</a>
            <a href="{{ route('tasks.create') }}" class="text-gray-700 hover:text-green-500">✍️ Nueva</a>
        </div>

        <div class="flex items-center space-x-4">
            <span class="text-gray-600">👤 {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-500 hover:text-red-700">🚪 Cerrar sesión</button>
            </form>
        </div>
    </div>
</nav>
