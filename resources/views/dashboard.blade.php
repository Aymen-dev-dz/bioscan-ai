<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-black text-3xl text-slate-900 leading-tight">
            {{ __('Mes Échantillons') }}
        </h2>
        <p class="text-slate-500 text-sm mt-1">Gérez vos analyses génétiques et consultez vos certificats.</p>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 bg-green-50/80 backdrop-blur-sm border border-green-200 text-green-800 px-4 py-4 rounded-xl shadow-sm flex items-center gap-3 animate-fade-in-up">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <div class="flex justify-between items-end mb-8">
                <div>
                    <h3 class="text-xl font-bold text-slate-800 font-outfit">Suivi des Analyses</h3>
                    <p class="text-sm text-slate-500">Aperçu en temps réel de tous vos prélèvements envoyés au labo.</p>
                </div>
                <a href="{{ route('client.submit') }}" class="group relative inline-flex items-center justify-center px-6 py-2.5 font-bold text-white transition-all duration-200 bg-indigo-600 font-pj rounded-xl hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 shadow-md hover:shadow-indigo-500/30">
                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Nouveau Prélèvement
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-xl shadow-slate-200/50 sm:rounded-3xl border border-slate-100">
                @if(isset($samples) && $samples->count() > 0)
                    <table class="min-w-full divide-y divide-slate-100">
                        <thead class="bg-slate-50/80">
                            <tr>
                                <th class="px-6 py-5 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">ID / Date</th>
                                <th class="px-6 py-5 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Espèce (Species)</th>
                                <th class="px-6 py-5 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-5 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Progression labo</th>
                                <th class="px-6 py-5 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Résultat Final</th>
                                <th class="px-6 py-5 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @foreach($samples as $sample)
                                <tr class="hover:bg-slate-50/60 transition-colors group">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-slate-900 font-mono bg-slate-100 px-2 py-0.5 rounded inline-flex">#{{ $sample->id }}</div>
                                        <div class="text-xs text-slate-500 mt-1">{{ $sample->created_at->format('d M, Y') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-slate-900">{{ $sample->species->name }}</div>
                                        <div class="text-xs text-slate-400 italic">{{ $sample->species->family }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                        @if($sample->sample_type == 'feather')
                                            <span class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-sky-50 text-sky-700 border border-sky-100">
                                                🪶 Plume
                                            </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-rose-50 text-rose-700 border border-rose-100">
                                                🩸 Sang
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $color = 'slate';
                                            $icon = 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z';
                                            $label = 'En Attente';
                                            if($sample->status == 'Received') { $color = 'blue'; $icon = 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4'; $label = 'Reçu Labo'; }
                                            if($sample->status == 'Processing') { $color = 'amber'; $icon = 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'; $label = 'Analyse PCR'; }
                                            if($sample->status == 'Completed') { $color = 'emerald'; $icon = 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'; $label = 'Validé'; }
                                        @endphp
                                        <span class="px-3 py-1.5 inline-flex items-center gap-1.5 text-xs font-bold rounded-full bg-{{ $color }}-50 text-{{ $color }}-700 border border-{{ $color }}-200">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path></svg>
                                            {{ $label }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900 font-bold">
                                        @if($sample->status === 'Completed' && $sample->result)
                                            @if(!$sample->is_paid)
                                                <span class="text-orange-500 flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                                    Paiement requis
                                                </span>
                                            @else
                                                @if($sample->result->sex_result == 'Male')
                                                    <span class="text-blue-600 bg-blue-50 px-3 py-1 rounded-full border border-blue-100 flex items-center gap-1 w-max">
                                                        <span class="text-lg">♂</span> Mâle
                                                    </span>
                                                @elseif($sample->result->sex_result == 'Female')
                                                    <span class="text-pink-600 bg-pink-50 px-3 py-1 rounded-full border border-pink-100 flex items-center gap-1 w-max">
                                                        <span class="text-lg">♀</span> Femelle
                                                    </span>
                                                @else
                                                    <span class="text-slate-500">Inconnu</span>
                                                @endif
                                            @endif
                                        @else
                                            <span class="text-slate-300">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('client.sample.show', $sample->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold bg-indigo-50 px-4 py-2 rounded-lg hover:bg-indigo-100 transition inline-flex items-center gap-2 group-hover:shadow-sm">
                                            Détails
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-16 text-center text-slate-500 flex flex-col items-center">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                            <svg class="h-10 w-10 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <h3 class="mt-2 text-lg font-bold text-slate-900 font-outfit">Aucun échantillon envoyé</h3>
                        <p class="mt-1 text-sm text-slate-500 max-w-sm">Commencez par soumettre un nouvel échantillon biologique pour que nous puissions analyser l'ADN.</p>
                        <div class="mt-8">
                            <a href="{{ route('client.submit') }}" class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-sm font-bold rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 transition shadow-indigo-600/30">
                                Soumettre mon premier prélèvement
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            
        </div>
    </div>
</x-app-layout>
