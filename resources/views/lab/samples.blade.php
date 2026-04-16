<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Laboratoire : Échantillons Entrants') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                    <div class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Total</div>
                    <div class="text-2xl font-black text-slate-900">{{ $stats['total'] }}</div>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 border-l-4 border-l-slate-400">
                    <div class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">En Attente</div>
                    <div class="text-2xl font-black text-slate-900">{{ $stats['pending'] }}</div>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 border-l-4 border-l-blue-400">
                    <div class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Reçus</div>
                    <div class="text-2xl font-black text-slate-900">{{ $stats['received'] }}</div>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 border-l-4 border-l-amber-400">
                    <div class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Traitement</div>
                    <div class="text-2xl font-black text-slate-900">{{ $stats['processing'] }}</div>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 border-l-4 border-l-emerald-400">
                    <div class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Validés</div>
                    <div class="text-2xl font-black text-slate-900">{{ $stats['completed'] }}</div>
                </div>
            </div>

            <div class="mb-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex space-x-2 overflow-x-auto pb-2 w-full md:w-auto">
                    <a href="{{ route('lab.samples') }}" class="px-4 py-2 bg-white border rounded-xl shadow-sm text-sm font-bold {{ !request('status') ? 'bg-indigo-50 text-indigo-700 border-indigo-200' : 'text-slate-600 border-slate-100' }}">Tous</a>
                    <a href="{{ route('lab.samples', ['status' => 'Pending']) }}" class="px-4 py-2 bg-white border rounded-xl shadow-sm text-sm font-bold {{ request('status') == 'Pending' ? 'bg-indigo-50 text-indigo-700 border-indigo-200' : 'text-slate-600 border-slate-100' }}">En Attente</a>
                    <a href="{{ route('lab.samples', ['status' => 'Received']) }}" class="px-4 py-2 bg-white border rounded-xl shadow-sm text-sm font-bold {{ request('status') == 'Received' ? 'bg-indigo-50 text-indigo-700 border-indigo-200' : 'text-slate-600 border-slate-100' }}">Reçus</a>
                    <a href="{{ route('lab.samples', ['status' => 'Processing']) }}" class="px-4 py-2 bg-white border rounded-xl shadow-sm text-sm font-bold {{ request('status') == 'Processing' ? 'bg-indigo-50 text-indigo-700 border-indigo-200' : 'text-slate-600 border-slate-100' }}">En Traitement</a>
                </div>

                <div class="relative w-full md:w-80">
                    <input type="text" id="labSearch" placeholder="Rechercher #QR, Espèce ou Client..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 shadow-sm transition">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                @if(isset($samples) && $samples->count() > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-indigo-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-indigo-900 uppercase tracking-wider">ID QR</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-indigo-900 uppercase tracking-wider">Espèce</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-indigo-900 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-indigo-900 uppercase tracking-wider">Date Soumission</th>
                                <th class="px-6 py-4 text-right text-xs font-bold text-indigo-900 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($samples as $sample)
                                <tr class="hover:bg-indigo-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-xs font-mono font-bold text-indigo-600 bg-indigo-100 px-2 py-1 rounded inline-block">{{ substr($sample->qr_code, 0, 8) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $sample->species->name }}</div>
                                        <div class="text-xs text-gray-500">{{ ucfirst($sample->sample_type) }} x{{ $sample->quantity }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $color = 'gray';
                                            if($sample->status == 'Received') $color = 'blue';
                                            if($sample->status == 'Processing') $color = 'orange';
                                            if($sample->status == 'Completed') $color = 'green';
                                        @endphp
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $color }}-100 text-{{ $color }}-800">
                                            {{ $sample->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $sample->created_at->diffForHumans() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('lab.sample.show', $sample->id) }}" class="text-white bg-indigo-600 hover:bg-indigo-700 font-semibold px-4 py-2 rounded-lg shadow-sm transition">Traiter</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-10 text-center text-gray-500">
                        Aucun échantillon ne correspond à ce statut.
                    </div>
                @endif
            </div>
            
        </div>
    </div>

    <script>
        document.getElementById('labSearch').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
    </script>
</x-app-layout>
