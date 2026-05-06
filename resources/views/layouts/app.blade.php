<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GenDer Lab') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
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
                                50: '#eefbf3', 100: '#d6f5e3', 200: '#b0e9ca', 300: '#7dd7aa', 400: '#48bd85', 
                                500: '#26a069', 600: '#188054', 700: '#146645', 800: '#125138', 900: '#10432f',
                            }
                        }
                    }
                }
            }
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .hero-bg {
                background: linear-gradient(135deg, #0a1628 0%, #0d2040 40%, #0f2d4a 70%, #0a1e35 100%);
            }
            .glass {
                background: rgba(255,255,255,0.03);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255,255,255,0.08);
            }
            .gradient-text {
                background: linear-gradient(135deg, #4ade80, #22d3ee, #818cf8);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
        </style>
    </head>
    <body class="font-inter antialiased bg-slate-50">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <div class="hero-bg py-10 border-b border-white/5 relative overflow-hidden">
                    <!-- Decorative blobs -->
                    <div class="absolute top-0 right-0 w-64 h-64 bg-bio-500/10 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-indigo-500/10 rounded-full blur-2xl"></div>
                    
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                        {{ $header }}
                    </div>
                </div>
            @endisset

            <!-- Page Content -->
            <main class="py-12">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
