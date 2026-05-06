<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-black text-3xl text-slate-900 leading-tight">
            Guide du Prélèvement <span class="text-bio-500">&</span> Assistance
        </h2>
        <p class="text-slate-500 text-sm mt-1">Tout ce qu'il faut savoir d'envoyer vos échantillons au laboratoire.</p>
    </x-slot>

    <div class="py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Tutorial Video Section -->
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden relative">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-bio-500/5 rounded-full blur-2xl"></div>
                        <h3 class="text-xl font-bold font-outfit text-slate-800 mb-6 flex items-center gap-2">
                            <svg class="w-6 h-6 text-bio-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg>
                            Tutoriels Vidéo
                        </h3>
                        
                        <div class="aspect-video bg-slate-900 rounded-3xl relative overflow-hidden group border-4 border-slate-50 shadow-inner cursor-pointer">
                            <img src="https://picsum.photos/id/10/1200/800" class="w-full h-full object-cover opacity-50 transition duration-500 group-hover:scale-110" alt="Video Placeholder">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-2xl transition group-hover:scale-110">
                                    <svg class="w-10 h-10 text-bio-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg>
                                </div>
                            </div>
                            <div class="absolute bottom-6 left-6 text-white font-bold text-lg drop-shadow-md">
                                Comment prélever des plumes (Gris du Gabon)
                            </div>
                        </div>
                    </div>

                    <!-- Step by Step Section -->
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100">
                        <h3 class="text-xl font-bold font-outfit text-slate-800 mb-8">Protocole de Prélèvement Certifié</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                            <div class="space-y-6">
                                <div class="flex gap-4">
                                    <div class="w-10 h-10 bg-bio-100 text-bio-600 rounded-xl flex items-center justify-center font-black shrink-0">1</div>
                                    <div>
                                        <h4 class="font-bold text-slate-800">Sélection</h4>
                                        <p class="text-slate-500 text-sm">Choisissez 3 à 5 plumes fraîches au niveau du thorax. Ne pas utiliser de plumes tombées au sol.</p>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="w-10 h-10 bg-bio-100 text-bio-600 rounded-xl flex items-center justify-center font-black shrink-0">2</div>
                                    <div>
                                        <h4 class="font-bold text-slate-800">Séchage & Emballage</h4>
                                        <p class="text-slate-500 text-sm">Placez les plumes dans un sachet zip propre et sec. Ne pas utiliser de coton humide.</p>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="w-10 h-10 bg-bio-100 text-bio-600 rounded-xl flex items-center justify-center font-black shrink-0">3</div>
                                    <div>
                                        <h4 class="font-bold text-slate-800">Identification QR</h4>
                                        <p class="text-slate-500 text-sm">Collez l'étiquette générée sur le sachet. Assurez-vous que le code QR est bien lisible.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="relative">
                                <img src="{{ asset('images/collection_feathers.png') }}" class="rounded-3xl shadow-lg border-4 border-slate-50" alt="Guide">
                                <div class="absolute -bottom-4 -right-4 bg-white p-3 rounded-2xl shadow-xl border border-slate-100">
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">MÉTHODE APP DE L'IA</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Sidebar / AI Chat -->
                <div class="space-y-8">
                    
                    <!-- AI Assistant Chat -->
                    <div class="bg-indigo-950 rounded-[2.5rem] shadow-2xl p-6 text-white overflow-hidden relative group">
                        <!-- Decorative background light -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-bio-400/10 rounded-full blur-2xl group-hover:bg-bio-400/20 transition duration-500"></div>
                        
                        <div class="relative z-10 flex flex-col h-[500px]">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 bg-gradient-to-br from-bio-400 to-indigo-500 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <div>
                                    <h3 class="font-black font-outfit text-lg">Assistant GenDer Lab</h3>
                                    <p class="text-[10px] text-bio-400 font-bold uppercase tracking-widest">En ligne • IA Biologiste</p>
                                </div>
                            </div>

                            <!-- Chat Messages (Simulated) -->
                            <div class="flex-1 overflow-y-auto space-y-4 mb-6 pr-2 custom-scrollbar">
                                <div class="bg-white/10 p-4 rounded-2xl rounded-tl-none text-sm text-white/80 border border-white/5">
                                    Bonjour ! Je suis l'IA de GenDer Lab. Comment puis-je vous aider dans votre prélèvement aujourd'hui ?
                                </div>
                                <div class="bg-bio-500/20 p-4 rounded-2xl rounded-tr-none text-sm text-bio-100 border border-bio-500/20 self-end ml-8">
                                    Quelles plumes dois-je prendre pour un perroquet ?
                                </div>
                                <div class="bg-white/10 p-4 rounded-2xl rounded-tl-none text-sm text-white/80 border border-white/5">
                                    Pour un perroquet, l'idéal est de prélever 4 à 5 petites plumes au niveau de la poitrine ou du bas de l'aile. Évitez les grandes plumes de vol qui sont trop douloreuses à retirer.
                                </div>
                                <div class="bg-white/10 p-4 rounded-2xl rounded-tl-none text-sm text-white/80 border border-white/5">
                                    N'oubliez pas de bien photographier l'échantillon via l'IA de vérification avant scellage !
                                </div>
                            </div>

                            <!-- Input -->
                            <div class="mt-auto">
                                <div class="relative">
                                    <input type="text" placeholder="Posez votre question..." class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 pl-5 pr-12 text-sm text-white focus:outline-none focus:border-bio-400 focus:ring-1 focus:ring-bio-400 transition placeholder:text-white/20">
                                    <button class="absolute right-3 top-3 w-8 h-8 bg-bio-500 rounded-xl flex items-center justify-center text-white hover:bg-bio-400 transition">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Logistics Info -->
                    <div class="bg-white p-6 rounded-[2rem] shadow-lg border border-slate-100">
                        <h4 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 012 2v1a2 2 0 01-2 2H4a2 2 0 01-2-2v-1a2 2 0 012-2m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            Logistique & Envoi
                        </h4>
                        <ul class="text-sm text-slate-500 space-y-3">
                            <li class="flex items-center gap-2">
                                <div class="w-1.5 h-1.5 bg-bio-500 rounded-full"></div>
                                Dépôt local (gratuit)
                            </li>
                            <li class="flex items-center gap-2">
                                <div class="w-1.5 h-1.5 bg-bio-500 rounded-full"></div>
                                Envoi par courrier certifié (J+1)
                            </li>
                            <li class="flex items-center gap-2">
                                <div class="w-1.5 h-1.5 bg-bio-500 rounded-full"></div>
                                Ramassage groupé éleveurs
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
    </style>
</x-app-layout>
