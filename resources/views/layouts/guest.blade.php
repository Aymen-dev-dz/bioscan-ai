<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BioScan AI') }} — Authentification</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            .gradient-text {
                background: linear-gradient(135deg, #4ade80, #22d3ee);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
        </style>
    </head>
    <body class="font-inter antialiased hero-bg min-h-screen flex items-center justify-center p-6 sm:p-0">
        <div class="w-full sm:max-w-md">
            <div class="text-center mb-10">
                <a href="/" class="inline-flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-bio-400 to-indigo-500 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                </a>
                <h1 class="mt-4 font-outfit font-black text-2xl text-white">BioScan <span class="text-bio-400">AI</span></h1>
                <p class="text-white/40 text-sm mt-1 uppercase tracking-widest font-bold">Génétique Avancée</p>
            </div>

            <div class="glass rounded-[2rem] p-8 sm:p-10 shadow-2xl relative overflow-hidden">
                <!-- Decorative blob -->
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-bio-500/10 rounded-full blur-3xl"></div>
                
                {{ $slot }}
            </div>
            
            <p class="text-center mt-8 text-white/30 text-xs">
                © {{ date('Y') }} BioScan AI. Tous droits réservés.
            </p>
        </div>
    </body>
</html>
