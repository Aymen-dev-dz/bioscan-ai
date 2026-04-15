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
                <!-- Stat Cards -->
                <div class="bg-white overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 sm:rounded-2xl border border-slate-100 p-6 flex items-center relative group">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-blue-500/5 rounded-full blur-2xl group-hover:bg-blue-500/10 transition"></div>
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-2xl text-blue-600 mr-5 shadow-inner">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="mb-1 text-xs font-bold text-slate-400 uppercase tracking-widest">Utilisateurs</p>
                        <p class="text-4xl font-black font-outfit text-slate-800">{{ $stats['users'] }}</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 sm:rounded-2xl border border-slate-100 p-6 flex items-center relative group">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-indigo-500/5 rounded-full blur-2xl group-hover:bg-indigo-500/10 transition"></div>
                    <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 p-4 rounded-2xl text-indigo-600 mr-5 shadow-inner">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="mb-1 text-xs font-bold text-slate-400 uppercase tracking-widest">Volume Global</p>
                        <p class="text-4xl font-black font-outfit text-slate-800">{{ $stats['samples'] }}</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 sm:rounded-2xl border border-slate-100 p-6 flex items-center relative group">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-emerald-500/5 rounded-full blur-2xl group-hover:bg-emerald-500/10 transition"></div>
                    <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 p-4 rounded-2xl text-emerald-600 mr-5 shadow-inner">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="mb-1 text-xs font-bold text-slate-400 uppercase tracking-widest">Traités (Succès)</p>
                        <p class="text-4xl font-black font-outfit text-slate-800">{{ $stats['completed_samples'] }}</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 sm:rounded-2xl border border-slate-100 p-6 flex items-center relative group">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-amber-500/5 rounded-full blur-2xl group-hover:bg-amber-500/10 transition"></div>
                    <div class="bg-gradient-to-br from-amber-50 to-amber-100 p-4 rounded-2xl text-amber-600 mr-5 shadow-inner">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="mb-1 text-xs font-bold text-slate-400 uppercase tracking-widest">File d'attente</p>
                        <p class="text-4xl font-black font-outfit text-slate-800">{{ $stats['pending_samples'] }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Users Box -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-slate-100 relative">
                    <div class="p-8 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <div class="flex items-center gap-3">
                            <div class="bg-blue-100 p-2 rounded-xl text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <h3 class="font-bold font-outfit text-xl text-slate-800">Derniers Utilisateurs</h3>
                        </div>
                    </div>
                    <div class="p-0">
                        <ul class="divide-y divide-slate-100">
                            @foreach($recent_users as $u)
                            <li class="p-6 flex justify-between items-center hover:bg-slate-50 transition">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-600 uppercase">
                                        {{ substr($u->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900">{{ $u->name }}</p>
                                        <p class="text-xs text-slate-500">{{ $u->email }}</p>
                                    </div>
                                </div>
                                <div>
                                    @php
                                        $rCol = 'slate';
                                        if($u->role == 'admin') $rCol = 'purple';
                                        if($u->role == 'biologist') $rCol = 'cyan';
                                    @endphp
                                    <span class="px-3 py-1 inline-flex text-xs font-bold rounded-full bg-{{$rCol}}-100 text-{{$rCol}}-700 uppercase tracking-wider">{{ $u->role }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-slate-100 relative">
                    <div class="p-8 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <div class="flex items-center gap-3">
                            <div class="bg-indigo-100 p-2 rounded-xl text-indigo-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                            </div>
                            <h3 class="font-bold font-outfit text-xl text-slate-800">Flux Labo Actuel</h3>
                        </div>
                    </div>
                    <div class="p-0">
                        <ul class="divide-y divide-slate-100">
                            @foreach($recent_samples as $s)
                            <li class="p-6 flex justify-between items-center hover:bg-slate-50 transition">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center font-mono font-bold text-slate-500 text-xs">
                                        {{ substr($s->qr_code, 0, 4) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900">{{ $s->user->name }}</p>
                                        <p class="text-xs text-slate-500">{{ $s->species->name }} • {{ ucfirst($s->sample_type) }}</p>
                                    </div>
                                </div>
                                <div>
                                    @php
                                        $color = 'slate';
                                        if($s->status == 'Received') $color = 'blue';
                                        if($s->status == 'Processing') $color = 'amber';
                                        if($s->status == 'Completed') $color = 'emerald';
                                    @endphp
                                    <span class="px-3 py-1 inline-flex text-xs font-bold rounded-lg bg-{{ $color }}-50 text-{{ $color }}-700 border border-{{ $color }}-200">{{ $s->status }}</span>
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
