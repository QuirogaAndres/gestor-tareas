<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalTasks = $user->tasks()->count();
        $completedTasks = $user->tasks()->where('completed', true)->count();
        $pendingTasks = $user->tasks()->where('completed', false)->count();
        $tasksToday = $user->tasks()->whereDate('created_at', now()->toDateString())->count();

        return view('dashboard', compact('totalTasks', 'completedTasks', 'pendingTasks', 'tasksToday'));
    }
}
