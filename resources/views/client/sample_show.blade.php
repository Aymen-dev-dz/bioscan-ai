<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-outfit font-black text-3xl text-slate-900 leading-tight">
                    Échantillon <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-lg">#{{ $sample->id }}</span>
                </h2>
                <p class="text-slate-500 text-sm mt-1">Détails et rapport d'analyse moléculaire.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-slate-500 hover:text-indigo-600 transition flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Retour
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 bg-green-50/80 backdrop-blur-sm border border-green-200 text-green-800 px-4 py-4 rounded-xl shadow-sm flex items-center gap-3 animate-fade-in-up">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Data Column -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Global Info Box -->
                    <div class="bg-white shadow-xl shadow-slate-200/50 sm:rounded-3xl p-8 border border-slate-100 relative overflow-hidden">
                        
                        <div class="flex items-center gap-3 mb-6 relative z-10">
                            <div class="bg-slate-100 p-2.5 rounded-xl text-slate-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold font-outfit text-slate-800">Spécifications</h3>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 relative z-10">
                            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Espèce</p>
                                <p class="text-base font-bold text-slate-900 leading-tight">{{ $sample->species->name }}</p>
                            </div>
                            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Type prélèv.</p>
                                <p class="text-base font-bold text-slate-900 leading-tight capitalize">{{ $sample->sample_type }} <span class="text-xs text-slate-500 font-normal ml-1">x{{ $sample->quantity }}</span></p>
                            </div>
                            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Enregistrement</p>
                                <p class="text-base font-bold text-slate-900 leading-tight">{{ $sample->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Statut Actuel</p>
                                @php
                                    $color = 'slate';
                                    if($sample->status == 'Received') $color = 'blue';
                                    if($sample->status == 'Processing') $color = 'amber';
                                    if($sample->status == 'Completed') $color = 'emerald';
                                @endphp
                                <span class="inline-flex text-xs font-bold px-2 py-1 bg-{{$color}}-100 text-{{$color}}-700 rounded-lg">
                                    {{ $sample->status }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Result Section -->
                    <div class="bg-white shadow-xl shadow-slate-200/50 sm:rounded-3xl border border-slate-100 relative overflow-hidden group">
                        
                        <!-- AI Decorative Gradient -->
                        <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/5 rounded-full blur-3xl group-hover:bg-indigo-500/10 transition duration-700"></div>

                        <div class="p-8">
                            <div class="flex items-center gap-3 mb-8 relative z-10">
                                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 p-2.5 rounded-xl text-white shadow-md">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                </div>
                                <h3 class="text-xl font-bold font-outfit text-slate-800">Rapport d'Analyse PCR & IA</h3>
                            </div>

                            @if($sample->status === 'Completed' && $sample->result)
                                @if(!$sample->is_paid)
                                    <div class="bg-orange-50 border border-orange-200 p-6 rounded-2xl mb-6 relative z-10">
                                        <div class="flex items-start gap-4">
                                            <div class="bg-orange-100 p-3 rounded-full text-orange-600 shrink-0">
                                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                            </div>
                                            <div>
                                                <h4 class="font-bold text-orange-900 text-lg">Paiement requis</h4>
                                                <p class="text-sm text-orange-800/80 mt-1 mb-4">
                                                    Le profilage ADN est terminé et a été validé ! Acquittez-vous des frais de prestation de 15,00 € pour déverrouiller et consulter les résultats finaux.
                                                </p>
                                                <form action="{{ route('client.sample.pay', $sample->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2.5 px-6 rounded-xl shadow-lg shadow-orange-600/30 transition transform hover:-translate-y-0.5">
                                                        Payer 15,00 € (Simulation)
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center py-6 relative z-10">
                                        @if($sample->result->sex_result == 'Male')
                                            <div class="text-blue-50 text-7xl mb-2 flex justify-center dropshadow-sm">
                                                <div class="w-32 h-32 bg-blue-500 rounded-full flex items-center justify-center text-white shadow-xl shadow-blue-500/30">♂</div>
                                            </div>
                                            <div class="text-3xl font-black font-outfit text-blue-700 tracking-wide">MÂLE</div>
                                        @elseif($sample->result->sex_result == 'Female')
                                            <div class="text-pink-50 text-7xl mb-2 flex justify-center dropshadow-sm">
                                                <div class="w-32 h-32 bg-pink-500 rounded-full flex items-center justify-center text-white shadow-xl shadow-pink-500/30">♀</div>
                                            </div>
                                            <div class="text-3xl font-black font-outfit text-pink-700 tracking-wide">FEMELLE</div>
                                        @else
                                            <div class="w-32 h-32 bg-slate-200 rounded-full flex items-center justify-center text-slate-500 shadow-inner mx-auto mb-4 text-5xl">?</div>
                                            <div class="text-3xl font-black font-outfit text-slate-700 tracking-wide">INCONNU</div>
                                        @endif
                                        
                                        <div class="mt-8 flex justify-center gap-4">
                                            <div class="bg-slate-50 border border-slate-100 px-4 py-2 rounded-xl text-sm">
                                                <span class="block text-xs uppercase tracking-widest text-slate-400 font-bold mb-1">Confiance IA</span>
                                                <span class="font-black text-emerald-600 text-lg">{{ $sample->result->confidence_score }}%</span>
                                            </div>
                                            <div class="bg-slate-50 border border-slate-100 px-4 py-2 rounded-xl text-sm">
                                                <span class="block text-xs uppercase tracking-widest text-slate-400 font-bold mb-1">Qualité Prélèv.</span>
                                                <span class="font-black text-slate-700 text-lg">{{ $sample->result->quality_check == 'Good' ? 'Excellente' : 'Médiocre' }}</span>
                                            </div>
                                        </div>

                                        @if($sample->result->comment)
                                            <div class="mt-8 text-left bg-indigo-50/50 p-6 rounded-2xl border border-indigo-100/50">
                                                <h4 class="text-xs uppercase tracking-widest text-indigo-400 font-bold mb-2">Note du Biologiste</h4>
                                                <p class="italic text-indigo-900/80">"{{ $sample->result->comment }}"</p>
                                            </div>
                                        @endif

                                        <div class="mt-10 border-t border-slate-100 pt-8 flex gap-4 justify-center">
                                            <a href="{{ route('client.sample.pdf', $sample->id) }}" target="_blank" class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 px-8 rounded-xl shadow-xl shadow-slate-900/20 transition transform hover:-translate-y-0.5">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                Télécharger le Certificat Officiel
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="py-16 text-center text-slate-400 relative z-10 flex flex-col items-center">
                                    <div class="relative w-20 h-20 mb-6">
                                        <div class="absolute inset-0 border-4 border-slate-100 rounded-full"></div>
                                        <div class="absolute inset-0 border-4 border-indigo-500 rounded-full border-t-transparent animate-spin"></div>
                                        <svg class="absolute inset-0 m-auto h-8 w-8 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-lg font-bold text-slate-800 font-outfit">En cours de traitement</h4>
                                    <p class="mt-2 text-sm text-slate-500 max-w-sm">Le profilage ADN est actuellement analysé par nos réactifs et validé par l'IA. Vous serez notifié dès que le certificat sera prêt.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- QR Column -->
                <div class="space-y-6">
                    <div class="bg-white shadow-xl shadow-slate-200/50 sm:rounded-3xl p-6 border border-slate-100 text-center relative overflow-hidden">
                        <div class="absolute top-0 inset-x-0 h-2 bg-gradient-to-r from-bio-400 to-indigo-500"></div>
                        <h3 class="font-bold text-slate-800 font-outfit mt-2 mb-1">Étiquette Intelligente</h3>
                        <p class="text-xs text-slate-500 mb-6 px-4">Imprimez ce QR code et scotchez-le sur le sachet zip contenant le prélèvement.</p>
                        
                        <div class="border-2 border-dashed border-slate-200 p-4 inline-block mb-6 rounded-2xl bg-white shadow-sm transition hover:border-indigo-300">
                            <!-- External QR generator with verification URL -->
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data={{ route('verify.qr', $sample->qr_code) }}" alt="QR Code" class="mx-auto block rounded" />
                            <div class="mt-4 bg-slate-100 py-1.5 px-3 rounded-lg text-xs font-mono font-bold text-slate-600 tracking-widest">{{ substr($sample->qr_code, 0, 8) }}</div>
                        </div>

                        <button onclick="window.print()" class="w-full bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-3 px-4 rounded-xl transition flex justify-center items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            Imprimer l'étiquette
                        </button>
                    </div>

                    <!-- Ads / Premium Upsell feature -->
                    <div class="bg-gradient-to-br from-indigo-950 via-slate-900 to-indigo-900 shadow-xl shadow-indigo-900/20 sm:rounded-3xl p-8 text-white relative overflow-hidden group">
                        <!-- BG elements -->
                        <div class="absolute right-0 top-0 w-32 h-32 bg-indigo-500/20 rounded-full blur-2xl group-hover:bg-indigo-500/40 transition duration-500"></div>
                        <div class="absolute left-0 bottom-0 w-24 h-24 bg-purple-500/20 rounded-full blur-xl"></div>
                        
                        <div class="relative z-10">
                            <div class="flex items-center gap-2 mb-3">
                                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                <h3 class="font-black font-outfit text-xl tracking-tight">BioScan PRO <span class="bg-indigo-500/30 text-indigo-300 text-[10px] px-2 py-0.5 rounded-full uppercase tracking-widest align-middle ml-1">Premium</span></h3>
                            </div>
                            <p class="text-sm text-indigo-200/80 mb-6 leading-relaxed">
                                Optimisez vos élevages. Obtenez des recommandations de croisements génétiques et un bilan santé prédictif IA exclusif.
                            </p>
                            <button class="bg-white/10 hover:bg-white text-white hover:text-indigo-900 border border-white/20 font-bold py-2.5 px-4 rounded-xl text-sm w-full transition-all flex items-center justify-center gap-2 backdrop-blur-sm">
                                Découvrir les avantages
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
