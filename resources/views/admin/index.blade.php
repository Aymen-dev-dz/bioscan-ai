<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-black text-3xl text-slate-900 leading-tight">
            {{ __('Panneau d\'Administration Avancé') }}
        </h2>
        <p class="text-slate-500 text-sm mt-1">Supervision globale, métriques de la plateforme et gestion des utilisateurs.</p>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Revenue Card -->
                <div class="bg-indigo-900 overflow-hidden shadow-xl sm:rounded-3xl p-6 text-white relative group">
                    <div class="absolute right-0 top-0 w-32 h-32 bg-white/10 rounded-full blur-3xl group-hover:bg-white/20 transition"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/10 rounded-2xl">
                                <svg class="w-6 h-6 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="text-emerald-400 font-bold text-xs bg-emerald-400/10 px-2 py-1 rounded-lg">+{{ $stats['growth'] }}%</span>
                        </div>
                        <p class="mb-1 text-xs font-bold text-indigo-100/60 uppercase tracking-widest">Revenus (Simulés)</p>
                        <p class="text-4xl font-black font-outfit">{{ number_format($stats['revenue'], 2) }} €</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 sm:rounded-2xl border border-slate-200/60 p-6 flex items-center relative group">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-blue-500/5 rounded-full blur-2xl group-hover:bg-blue-500/10 transition"></div>
                    <div class="bg-blue-50 p-4 rounded-2xl text-blue-600 mr-5">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="mb-1 text-xs font-bold text-slate-400 uppercase tracking-widest">Utilisateurs</p>
                        <p class="text-4xl font-black font-outfit text-slate-800">{{ $stats['users'] }}</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 sm:rounded-2xl border border-slate-200/60 p-6 flex items-center relative group">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-indigo-500/5 rounded-full blur-2xl group-hover:bg-indigo-500/10 transition"></div>
                    <div class="bg-indigo-50 p-4 rounded-2xl text-indigo-600 mr-5">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="mb-1 text-xs font-bold text-slate-400 uppercase tracking-widest">Tests ADN</p>
                        <p class="text-4xl font-black font-outfit text-slate-800">{{ $stats['samples'] }}</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 sm:rounded-2xl border border-slate-200/60 p-6 flex items-center relative group">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-emerald-500/5 rounded-full blur-2xl group-hover:bg-emerald-500/10 transition"></div>
                    <div class="bg-emerald-50 p-4 rounded-2xl text-emerald-600 mr-5">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="mb-1 text-xs font-bold text-slate-400 uppercase tracking-widest">Espèces Cataloguées</p>
                        <p class="text-4xl font-black font-outfit text-slate-800">{{ $stats['species'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Detailed Status Breakdown -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach([
                    ['label' => 'En attente', 'count' => $status_dist['pending'], 'color' => 'slate'],
                    ['label' => 'Reçus', 'count' => $status_dist['received'], 'color' => 'blue'],
                    ['label' => 'Traitement', 'count' => $status_dist['processing'], 'color' => 'amber'],
                    ['label' => 'Terminés', 'count' => $status_dist['completed'], 'color' => 'emerald']
                ] as $item)
                <div class="bg-white rounded-2xl border border-slate-100 p-4 flex items-center gap-4 shadow-sm">
                    <div class="w-3 h-12 rounded-full bg-{{ $item['color'] }}-400"></div>
                    <div>
                        <p class="text-[10px] font-black uppercase text-slate-400">{{ $item['label'] }}</p>
                        <p class="text-xl font-black text-slate-800">{{ $item['count'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Users Box -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-[2.5rem] border border-slate-100 relative">
                    <div class="p-8 border-b border-slate-100 flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="bg-blue-100 p-2.5 rounded-2xl text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <h3 class="font-black font-outfit text-xl text-slate-800 italic uppercase italic">Écosystème <span class="text-blue-600">Users</span></h3>
                        </div>
                    </div>
                    <div class="p-0">
                        <ul class="divide-y divide-slate-100">
                            @foreach($recent_users as $u)
                            <li class="p-6 flex justify-between items-center hover:bg-slate-50 transition">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-600 text-lg">
                                        {{ substr($u->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900">{{ $u->name }}</p>
                                        <p class="text-xs text-slate-500 lowercase">{{ $u->email }}</p>
                                    </div>
                                </div>
                                <div>
                                    @php
                                        $rCol = 'slate';
                                        if($u->role == 'admin') $rCol = 'indigo';
                                        if($u->role == 'biologist') $rCol = 'bio';
                                    @endphp
                                    <span class="px-4 py-1.5 inline-flex text-[10px] font-black rounded-full bg-{{$rCol}}-50 text-{{$rCol}}-600 uppercase tracking-widest border border-{{$rCol}}-100">{{ $u->role }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-[2.5rem] border border-slate-100 relative">
                    <div class="p-8 border-b border-slate-100 flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="bg-indigo-100 p-2.5 rounded-2xl text-indigo-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                            </div>
                            <h3 class="font-black font-outfit text-xl text-slate-800 italic uppercase italic">Flux <span class="text-indigo-600">ADN</span> Live</h3>
                        </div>
                    </div>
                    <div class="p-0">
                        <ul class="divide-y divide-slate-100">
                            @foreach($recent_samples as $s)
                            <li class="p-6 flex justify-between items-center hover:bg-slate-50 transition">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-slate-900 border border-slate-800 flex items-center justify-center font-mono font-bold text-white text-[10px]">
                                        #{{ substr($s->qr_code, 0, 4) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900">{{ $s->user->name }}</p>
                                        <p class="text-xs text-slate-500 font-medium">{{ $s->species->name }}</p>
                                    </div>
                                </div>
                                <div>
                                    @php
                                        $color = 'slate';
                                        if($s->status == 'Received') $color = 'blue';
                                        if($s->status == 'Processing') $color = 'amber';
                                        if($s->status == 'Completed') $color = 'emerald';
                                    @endphp
                                    <span class="px-4 py-1.5 inline-flex text-[10px] font-black rounded-lg bg-{{ $color }}-50 text-{{ $color }}-700 border border-{{ $color }}-200 uppercase tracking-widest">{{ $s->status }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
