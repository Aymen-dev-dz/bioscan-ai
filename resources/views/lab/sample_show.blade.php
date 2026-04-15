<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-outfit font-black text-3xl text-slate-900 leading-tight">
                Console Labo : Échantillon <span class="text-indigo-600">#{{ $sample->id }}</span>
            </h2>
            <a href="{{ route('lab.samples') }}" class="text-sm font-semibold text-slate-500 hover:text-indigo-600 transition flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Retour
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 bg-green-50 backdrop-blur-sm border border-green-200 text-green-800 px-4 py-4 rounded-xl shadow-sm flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Info & Status Column -->
                <div class="space-y-6">
                    <div class="bg-white shadow-xl shadow-slate-200/50 sm:rounded-3xl p-6 border border-slate-100 border-t-4 border-t-indigo-500">
                        <h3 class="text-lg font-bold font-outfit text-slate-800 mb-4 pb-2 border-b border-slate-100">Métadonnées</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Espèce / Famille</p>
                                <p class="text-sm font-bold text-slate-900">{{ $sample->species->name }}</p>
                                <p class="text-xs text-slate-500">{{ $sample->species->family }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Type Prélèvement</p>
                                <p class="text-sm font-medium text-slate-800 capitalize">{{ $sample->sample_type }} x{{ $sample->quantity }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Jeu d'Amorces PCR</p>
                                <p class="text-sm font-mono font-bold text-indigo-700 bg-indigo-50 px-2 py-0.5 rounded inline-block">{{ $sample->species->primer_set ?? 'Non défini' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Localisation Espèce</p>
                                @if($sample->species->is_local)
                                    <span class="inline-flex text-xs font-bold px-2 py-1 bg-green-100 text-green-700 rounded-lg">📍 Faune Locale</span>
                                @else
                                    <span class="inline-flex text-xs font-bold px-2 py-1 bg-slate-100 text-slate-700 rounded-lg">Exotique</span>
                                @endif
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Client (Éleveur)</p>
                                <p class="text-sm font-medium text-slate-800">{{ $sample->user->name }}</p>
                            </div>
                            @if($sample->notes)
                            <div class="bg-amber-50 p-3 rounded-lg border border-amber-100 mt-2 md:col-span-2">
                                <p class="text-xs text-amber-600 font-bold uppercase mb-1 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Note Client
                                </p>
                                <p class="text-xs font-medium text-amber-900">{{ $sample->notes }}</p>
                            </div>
                            @endif

                            @if($sample->pre_scan_image_path)
                            <div class="mt-4 md:col-span-2 border border-slate-200 rounded-xl overflow-hidden bg-white shadow-sm">
                                <div class="bg-indigo-50 px-4 py-2 border-b border-slate-200">
                                    <p class="text-xs font-bold text-indigo-700 uppercase tracking-widest flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path></svg>
                                        Cliché Pré-Envoi du Client
                                    </p>
                                </div>
                                <div class="p-2">
                                    <a href="{{ Storage::url($sample->pre_scan_image_path) }}" target="_blank">
                                        <img src="{{ Storage::url($sample->pre_scan_image_path) }}" alt="Photo Client" class="w-full h-auto rounded-lg hover:opacity-90 transition">
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>

                        <form action="{{ route('lab.sample.status', $sample->id) }}" method="POST" class="mt-6 border-t border-slate-100 pt-4 bg-slate-50 -mx-6 -mb-6 p-6 rounded-b-3xl">
                            @csrf
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Cycle Labo (Statut)</label>
                            <div class="flex gap-2">
                                <select name="status" class="block w-full border-slate-200 bg-white focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm sm:text-sm">
                                    <option value="Pending" {{ $sample->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Received" {{ $sample->status == 'Received' ? 'selected' : '' }}>Received</option>
                                    <option value="Processing" {{ $sample->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="Completed" {{ $sample->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                                <button type="submit" class="bg-slate-900 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg shadow-sm transition">Sauver</button>
                            </div>
                        </form>
                    </div>

                    <!-- Simulate AI module Upload -->
                    <div class="bg-gradient-to-br from-indigo-900 to-slate-900 shadow-xl sm:rounded-3xl p-6 text-white text-center relative overflow-hidden group">
                        <div class="absolute right-0 top-0 w-32 h-32 bg-indigo-500/20 rounded-full blur-2xl group-hover:bg-indigo-500/40 transition duration-500"></div>
                        <h3 class="font-black font-outfit text-lg mb-2 relative z-10">Module IA (BioScan Visio)</h3>
                        <p class="text-xs text-indigo-200/80 mb-4 relative z-10 leading-relaxed">
                            L'upload de l'image de gel d'électrophorèse dans le formulaire d'analyse déclenchera automatiquement le parsing de notre modèle de machine learning.
                        </p>
                        <div class="bg-white/10 p-4 rounded-2xl backdrop-blur-sm border border-white/20">
                            <svg class="h-8 w-8 text-indigo-300 mx-auto mb-2 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                            </svg>
                            <span class="text-xs font-bold uppercase tracking-widest text-indigo-200">Prêt à analyser</span>
                        </div>
                    </div>

                    @if(optional($sample->result)->quality_check == 'Bad' || optional($sample->result)->sex_result == 'Inconclusive' || (optional($sample->result)->confidence_score > 0 && optional($sample->result)->confidence_score < 70))
                        <div class="bg-rose-50 border border-rose-200 p-5 rounded-2xl text-rose-800 shadow-sm animate-pulse-slow">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-6 h-6 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                <h4 class="font-bold">Alerte IA Sanitaire</h4>
                            </div>
                            <p class="text-sm font-medium">La qualité biochimique ou la fiabilité IA est insuffisante. Veuillez précipiter un nouvel échantillon ou relancer l'amplification PCR. Un test sanitaire est peut-être requis.</p>
                            <button class="mt-3 bg-rose-600 hover:bg-rose-700 text-white text-sm font-bold px-4 py-2 rounded-lg w-full transition">Demander un nouveau prélèvement</button>
                        </div>
                    @endif
                </div>

                <!-- Analysis Form Column -->
                <div class="lg:col-span-2">
                    <div class="bg-white shadow-xl shadow-slate-200/50 sm:rounded-3xl p-8 border border-slate-100 relative">
                        <h3 class="text-2xl font-bold font-outfit text-slate-800 mb-6 pb-4 border-b border-slate-100 flex items-center gap-3">
                            <span class="bg-indigo-50 text-indigo-600 p-2 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                            </span>
                            Édition du Rapport d'Analyse (PCR / ADN)
                        </h3>
                        
                        <form action="{{ route('lab.sample.analyze', $sample->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- Electrophoresis Image Upload -->
                            <div class="mb-8">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Cliché Gel Électrophorèse (Optionnel)</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-2xl hover:border-indigo-400 hover:bg-indigo-50/50 transition">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-slate-600 justify-center mt-2">
                                            <label for="gel_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Télécharger un fichier</span>
                                                <input id="gel_image" name="gel_image" type="file" class="sr-only" accept="image/*">
                                            </label>
                                            <p class="pl-1">ou glisser-déposer</p>
                                        </div>
                                        <p class="text-xs text-slate-500">PNG, JPG, GIF jusqu'à 2MB</p>
                                    </div>
                                </div>
                                @if(optional($sample->result)->gel_image_path)
                                    <p class="text-xs font-bold text-emerald-600 mt-2 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Une image est déjà stockée pour ce prélèvement.
                                    </p>
                                @endif
                                @error('gel_image') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Conclusion Sexe</label>
                                    <select name="sex_result" required class="block w-full border-slate-200 bg-slate-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm transition">
                                        <option value="">Sélectionner...</option>
                                        <option value="Male" {{ optional($sample->result)->sex_result == 'Male' ? 'selected' : '' }}>Mâle</option>
                                        <option value="Female" {{ optional($sample->result)->sex_result == 'Female' ? 'selected' : '' }}>Femelle</option>
                                        <option value="Inconclusive" {{ optional($sample->result)->sex_result == 'Inconclusive' ? 'selected' : '' }}>Non Concluant (Erreur/Relancer)</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Précision IA / Labo (%)</label>
                                    <input type="number" name="confidence_score" min="0" max="100" value="{{ optional($sample->result)->confidence_score ?? 99 }}" required class="block w-full border-slate-200 bg-slate-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm transition">
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Qualité Biochimique Constatée</label>
                                    <div class="flex gap-6">
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="quality_check" value="Good" {{ optional($sample->result)->quality_check == 'Good' || !optional($sample->result)->quality_check ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-slate-300">
                                            <span class="text-sm font-medium text-slate-700">Exploitable (Good)</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="quality_check" value="Bad" {{ optional($sample->result)->quality_check == 'Bad' ? 'checked' : '' }} class="h-4 w-4 text-rose-600 focus:ring-rose-500 border-slate-300">
                                            <span class="text-sm font-medium text-slate-700">Dégradé / Peu exploitable (Bad)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-8">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Appréciation du Biologiste (Publique) <span class="text-slate-400 font-normal text-xs ml-1">Sera imprimée sur le certificat final.</span></label>
                                <textarea name="comment" rows="4" class="block w-full border-slate-200 bg-slate-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm transition resize-none">{{ optional($sample->result)->comment }}</textarea>
                            </div>

                            <div class="flex items-center justify-between mt-8 pt-6 border-t border-slate-100 bg-slate-50 -mx-8 -mb-8 p-8 rounded-b-3xl">
                                <span class="text-xs text-slate-400 max-w-xs leading-relaxed">L'enregistrement de cette analyse bloquera sa modification par d'autres utilisateurs et l'enverra au client.</span>
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-indigo-600/30 flex items-center transition transform hover:-translate-y-0.5">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Valider Officiellement
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
