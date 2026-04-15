<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Laboratoire : Échantillons Entrants') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6 flex space-x-4">
                <a href="{{ route('lab.samples') }}" class="px-4 py-2 bg-white border rounded-lg shadow-sm font-semibold {{ !request('status') ? 'bg-blue-50 text-blue-700 border-blue-200' : 'text-gray-600' }}">Tous</a>
                <a href="{{ route('lab.samples', ['status' => 'Pending']) }}" class="px-4 py-2 bg-white border rounded-lg shadow-sm font-semibold {{ request('status') == 'Pending' ? 'bg-blue-50 text-blue-700 border-blue-200' : 'text-gray-600' }}">En Attente</a>
                <a href="{{ route('lab.samples', ['status' => 'Received']) }}" class="px-4 py-2 bg-white border rounded-lg shadow-sm font-semibold {{ request('status') == 'Received' ? 'bg-blue-50 text-blue-700 border-blue-200' : 'text-gray-600' }}">Reçus</a>
                <a href="{{ route('lab.samples', ['status' => 'Processing']) }}" class="px-4 py-2 bg-white border rounded-lg shadow-sm font-semibold {{ request('status') == 'Processing' ? 'bg-blue-50 text-blue-700 border-blue-200' : 'text-gray-600' }}">En Traitement</a>
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
</x-app-layout>
