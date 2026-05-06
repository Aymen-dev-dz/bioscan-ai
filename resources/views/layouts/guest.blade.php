<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GenDer Lab') }} — Authentification</title>

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
                    <img src="{{ asset('images/logo.jpg') }}" alt="GenDer Lab Logo" class="h-16 w-auto">
                </a>
                <h1 class="mt-4 font-outfit font-black text-2xl text-white">GenDer Lab</h1>
                <p class="text-white/40 text-sm mt-1 uppercase tracking-widest font-bold">Molecular Bird Sexing</p>
            </div>

            <div class="glass rounded-[2rem] p-8 sm:p-10 shadow-2xl relative overflow-hidden">
                <!-- Decorative blob -->
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-bio-500/10 rounded-full blur-3xl"></div>
                
                {{ $slot }}
            </div>
            
            <p class="text-center mt-8 text-white/30 text-xs">
                © {{ date('Y') }} GenDer Lab. Tous droits réservés.
            </p>
        </div>
    </body>
</html>
