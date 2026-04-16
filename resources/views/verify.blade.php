<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vérification BioScan AI #{{ $sample->id }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            outfit: ['Outfit', 'sans-serif'],
                            inter: ['Inter', 'sans-serif'],
                        },
                        colors: {
                            bio: { 50: '#eefbf3', 100: '#d6f5e3', 200: '#b0e9ca', 300: '#7dd7aa', 400: '#48bd85', 500: '#26a069', 600: '#188054', 700: '#146645', 800: '#125138', 900: '#10432f' }
                        }
                    }
                }
            }
        </script>
        <style>
            .hero-bg {
                background: linear-gradient(135deg, #0a1628 0%, #0d2040 40%, #0f2d4a 70%, #0a1e35 100%);
            }
            .glass {
                background: rgba(255,255,255,0.03);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255,255,255,0.08);
            }
        </style>
    </head>
    <body class="font-inter antialiased hero-bg min-h-screen flex items-center justify-center p-6">
        <div class="max-w-lg w-full">
            <!-- Header Logo -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-bio-400 to-indigo-500 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                </div>
                <h1 class="mt-4 font-outfit font-black text-2xl text-white">BioScan <span class="text-bio-400">AI</span></h1>
                <div class="mt-1 inline-block px-3 py-1 bg-bio-500/20 rounded-full">
                    <p class="text-bio-400 text-[10px] uppercase tracking-[0.2em] font-bold">Vérification Certifiée</p>
                </div>
            </div>

            <!-- Content Card -->
            <div class="glass rounded-[2.5rem] p-8 shadow-2xl relative overflow-hidden">
                <!-- Status Badge -->
                <div class="flex justify-between items-start mb-10">
                    <div>
                        <p class="text-white/40 text-xs font-bold uppercase tracking-wider mb-1">ID Échantillon</p>
                        <h2 class="text-white font-outfit font-bold text-2xl">#{{ $sample->id }}</h2>
                    </div>
                    @php
                        $statusColors = [
                            'Pending' => 'bg-amber-500/20 text-amber-400 border-amber-500/30',
                            'Received' => 'bg-blue-500/20 text-blue-400 border-blue-500/30',
                            'Processing' => 'bg-purple-500/20 text-purple-400 border-purple-500/30',
                            'Completed' => 'bg-bio-500/20 text-bio-400 border-bio-500/30',
                        ];
                        $statusLabel = [
                            'Pending' => 'En attente',
                            'Received' => 'Reçu',
                            'Processing' => 'Analyse en cours',
                            'Completed' => 'Terminé',
                        ];
                    @endphp
                    <div class="px-4 py-1.5 rounded-xl border {{ $statusColors[$sample->status] ?? 'bg-white/10 text-white border-white/20' }} text-xs font-black uppercase tracking-widest">
                        {{ $statusLabel[$sample->status] ?? $sample->status }}
                    </div>
                </div>

                <!-- Info Grid -->
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-white/5 border border-white/5 p-4 rounded-2xl">
                        <p class="text-[10px] text-white/40 font-bold uppercase tracking-widest mb-1">Espèce</p>
                        <p class="text-white font-bold">{{ $sample->species->name }}</p>
                    </div>
                    <div class="bg-white/5 border border-white/5 p-4 rounded-2xl">
                        <p class="text-[10px] text-white/40 font-bold uppercase tracking-widest mb-1">Propriétaire</p>
                        <p class="text-white font-bold">{{ $sample->user->name }}</p>
                    </div>
                    <div class="bg-white/5 border border-white/5 p-4 rounded-2xl">
                        <p class="text-[10px] text-white/40 font-bold uppercase tracking-widest mb-1">Type</p>
                        <p class="text-white font-bold capitalize">{{ $sample->sample_type == 'feather' ? 'Plume' : 'Sang' }}</p>
                    </div>
                    <div class="bg-white/5 border border-white/5 p-4 rounded-2xl">
                        <p class="text-[10px] text-white/40 font-bold uppercase tracking-widest mb-1">Enregistré le</p>
                        <p class="text-white font-bold">{{ $sample->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>

                <!-- Result Area -->
                <div class="pt-8 border-t border-white/10">
                    @if($sample->status === 'Completed' && $sample->result)
                        <div class="text-center py-4 bg-white/5 rounded-3xl border border-white/10">
                            <p class="text-white/40 text-[10px] font-bold uppercase tracking-[0.2em] mb-4">Résultat de l'Analyse</p>
                            @if($sample->result->sex_result == 'Male')
                                <div class="inline-flex w-20 h-20 bg-blue-500 rounded-full items-center justify-center text-white text-3xl shadow-lg shadow-blue-500/20 mb-3">♂</div>
                                <h3 class="text-blue-400 font-outfit font-black text-3xl tracking-widest">MÂLE</h3>
                            @elseif($sample->result->sex_result == 'Female')
                                <div class="inline-flex w-20 h-20 bg-pink-500 rounded-full items-center justify-center text-white text-3xl shadow-lg shadow-pink-500/20 mb-3">♀</div>
                                <h3 class="text-pink-400 font-outfit font-black text-3xl tracking-widest">FEMELLE</h3>
                            @else
                                <div class="inline-flex w-20 h-20 bg-slate-500 rounded-full items-center justify-center text-white text-3xl mb-3">?</div>
                                <h3 class="text-slate-400 font-outfit font-black text-3xl tracking-widest">INCONNU</h3>
                            @endif
                            <div class="mt-4 text-bio-400 text-sm font-bold">Confiance de l'IA : {{ $sample->result->confidence_score }}%</div>
                        </div>
                    @else
                        <div class="text-center py-10 opacity-60">
                            <div class="w-12 h-12 border-2 border-white/20 border-t-bio-400 rounded-full animate-spin mx-auto mb-4"></div>
                            <p class="text-white text-sm font-medium italic">Analyse en cours dans nos laboratoires...</p>
                        </div>
                    @endif
                </div>
                
                <!-- Security Note -->
                <div class="mt-10 flex items-center justify-center gap-2 text-[10px] text-white/30 uppercase tracking-widest font-bold">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    Certifié par BioScan AI Molecular Systems
                </div>
            </div>

            <p class="text-center mt-10 text-white/30 text-[10px] uppercase tracking-widest">
                Scannez pour valider l'authenticité
            </p>
        </div>
    </body>
</html>
