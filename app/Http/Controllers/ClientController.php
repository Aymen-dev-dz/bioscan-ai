<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;
use App\Models\Species;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function submitForm()
    {
        $species = Species::all();
        return view('client.submit', compact('species'));
    }

    public function storeSample(Request $request)
    {
        $request->validate([
            'species_id' => 'required|exists:species,id',
            'sample_type' => 'required|in:feather,blood',
            'quantity' => 'required|integer|min:1',
            'pre_scan_image' => 'nullable|image|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('pre_scan_image')) {
            $imagePath = $request->file('pre_scan_image')->store('pre_scans', 'public');
        }

        $sample = Sample::create([
            'user_id' => Auth::id(),
            'species_id' => $request->species_id,
            'sample_type' => $request->sample_type,
            'quantity' => $request->quantity,
            'notes' => $request->notes,
            'qr_code' => Str::uuid()->toString(),
            'status' => 'Pending',
            'pre_scan_image_path' => $imagePath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Sample submitted successfully. Please print the QR code and attach it to your sample.');
    }

    public function showSample($id)
    {
        $sample = Sample::where('user_id', Auth::id())->with(['species', 'result'])->findOrFail($id);
        return view('client.sample_show', compact('sample'));
    }

    public function simulatePayment($id)
    {
        $sample = Sample::where('user_id', Auth::id())->findOrFail($id);
        $sample->update(['is_paid' => true]);
        return back()->with('success', 'Payment successful. You can now view the full results.');
    }

    public function instructionsPage()
    {
        return view('client.instructions');
    }

    public function printReport($id)
    {
        $sample = Sample::where('user_id', Auth::id())->with(['species', 'result', 'user', 'result.biologist'])->findOrFail($id);
        
        if (!$sample->is_paid || $sample->status !== 'Completed') {
            abort(403, 'Report not available or payment required.');
        }

        return view('client.pdf', compact('sample'));
    }
}
