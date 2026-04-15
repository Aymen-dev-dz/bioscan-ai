<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.index');
        } elseif ($user->role === 'biologist') {
            return redirect()->route('lab.samples');
        }

        // Default: Client dashboard
        $samples = \App\Models\Sample::where('user_id', $user->id)->with(['species', 'result'])->orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('samples'));
    }
}
