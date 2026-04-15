<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sample;
use App\Models\Species;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'samples' => Sample::count(),
            'species' => Species::count(),
            'completed_samples' => Sample::where('status', 'Completed')->count(),
            'pending_samples' => Sample::where('status', 'Pending')->count(),
        ];
        
        $recent_users = User::latest()->take(5)->get();
        $recent_samples = Sample::with(['species', 'user'])->latest()->take(10)->get();

        return view('admin.index', compact('stats', 'recent_users', 'recent_samples'));
    }
}
