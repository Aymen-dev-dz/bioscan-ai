<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Sample;

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
        $samples = Sample::where('user_id', $user->id)->with(['species', 'result'])->orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('samples'));
    }

    public function verifyQr($qr_code)
    {
        $sample = Sample::where('qr_code', $qr_code)
            ->with(['species', 'result', 'user'])
            ->firstOrFail();

        return view('verify', compact('sample'));
    }
}
