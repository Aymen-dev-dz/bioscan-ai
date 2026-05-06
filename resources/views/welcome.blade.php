<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenDer Lab — Sexage Moléculaire & Détection Pathogènes</title>
    <meta name="description" content="Plateforme de sexage moléculaire ADN pour oiseaux et espèces monomorphes. Analyse PCR, IA électrophorèse, rapport certifié en 24-72h. Précision 99.9%.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
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
                        bio: {
                            50: '#eefbf3',
                            100: '#d6f5e3',
                            200: '#b0e9ca',
                            300: '#7dd7aa',
                            400: '#48bd85',
                            500: '#26a069',
                            600: '#188054',
                            700: '#146645',
                            800: '#125138',
                            900: '#10432f',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-14px); }
        }
        @keyframes pulse-ring {
            0% { transform: scale(0.9); opacity: 0.8; }
            100% { transform: scale(1.4); opacity: 0; }
        }
        .float-animation { animation: float 5s ease-in-out infinite; }
        .hero-bg {
            background: linear-gradient(135deg, #0a1628 0%, #0d2040 40%, #0f2d4a 70%, #0a1e35 100%);
        }
        .glass {
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.12);
        }
        .card-hover { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .card-hover:hover { transform: translateY(-6px); box-shadow: 0 24px 48px rgba(0,0,0,0.15); }
        .gradient-text {
            background: linear-gradient(135deg, #4ade80, #22d3ee, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .section-divider {
            background: linear-gradient(90deg, transparent, rgba(74, 222, 128, 0.3), transparent);
            height: 1px;
            width: 100%;
        }
        .text-glow {
            text-shadow: 0 0 20px rgba(74, 222, 128, 0.4);
        }
        .btn-premium {
            background: linear-gradient(135deg, #26a069 0%, #10432f 100%);
            position: relative;
            overflow: hidden;
        }
        .btn-premium::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            transition: 0.5s;
        }
        .btn-premium:hover::after {
            left: 100%;
        }
        
        .navbar-scrolled {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(8px) !important;
            border-bottom: 1px solid rgba(0,0,0,0.05) !important;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .navbar-scrolled span, .navbar-scrolled a:not(.bg-bio-500) {
            color: #1e293b !important;
        }
        .navbar-scrolled .text-white\/50 { color: #64748b !important; }
        .navbar-scrolled .logo-container { background: #1e293b !important; }

        /* DNA Animation */
        .dna-container {
            position: absolute;
            width: 100px;
            height: 500px;
            opacity: 0.1;
            z-index: 0;
            right: 15%;
            top: 10%;
            display: flex;
            flex-direction: column;
            gap: 15px;
            pointer-events: none;
        }
        .dna-step {
            width: 60px;
            height: 4px;
            background: #4ade80;
            border-radius: 4px;
            position: relative;
            animation: dna-rotate 4s infinite linear;
        }
        .dna-step::before, .dna-step::after {
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #22d3ee;
            top: -3px;
        }
        .dna-step::before { left: -5px; }
        .dna-step::after { right: -5px; background: #818cf8; }

        @keyframes dna-rotate {
            0% { transform: scaleX(1) rotate(0deg); opacity: 1; }
            50% { transform: scaleX(-1) rotate(180deg); opacity: 0.3; }
            100% { transform: scaleX(1) rotate(360deg); opacity: 1; }
        }
    </style>
</head>
<body class="font-inter bg-white antialiased">

    <!-- NAV -->
    <nav id="navbar" class="fixed top-0 w-full z-50 glass transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex items-center justify-between h-18 py-4">
            <a href="/" class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="GenDer Lab Logo" class="h-12 w-auto">
            </a>
            <div class="hidden md:flex items-center gap-8">
                <a href="#services" class="text-white/70 hover:text-white text-sm font-medium transition">Services</a>
                <a href="#how" class="text-white/70 hover:text-white text-sm font-medium transition">Comment ça marche</a>
                <a href="#species" class="text-white/70 hover:text-white text-sm font-medium transition">Espèces</a>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="text-white/80 hover:text-white font-semibold text-sm transition px-4 py-2 rounded-lg hover:bg-white/10">Connexion</a>
                <a href="{{ route('register') }}" class="bg-bio-500 hover:bg-bio-400 text-white font-bold text-sm px-5 py-2.5 rounded-xl transition shadow-lg shadow-bio-500/30">
                    S'inscrire
                </a>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero-bg min-h-screen flex items-center relative overflow-hidden pt-20">
        <!-- DNA Animation -->
        <div class="dna-container hidden lg:flex">
            @for($i = 0; $i < 20; $i++)
                <div class="dna-step" style="animation-delay: {{ $i * 0.2 }}s"></div>
            @endfor
        </div>

        <!-- BG Decorative Blobs -->
        <div class="absolute top-20 right-20 w-96 h-96 bg-bio-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-cyan-500/5 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full py-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 glass px-4 py-2 rounded-full text-xs font-bold text-bio-300 mb-8 tracking-widest uppercase">
                        <div class="w-2 h-2 bg-bio-400 rounded-full animate-pulse"></div>
                        Laboratoire Certifié ISO — Précision 99.9%
                    </div>
                    <h1 class="font-outfit font-black text-5xl lg:text-7xl xl:text-8xl text-white leading-[0.95] mb-8 tracking-tighter italic">
                        SEXAGE <br>
                        <span class="gradient-text">MOLÉCULAIRE</span>
                    </h1>
                    <p class="text-white/70 text-lg lg:text-xl leading-relaxed mb-10 max-w-xl font-medium">
                        La sentinelle génétique de votre élevage. Détermination du sexe <span class="text-bio-400 font-bold">Infaillible</span> pour espèces monomorphes via technologie <span class="underline decoration-bio-500/50 underline-offset-4">Gold Standard PCR</span>. 
                        <br><br>
                        <span class="bg-white/5 border border-white/10 px-3 py-1 rounded-lg text-sm italic">Rapport ultra-haute fidélité en 24-72h.</span>
                    </p>
                    <div class="flex flex-wrap gap-4 mb-12">
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 bg-bio-500 hover:bg-bio-400 text-white font-bold py-4 px-8 rounded-2xl transition shadow-xl shadow-bio-500/30 hover:shadow-bio-500/50 hover:-translate-y-0.5 transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Soumettre un prélèvement
                        </a>
                        <a href="#how" class="inline-flex items-center gap-2 glass text-white font-semibold py-4 px-8 rounded-2xl transition hover:bg-white/15">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Voir comment ça marche
                        </a>
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="font-outfit font-black text-3xl text-white">1200<span class="text-bio-400">+</span></div>
                            <div class="text-white/50 text-xs mt-1 font-medium">Espèces analysées</div>
                        </div>
                        <div class="text-center border-x border-white/10">
                            <div class="font-outfit font-black text-3xl text-white">99.9<span class="text-bio-400">%</span></div>
                            <div class="text-white/50 text-xs mt-1 font-medium">Précision garantie</div>
                        </div>
                        <div class="text-center">
                            <div class="font-outfit font-black text-3xl text-white">24<span class="text-bio-400">h</span></div>
                            <div class="text-white/50 text-xs mt-1 font-medium">Résultats express</div>
                        </div>
                    </div>
                </div>

                <!-- Hero Image Collage -->
                <div class="relative float-animation">
                    <div class="relative">
                        <!-- Main Bird Photo -->
                        <div class="rounded-3xl overflow-hidden shadow-2xl border border-white/10 bg-slate-800">
                            <img src="{{ asset('images/bird_hero.png') }}" 
                                 alt="Gris du Gabon - GenDer Lab" class="w-full h-80 object-cover">
                        </div>
                        <!-- Floating Lab Image -->
                        <div class="absolute -bottom-6 -left-6 w-48 h-36 rounded-2xl overflow-hidden shadow-xl border-2 border-white/20 bg-slate-800">
                            <img src="{{ asset('images/lab_detail.png') }}" 
                                 alt="Laboratoire PCR" class="w-full h-full object-cover">
                        </div>
                        <!-- Result Badge -->
                        <div class="absolute -top-4 -right-4 glass p-4 rounded-2xl shadow-xl border border-bio-500/30">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-bio-500/20 rounded-full flex items-center justify-center">
                                    <span class="text-bio-400 text-xl font-black">♀</span>
                                </div>
                                <div>
                                    <div class="text-white font-bold text-sm">Résultat IA</div>
                                    <div class="text-bio-400 font-black text-xs">Femelle — 99%</div>
                                </div>
                            </div>
                        </div>
                        <!-- QR Tag -->
                        <div class="absolute bottom-16 -right-6 glass p-3 rounded-xl shadow-xl border border-white/10 text-center">
                            <svg class="w-8 h-8 text-bio-400 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                            <div class="text-white text-[10px] font-bold">QR Unique</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TRUSTED BADGES BAR -->
    <div class="bg-slate-900 border-y border-white/5 py-6">
        <div class="max-w-7xl mx-auto px-6 flex flex-wrap justify-center items-center gap-10">
            <div class="flex items-center gap-2 text-slate-400 text-sm font-semibold">
                <svg class="w-5 h-5 text-bio-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                Données sécurisées & cryptées
            </div>
            <div class="flex items-center gap-2 text-slate-400 text-sm font-semibold">
                <svg class="w-5 h-5 text-bio-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                Analyses PCR certifiées
            </div>
            <div class="flex items-center gap-2 text-slate-400 text-sm font-semibold">
                <svg class="w-5 h-5 text-bio-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                IA Électrophorèse intégrée
            </div>
            <div class="flex items-center gap-2 text-slate-400 text-sm font-semibold">
                <svg class="w-5 h-5 text-bio-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Résultats en 24-72 heures
            </div>
            <div class="flex items-center gap-2 text-slate-400 text-sm font-semibold">
                <svg class="w-5 h-5 text-bio-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"></path></svg>
                +1200 espèces couvertes
            </div>
        </div>
    </div>

    <!-- SERVICES SECTION -->
    <section id="services" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-20">
                <div class="inline-flex items-center gap-2 bg-bio-100 text-bio-700 px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-[0.2em] mb-4 border border-bio-200">NOS ANALYSES</div>
                <h2 class="font-outfit font-black text-4xl lg:text-5xl text-slate-900 tracking-tight italic">Un Écosystème <span class="text-bio-600">BioTech</span> Complet</h2>
                <p class="text-slate-500 text-lg mt-6 max-w-2xl mx-auto font-medium leading-relaxed">De la détermination du sexe à la détection de pathogènes, GenDer Lab couvre l'intégralité des besoins génétiques aviaires avec des standards ISO.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 card-hover group">
                    <div class="h-48 overflow-hidden relative">
                        <img src="{{ asset('images/service_sexage.png') }}" 
                             alt="Sexage ADN Oiseaux" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <span class="absolute bottom-4 left-4 text-white font-black font-outfit text-lg">Sexage ADN</span>
                    </div>
                    <div class="p-6">
                        <p class="text-slate-500 text-sm leading-relaxed mb-4">Détermination génétique du sexe pour espèces monomorphes — la méthode la plus sûre, sans stress pour l'animal.</p>
                        <div class="flex items-center gap-2 text-bio-600 font-bold text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path></svg>
                            Plumes / Sang / Coquilles d'œufs
                        </div>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 card-hover group">
                    <div class="h-48 overflow-hidden relative">
                        <img src="{{ asset('images/service_pathogenes.png') }}" 
                             alt="Détection Pathogènes" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <span class="absolute bottom-4 left-4 text-white font-black font-outfit text-lg">Détection Pathogènes</span>
                    </div>
                    <div class="p-6">
                        <p class="text-slate-500 text-sm leading-relaxed mb-4">Identification moléculaire des virus, bactéries et parasites menaçant la santé de vos volières.</p>
                        <div class="flex items-center gap-2 text-bio-600 font-bold text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path></svg>
                            PBFD, Circovirus, Aspergillus...
                        </div>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 card-hover group">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1552084117-56a987666449?q=80&w=800&auto=format&fit=crop" 
                             alt="Paternité Génotypage" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <span class="absolute bottom-4 left-4 text-white font-black font-outfit text-lg">Paternité & Génotypage</span>
                    </div>
                    <div class="p-6">
                        <p class="text-slate-500 text-sm leading-relaxed mb-4">Établissez ou infirmez des liens familiaux avec une précision absolue de 99.9% grâce aux marqueurs microsatellites.</p>
                        <div class="flex items-center gap-2 text-bio-600 font-bold text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path></svg>
                            Arbre Généalogique Certifié
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section id="how" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-indigo-600 font-bold text-xs uppercase tracking-widest mb-3 block">Le Processus</span>
                <h2 class="font-outfit font-black text-4xl text-slate-900">Del Prélèvement au Rapport Certifié</h2>
                <p class="text-slate-500 text-lg mt-4 max-w-2xl mx-auto">Votre oiseau est analysé, sexé et certifié en moins de 72 heures sans qu'il quitte votre élevage.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <img src="{{ asset('images/how_it_works.png') }}"
                         alt="Processus de laboratoire GenDer Lab" class="rounded-3xl shadow-2xl w-full object-cover h-[500px]">
                </div>

                <div class="space-y-8">
                    <div class="flex gap-6 group">
                        <div class="flex-shrink-0 w-16 h-16 bg-slate-900 rounded-2xl overflow-hidden border border-white/10 shadow-lg">
                            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=200" alt="Step 1" class="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition">
                        </div>
                        <div>
                            <h3 class="font-outfit font-bold text-xl text-slate-900 mb-2">1. Inscription & Bio-ID</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">Enregistrez vos oiseaux sur la plateforme et générez vos étiquettes intelligentes avec QR Code unique.</p>
                        </div>
                    </div>

                    <div class="flex gap-6 group">
                        <div class="flex-shrink-0 w-16 h-16 bg-slate-900 rounded-2xl overflow-hidden border border-white/10 shadow-lg">
                            <img src="https://images.unsplash.com/photo-1596496050827-8299e0220de1?q=80&w=200" alt="Step 2" class="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition">
                        </div>
                        <div>
                            <h3 class="font-outfit font-bold text-xl text-slate-900 mb-2">2. Collecte des Plumes</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">Prélevez 3-4 plumes avec bulbe. Pas de sang nécessaire pour le sexage basique. Expédiez par courrier simple.</p>
                        </div>
                    </div>

                    <div class="flex gap-6 group">
                        <div class="flex-shrink-0 w-16 h-16 bg-slate-900 rounded-2xl overflow-hidden border border-white/10 shadow-lg">
                            <img src="https://images.unsplash.com/photo-1579154273024-5e3e3b0e352b?q=80&w=200" alt="Step 3" class="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition">
                        </div>
                        <div>
                            <h3 class="font-outfit font-bold text-xl text-slate-900 mb-2">3. Séquençage PCR</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">Notre laboratoire amplifie l'ADN et utilise l'IA pour valider les pics d'électrophorèse en un temps record.</p>
                        </div>
                    </div>

                    <div class="flex gap-6 group">
                        <div class="flex-shrink-0 w-16 h-16 bg-slate-900 rounded-2xl overflow-hidden border border-white/10 shadow-lg">
                            <img src="https://images.unsplash.com/photo-1586762522614-5c4651be9082?q=80&w=200" alt="Step 4" class="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition">
                        </div>
                        <div>
                            <h3 class="font-outfit font-bold text-xl text-slate-900 mb-2">4. Résultat Imprimable</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">Téléchargez votre certificat sécurisé avec hologramme numérique et validation blockchain/QR.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SPECIES GALLERY SECTION -->
    <section id="species" class="py-24 bg-slate-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-20">
                <div class="inline-flex items-center gap-2 bg-indigo-500/10 text-bio-400 px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-[0.2em] mb-4 border border-bio-500/20">BIO-DATA LAB</div>
                <h2 class="font-outfit font-black text-4xl lg:text-5xl text-white tracking-tight italic">Espèces <span class="text-bio-400 underline decoration-bio-400/30 underline-offset-8">Supportées</span></h2>
                <p class="text-slate-400 text-lg mt-6 max-w-2xl mx-auto font-medium">Validation génétique sur +1200 espèces de Néoaves, Ansériformes et Galliformes. Prélèvement possible sur plumes, sang et coquilles.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-12 gap-x-16">
                @php
                    $families = [
                        ['code' => 'PS-01', 'name' => 'Psittacidés', 'desc' => 'Aras, Gris du Gabon, Cacatoès, Amazones', 'count' => '350+ ESPÈCES'],
                        ['code' => 'AG-02', 'name' => 'Agapornidés', 'desc' => 'Roseicollis, Personatus, Fischeri, Lilianae', 'count' => '9 ESPÈCES'],
                        ['code' => 'CL-03', 'name' => 'Columbidés', 'desc' => 'Pigeons, Tourterelles, Colombes diamant', 'count' => '310+ ESPÈCES'],
                        ['code' => 'ES-04', 'name' => 'Estrildidés', 'desc' => 'Gould, Mandarins, Moineaux du Japon, Paddas', 'count' => '144+ ESPÈCES'],
                        ['code' => 'FA-05', 'name' => 'Falconidés', 'desc' => 'Faucons, Crécerelles, Éperviers, Buses', 'count' => '62+ ESPÈCES'],
                        ['code' => 'GL-06', 'name' => 'Galliformes', 'desc' => 'Faisans, Paons, Perdrix, Cailles, Tétras', 'count' => '295+ ESPÈCES'],
                        ['code' => 'FR-07', 'name' => 'Fringillidés', 'desc' => 'Canaris, Chardonnerets, Bouvreuils, Linottes', 'count' => '220+ ESPÈCES'],
                        ['code' => 'AC-08', 'name' => 'Accipitridés', 'desc' => 'Aigles, Autours, Milan, Busards', 'count' => '240+ ESPÈCES'],
                        ['code' => 'RA-09', 'name' => 'Ratites', 'desc' => 'Autruches, Émeus, Nandous, Rheas', 'count' => '12+ ESPÈCES'],
                    ];
                @endphp

                @foreach($families as $family)
                <div class="group cursor-default relative">
                    <!-- Technical Header -->
                    <div class="flex items-center gap-3 mb-4">
                        <span class="font-mono text-[10px] text-bio-400 font-black border border-bio-400/30 px-2 py-0.5 rounded tracking-tighter">
                            {{ $family['code'] }}
                        </span>
                        <div class="h-[1px] flex-grow bg-white/5 group-hover:bg-bio-400/20 transition-all duration-500"></div>
                        <span class="font-mono text-[9px] text-slate-500 font-bold tracking-widest">{{ $family['count'] }}</span>
                    </div>

                    <!-- Family Name -->
                    <h4 class="text-white font-black font-outfit text-3xl mb-3 tracking-tighter group-hover:text-bio-400 transition-colors uppercase italic italic italic">
                        {{ $family['name'] }}
                    </h4>

                    <!-- Technical Decription -->
                    <p class="text-slate-400 text-xs leading-relaxed font-medium tracking-wide border-l-2 border-white/5 pl-4 group-hover:border-bio-500/40 transition-all">
                        {{ $family['desc'] }}
                    </p>

                    <!-- Interaction Reveal -->
                    <div class="absolute -right-2 top-10 opacity-0 group-hover:opacity-100 transition-all transform translate-x-4 group-hover:translate-x-0">
                        <svg class="w-10 h-10 text-bio-400/10" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-24 border-t border-white/5 pt-12 flex flex-col md:flex-row items-center justify-between gap-8">
                <div>
                    <h5 class="text-white font-black font-outfit text-lg tracking-tight italic uppercase">Accès Nomenclature Complète</h5>
                    <p class="text-slate-500 text-xs font-medium mt-1 uppercase tracking-widest italic">Base de données génétique actualisée quotidiennement</p>
                </div>
                <a href="{{ route('register') }}" class="px-10 py-5 bg-white text-slate-950 font-black text-[10px] uppercase tracking-[0.3em] rounded-2xl hover:bg-bio-400 transition transform hover:-translate-y-1 shadow-2xl">
                    Soumettre une espèce non référencée
                </a>
            </div>
        </div>
    </section>



    <!-- FINAL CTA -->
    <section class="py-20 hero-bg relative overflow-hidden">
        <div class="absolute inset-0 bg-bio-500/5"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-bio-500/10 rounded-full blur-3xl"></div>
        <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
            <h2 class="font-outfit font-black text-4xl lg:text-5xl text-white mb-6">
                Rejoignez +500 Éleveurs<br><span class="gradient-text">qui nous font confiance</span>
            </h2>
            <p class="text-white/60 text-lg mb-10 max-w-2xl mx-auto">
                Créez votre compte gratuitement. Le premier prélèvement est soumis en moins de 3 minutes. Votre premier certificat arrive en quelques jours.
            </p>
            <a href="{{ route('register') }}" class="inline-flex items-center gap-3 bg-bio-500 hover:bg-bio-400 text-white font-black text-lg py-5 px-12 rounded-2xl transition shadow-xl shadow-bio-500/30 hover:-translate-y-1 transform">
                Sign Up
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="GenDer Lab Logo" class="h-12 w-auto">
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-xs">
                        Plateforme de génétique moléculaire avancée pour le sexage et la détection de pathogènes aviaires. Précision 99.9%, rapports certifiés.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-4 text-sm uppercase tracking-widest">Services</h4>
                    <ul class="space-y-2 text-slate-400 text-sm">
                        <li><a href="#" class="hover:text-bio-400 transition">Sexage ADN</a></li>
                        <li><a href="#" class="hover:text-bio-400 transition">Détection Pathogènes</a></li>
                        <li><a href="#" class="hover:text-bio-400 transition">Paternité & Génotypage</a></li>
                        <li><a href="#" class="hover:text-bio-400 transition">Analyse Fécale</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-4 text-sm uppercase tracking-widest">Contact Labo</h4>
                    <ul class="space-y-3 text-slate-400 text-sm">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-bio-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            contact@bioscan-ai.com
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-bio-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            +213 XX XX XX XX
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-600 text-sm">© {{ date('Y') }} GenDer Lab — Tous droits réservés.</p>
                <div class="flex gap-6 text-slate-600 text-sm">
                    <a href="#" class="hover:text-white transition">Mentions légales</a>
                    <a href="#" class="hover:text-white transition">Confidentialité</a>
                    <a href="#" class="hover:text-white transition">CGU</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 50) {
                nav.classList.add('navbar-scrolled');
                nav.classList.remove('glass');
            } else {
                nav.classList.remove('navbar-scrolled');
                nav.classList.add('glass');
            }
        });
    </script>
</body>
</html>
