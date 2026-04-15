<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioScan AI — Sexage Moléculaire & Détection Pathogènes</title>
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
            background: linear-gradient(90deg, transparent, #4ade80, transparent);
            height: 1px;
            width: 100%;
        }
    </style>
</head>
<body class="font-inter bg-white antialiased">

    <!-- NAV -->
    <nav class="fixed top-0 w-full z-50 glass">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex items-center justify-between h-18 py-4">
            <a href="/" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-bio-400 to-indigo-500 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>
                <div>
                    <span class="font-outfit font-black text-xl text-white">BioScan<span class="text-bio-400"> AI</span></span>
                    <div class="text-[10px] text-white/50 leading-none tracking-widest uppercase">Génétique Avancée</div>
                </div>
            </a>
            <div class="hidden md:flex items-center gap-8">
                <a href="#services" class="text-white/70 hover:text-white text-sm font-medium transition">Services</a>
                <a href="#how" class="text-white/70 hover:text-white text-sm font-medium transition">Comment ça marche</a>
                <a href="#species" class="text-white/70 hover:text-white text-sm font-medium transition">Espèces</a>
                <a href="#tarifs" class="text-white/70 hover:text-white text-sm font-medium transition">Tarifs</a>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="text-white/80 hover:text-white font-semibold text-sm transition px-4 py-2 rounded-lg hover:bg-white/10">Connexion</a>
                <a href="{{ route('register') }}" class="bg-bio-500 hover:bg-bio-400 text-white font-bold text-sm px-5 py-2.5 rounded-xl transition shadow-lg shadow-bio-500/30">
                    Démarrer Gratuit
                </a>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero-bg min-h-screen flex items-center relative overflow-hidden pt-20">
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
                    <h1 class="font-outfit font-black text-5xl lg:text-6xl xl:text-7xl text-white leading-[1.05] mb-6">
                        Sexage Moléculaire
                        <br>
                        <span class="gradient-text">ADN des Oiseaux</span>
                    </h1>
                    <p class="text-white/60 text-lg leading-relaxed mb-10 max-w-xl">
                        La technique la plus fiable pour déterminer le sexe des espèces monomorphes. 
                        Analyse PCR complète accompagnée d'une intelligence artificielle pour l'électrophorèse. 
                        <strong class="text-white/90">Rapport certifié en 24-72h.</strong>
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
                        <div class="rounded-3xl overflow-hidden shadow-2xl border border-white/10">
                            <img src="https://images.unsplash.com/photo-1552728089-57bdde30beb3?auto=format&fit=crop&w=800&q=90" 
                                 alt="Ara bleu et jaune - sexage ADN" class="w-full h-80 object-cover">
                        </div>
                        <!-- Floating Lab Image -->
                        <div class="absolute -bottom-6 -left-6 w-48 h-36 rounded-2xl overflow-hidden shadow-xl border-2 border-white/20">
                            <img src="https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&w=400&q=90" 
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
            <div class="text-center mb-16">
                <span class="text-bio-600 font-bold text-xs uppercase tracking-widest mb-3 block">Nos Analyses</span>
                <h2 class="font-outfit font-black text-4xl text-slate-900">Un Écosystème Complet d'Analyses</h2>
                <p class="text-slate-500 text-lg mt-4 max-w-2xl mx-auto">De la détermination du sexe à la détection de pathogènes, BioScan couvre l'intégralité des besoins génétiques aviaires.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 card-hover group">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1444464666168-49d633b86797?auto=format&fit=crop&w=600&q=80" 
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
                        <img src="https://images.unsplash.com/photo-1576086213369-97a306d36557?auto=format&fit=crop&w=600&q=80" 
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
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80" 
                             alt="Paternité Génotypage" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <span class="absolute bottom-4 left-4 text-white font-black font-outfit text-lg">Paternité & Génotypage</span>
                    </div>
                    <div class="p-6">
                        <p class="text-slate-500 text-sm leading-relaxed mb-4">Établissez ou infirmez des liens familiaux — indispensable pour les programmes de conservation et d'élevage sélectif.</p>
                        <div class="flex items-center gap-2 text-bio-600 font-bold text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path></svg>
                            Profils ADN microsatellites
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
                    <img src="https://images.unsplash.com/photo-1559757175-0eb30cd8c063?auto=format&fit=crop&w=700&q=85"
                         alt="Laboratoire d'analyse ADN" class="rounded-3xl shadow-2xl w-full object-cover h-[500px]">
                </div>

                <div class="space-y-8">
                    <div class="flex gap-6 group">
                        <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 group-hover:bg-indigo-600 rounded-2xl flex items-center justify-center transition-colors duration-300">
                            <span class="font-outfit font-black text-indigo-600 group-hover:text-white transition-colors">1</span>
                        </div>
                        <div>
                            <h3 class="font-outfit font-bold text-xl text-slate-900 mb-2">Créez votre compte & soumettez</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">L'éleveur s'inscrit, remplie le formulaire d'espèce et reçoit automatiquement un QR Code unique imprimable pour son sachet/tube.</p>
                        </div>
                    </div>

                    <div class="flex gap-6 group">
                        <div class="flex-shrink-0 w-12 h-12 bg-bio-100 group-hover:bg-bio-600 rounded-2xl flex items-center justify-center transition-colors duration-300">
                            <span class="font-outfit font-black text-bio-600 group-hover:text-white transition-colors">2</span>
                        </div>
                        <div>
                            <h3 class="font-outfit font-bold text-xl text-slate-900 mb-2">Envoyez le kit étiqueté</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">Glissez 3-4 plumes avec bulbe ou une goutte de sang sur papier FTA dans le sachet ZIP fourni. Expédiez le kit au laboratoire.</p>
                        </div>
                    </div>

                    <div class="flex gap-6 group">
                        <div class="flex-shrink-0 w-12 h-12 bg-purple-100 group-hover:bg-purple-600 rounded-2xl flex items-center justify-center transition-colors duration-300">
                            <span class="font-outfit font-black text-purple-600 group-hover:text-white transition-colors">3</span>
                        </div>
                        <div>
                            <h3 class="font-outfit font-bold text-xl text-slate-900 mb-2">PCR & Analyse IA électrophorèse</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">L'ADN est amplifié et l'électrophorèse est analysée automatiquement par notre algorithme. Le biologiste valide en un clic.</p>
                        </div>
                    </div>

                    <div class="flex gap-6 group">
                        <div class="flex-shrink-0 w-12 h-12 bg-rose-100 group-hover:bg-rose-600 rounded-2xl flex items-center justify-center transition-colors duration-300">
                            <span class="font-outfit font-black text-rose-600 group-hover:text-white transition-colors">4</span>
                        </div>
                        <div>
                            <h3 class="font-outfit font-bold text-xl text-slate-900 mb-2">Certificat officiel sur votre espace</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">Le rapport PDF certifié apparaît en temps réel sur votre dashboard et est envoyé par email. Imprimable, archivable, légalement valide.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SPECIES GALLERY SECTION -->
    <section id="species" class="py-24 bg-slate-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-bio-400 font-bold text-xs uppercase tracking-widest mb-3 block">Base de Données</span>
                <h2 class="font-outfit font-black text-4xl text-white">Toutes vos Espèces Couvertes</h2>
                <p class="text-slate-400 text-lg mt-4 max-w-2xl mx-auto">+1200 espèces de Néoaves, Ansériformes et Galliformes. Analyses sur plumes, sang et coquilles d'œufs.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @php
                    $birds = [
                        ['img' => 'https://images.unsplash.com/photo-1552728089-57bdde30beb3?auto=format&fit=crop&w=300&q=80', 'name' => 'Ara ararauna'],
                        ['img' => 'https://images.unsplash.com/photo-1560419450-b2b2a5a60a96?auto=format&fit=crop&w=300&q=80', 'name' => 'Agapornis sp.'],
                        ['img' => 'https://images.unsplash.com/photo-1452570053594-1b985d6ea890?auto=format&fit=crop&w=300&q=80', 'name' => 'Nymphicus sp.'],
                        ['img' => 'https://images.unsplash.com/photo-1444464666168-49d633b86797?auto=format&fit=crop&w=300&q=80', 'name' => 'Psittacus sp.'],
                        ['img' => 'https://images.unsplash.com/photo-1484406566174-9da000fda645?auto=format&fit=crop&w=300&q=80', 'name' => 'Colombes'],
                        ['img' => 'https://images.unsplash.com/photo-1598549861607-4416aefca00d?auto=format&fit=crop&w=300&q=80', 'name' => '+1200 Espèces'],
                    ];
                @endphp

                @foreach($birds as $bird)
                <div class="relative rounded-2xl overflow-hidden group cursor-pointer">
                    <img src="{{ $bird['img'] }}" alt="{{ $bird['name'] }}" class="w-full h-32 object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-3">
                        <span class="text-white font-bold text-xs">{{ $bird['name'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- TARIFS SECTION -->
    <section id="tarifs" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-indigo-600 font-bold text-xs uppercase tracking-widest mb-3 block">Plans</span>
                <h2 class="font-outfit font-black text-4xl text-slate-900">Des Offres Adaptées à Chaque Besoin</h2>
                <p class="text-slate-500 text-lg mt-4 max-w-xl mx-auto">Du test unique à la formule pour centres de conservation.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Standard -->
                <div class="border border-slate-200 rounded-3xl p-8 card-hover bg-white">
                    <div class="text-slate-400 font-bold text-xs uppercase tracking-widest mb-2">Standard</div>
                    <div class="font-outfit font-black text-4xl text-slate-900 mb-1">15<span class="text-lg">€</span></div>
                    <div class="text-slate-400 text-xs mb-6">par prélèvement · Résultats 4-7j</div>
                    <ul class="space-y-3 mb-8 text-sm text-slate-600">
                        <li class="flex gap-2"><svg class="w-4 h-4 text-bio-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Sexage PCR certifié</li>
                        <li class="flex gap-2"><svg class="w-4 h-4 text-bio-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Rapport PDF officiel</li>
                        <li class="flex gap-2"><svg class="w-4 h-4 text-bio-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Suivi temps réel</li>
                        <li class="flex gap-2"><svg class="w-4 h-4 text-bio-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> QR Code d'étiquetage</li>
                    </ul>
                    <a href="{{ route('register') }}" class="block text-center bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold py-3 rounded-xl transition">Démarrer</a>
                </div>

                <!-- Premium - Highlighted -->
                <div class="bg-gradient-to-br from-indigo-900 to-slate-900 rounded-3xl p-8 card-hover relative shadow-2xl shadow-indigo-900/30">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-bio-500 text-white text-xs font-black px-4 py-1.5 rounded-full uppercase tracking-widest shadow-lg">
                        Plus Populaire
                    </div>
                    <div class="text-bio-400 font-bold text-xs uppercase tracking-widest mb-2">Premium</div>
                    <div class="font-outfit font-black text-4xl text-white mb-1">25<span class="text-lg">€</span></div>
                    <div class="text-white/40 text-xs mb-6">par prélèvement · Résultats 48-72h</div>
                    <ul class="space-y-3 mb-8 text-sm text-white/80">
                        <li class="flex gap-2"><svg class="w-4 h-4 text-bio-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Tout le Standard +</li>
                        <li class="flex gap-2"><svg class="w-4 h-4 text-bio-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> IA Analyse Électrophorèse</li>
                        <li class="flex gap-2"><svg class="w-4 h-4 text-bio-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Infos sanitaires espèce</li>
                        <li class="flex gap-2"><svg class="w-4 h-4 text-bio-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Chat IA illimité</li>
                        <li class="flex gap-2"><svg class="w-4 h-4 text-bio-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Conseils croisement lignées</li>
                    </ul>
                    <a href="{{ route('register') }}" class="block text-center bg-bio-500 hover:bg-bio-400 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-bio-500/30">Choisir Premium</a>
                </div>

                <!-- Express -->
                <div class="border border-slate-200 rounded-3xl p-8 card-hover bg-white">
                    <div class="text-slate-400 font-bold text-xs uppercase tracking-widest mb-2">Express</div>
                    <div class="font-outfit font-black text-4xl text-slate-900 mb-1">45<span class="text-lg">€</span></div>
                    <div class="text-slate-400 text-xs mb-6">par prélèvement · Résultats 24h</div>
                    <ul class="space-y-3 mb-8 text-sm text-slate-600">
                        <li class="flex gap-2"><svg class="w-4 h-4 text-bio-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Tout le Premium +</li>
                        <li class="flex gap-2"><svg class="w-4 h-4 text-bio-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Priorité absolue en labo</li>
                        <li class="flex gap-2"><svg class="w-4 h-4 text-bio-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Rapport 24h garanti</li>
                        <li class="flex gap-2"><svg class="w-4 h-4 text-bio-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Support dédié biologiste</li>
                    </ul>
                    <a href="{{ route('register') }}" class="block text-center bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold py-3 rounded-xl transition">Choisir Express</a>
                </div>
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
                Créer mon espace gratuit
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
                        <div class="w-10 h-10 bg-gradient-to-br from-bio-400 to-indigo-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        </div>
                        <span class="font-outfit font-black text-xl">BioScan <span class="text-bio-400">AI</span></span>
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
                <p class="text-slate-600 text-sm">© {{ date('Y') }} BioScan AI — Tous droits réservés.</p>
                <div class="flex gap-6 text-slate-600 text-sm">
                    <a href="#" class="hover:text-white transition">Mentions légales</a>
                    <a href="#" class="hover:text-white transition">Confidentialité</a>
                    <a href="#" class="hover:text-white transition">CGU</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
