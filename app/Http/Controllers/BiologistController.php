<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BiologistController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $query = Sample::with('species');
        
        if ($status) {
            $query->where('status', $status);
        }
        
        $samples = $query->orderBy('created_at', 'desc')->get();
        return view('lab.samples', compact('samples'));
    }

    public function scanQr(Request $request)
    {
        // If a code is submitted manually or via a scanner
        $code = $request->input('qr_code');
        if ($code) {
            $sample = Sample::where('qr_code', $code)->first();
            if ($sample) {
                return redirect()->route('lab.sample.show', $sample->id)->with('success', 'Échantillon localisé via QR Code.');
            }
            return back()->with('error', 'Aucun échantillon trouvé avec ce QR Code ('.$code.').');
        }
        return view('lab.scan');
    }

    public function showSample($id)
    {
        $sample = Sample::with(['species', 'user', 'result'])->findOrFail($id);
        return view('lab.sample_show', compact('sample'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:Pending,Received,Processing,Completed']);
        $sample = Sample::findOrFail($id);
        $sample->update(['status' => $request->status]);
        
        return back()->with('success', 'Statut mis à jour avec succès.');
    }

    public function submitAnalysis(Request $request, $id)
    {
        $request->validate([
            'sex_result' => 'required|in:Male,Female,Inconclusive',
            'confidence_score' => 'required|integer|min:0|max:100',
            'quality_check' => 'required|in:Good,Bad',
            'comment' => 'nullable|string',
            'gel_image' => 'nullable|image|max:2048' // Max 2MB Image
        ]);

        $sample = Sample::findOrFail($id);
        
        $gelImagePath = optional($sample->result)->gel_image_path;

        if ($request->hasFile('gel_image')) {
            // Delete old if exists
            if ($gelImagePath) {
                Storage::disk('public')->delete($gelImagePath);
            }
            $gelImagePath = $request->file('gel_image')->store('gels', 'public');
        }
        
        $result = Result::updateOrCreate(
            ['sample_id' => $sample->id],
            [
                'biologist_id' => Auth::id(),
                'sex_result' => $request->sex_result,
                'confidence_score' => $request->confidence_score,
                'quality_check' => $request->quality_check,
                'comment' => $request->comment,
                'gel_image_path' => $gelImagePath,
                'status' => 'validated'
            ]
        );

        $sample->update(['status' => 'Completed']);

        return back()->with('success', 'Analyse sauvegardée. L\'échantillon est marqué comme complété.');
    }
}
