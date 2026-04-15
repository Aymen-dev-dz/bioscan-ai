<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-black text-3xl text-slate-900 leading-tight">
            {{ __('Soumission d\'Échantillon') }}
        </h2>
        <p class="text-slate-500 text-sm mt-1">Assistant intelligent de préparation du prélèvement biologique.</p>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Multi-step Form Container using Alpine.js -->
            <div x-data="{ step: 1, deliveryType: 'courier' }" class="bg-white overflow-hidden shadow-xl shadow-slate-200/50 sm:rounded-3xl border border-slate-100 p-8 lg:p-10 relative">
                
                <!-- Progress Bar -->
                <div class="mb-10 relative">
                    <div class="overflow-hidden bg-slate-100 h-2.5 rounded-full w-full">
                        <div class="h-full bg-indigo-600 transition-all duration-500 ease-out" 
                             :style="'width: ' + ((step / 3) * 100) + '%'"></div>
                    </div>
                    <div class="flex justify-between mt-3 px-1 text-xs font-bold text-slate-400 uppercase tracking-widest relative z-10 w-full">
                        <span :class="{'text-indigo-600': step >= 1}">1. Profilage</span>
                        <span :class="{'text-indigo-600': step >= 2}">2. Qualification IA</span>
                        <span :class="{'text-indigo-600': step >= 3}">3. Logistique</span>
                    </div>
                </div>

                <form action="{{ route('client.store') }}" method="POST" id="submissionForm" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- STEP 1: ESPÈCE & TYPE -->
                    <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-4" x-transition:enter-end="opacity-100 transform translate-x-0">
                        <div class="mb-8 border-b border-slate-100 pb-6 flex items-start gap-4">
                            <div class="bg-indigo-50 p-3 rounded-2xl shrink-0">
                                <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold font-outfit text-slate-800">Cible Analytique</h3>
                                <p class="text-slate-500 text-sm mt-1">Sélectionnez l'espèce et les métadonnées de l'individu à tester.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-indigo-600 transition">Taxonomie (Espèce)</label>
                                <select name="species_id" required class="block w-full border-slate-200 bg-slate-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm transition">
                                    <option value="">Choisir une espèce...</option>
                                    @foreach($species as $sp)
                                        <option value="{{ $sp->id }}">{{ $sp->name }} ({{ $sp->family }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-indigo-600 transition">Type de Matériel Génétique</label>
                                <select name="sample_type" required class="block w-full border-slate-200 bg-slate-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm transition">
                                    <option value="feather">Plume (Rachis/Bulbe)</option>
                                    <option value="blood">Sang (Buvard/FTA)</option>
                                </select>
                            </div>

                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-indigo-600 transition">Quantité estimée</label>
                                <input type="number" name="quantity" min="1" value="3" required class="block w-full border-slate-200 bg-slate-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm transition">
                            </div>

                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-indigo-600 transition">Informations Santé (Optionnel)</label>
                                <input type="text" name="notes" placeholder="Âge supposé, état de santé général..." class="block w-full border-slate-200 bg-slate-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm transition">
                            </div>
                        </div>

                        <div class="flex justify-end pt-6 border-t border-slate-100">
                            <button type="button" @click="step = 2" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-indigo-500/30 transition-all flex items-center gap-2">
                                Suivant: Scan IA
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- STEP 2: IA SCAN -->
                    <div x-show="step === 2" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-4" x-transition:enter-end="opacity-100 transform translate-x-0">
                        <div class="mb-8 border-b border-slate-100 pb-6 flex items-start gap-4">
                            <div class="bg-purple-50 p-3 rounded-2xl shrink-0">
                                <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold font-outfit text-slate-800">Contrôle Qualité IA</h3>
                                <p class="text-slate-500 text-sm mt-1">Uploadez une macro-photo du prélèvement pour valider sa viabilité.</p>
                            </div>
                        </div>

                        <div class="bg-purple-900/5 p-8 rounded-3xl border border-purple-100 flex flex-col justify-center items-center group mb-8">
                            <div class="relative items-center justify-center border-2 border-purple-300 border-dashed rounded-2xl p-10 w-full hover:bg-white/50 transition cursor-pointer flex flex-col gap-3 group-hover:border-purple-500 text-center">
                                <div class="bg-purple-100 p-4 rounded-full mb-2">
                                    <svg class="w-8 h-8 text-purple-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path></svg>
                                </div>
                                <span class="text-lg font-bold text-purple-900">Prendre une photo ou importer via galerie</span>
                                <p class="text-sm text-purple-600/80 max-w-sm mx-auto">L'algorithme BioScan vérifiera la présence cellulaire suffisante (calamus intact / couleur rubis) avant de verrouiller la demande.</p>
                                <input type="file" name="pre_scan_image" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*">
                            </div>
                            <div class="w-full mt-4 bg-white p-4 rounded-xl text-xs text-purple-800 flex gap-2 items-center shadow-sm border border-purple-50">
                                <svg class="w-5 h-5 shrink-0 text-purple-500 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                Actuellement, cette étape est optionnelle et en phase de bêta-test IA communautaire.
                            </div>
                        </div>

                        <div class="flex justify-between pt-6 border-t border-slate-100">
                            <button type="button" @click="step = 1" class="text-slate-500 hover:text-slate-800 font-bold py-3 px-6 rounded-xl transition flex items-center gap-2">
                                Retour
                            </button>
                            <button type="button" @click="step = 3" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-indigo-500/30 transition-all flex items-center gap-2">
                                Étape Finale
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- STEP 3: LOGISTIQUE -->
                    <div x-show="step === 3" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-4" x-transition:enter-end="opacity-100 transform translate-x-0">
                        <div class="mb-8 border-b border-slate-100 pb-6 flex items-start gap-4">
                            <div class="bg-emerald-50 p-3 rounded-2xl shrink-0">
                                <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold font-outfit text-slate-800">Logistique & Adressage</h3>
                                <p class="text-slate-500 text-sm mt-1">Définissez le mode d'acheminement de la matière vers nos installations.</p>
                            </div>
                        </div>

                        <div class="mb-8">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <label class="relative flex cursor-pointer rounded-2xl border bg-white p-5 hover:shadow-md transition focus:outline-none" :class="{'border-indigo-500 ring-2 ring-indigo-500 shadow-md bg-indigo-50/10': deliveryType === 'courier', 'border-slate-200': deliveryType !== 'courier' }">
                                    <input type="radio" name="delivery_method" value="courier" class="sr-only" @click="deliveryType = 'courier'" checked>
                                    <span class="flex flex-1">
                                        <span class="flex flex-col">
                                            <span class="block text-base font-bold text-slate-900 mb-1">Envoi Postal</span>
                                            <span class="mt-1 flex text-xs font-medium leading-relaxed text-slate-500">Imprimez l'étiquette QR générée à l'étape suivante, glissez-la avec l'échantillon.</span>
                                        </span>
                                    </span>
                                </label>

                                <label class="relative flex cursor-pointer rounded-2xl border bg-white p-5 hover:shadow-md transition focus:outline-none" :class="{'border-indigo-500 ring-2 ring-indigo-500 shadow-md bg-indigo-50/10': deliveryType === 'dropoff', 'border-slate-200': deliveryType !== 'dropoff' }">
                                    <input type="radio" name="delivery_method" value="dropoff" class="sr-only" @click="deliveryType = 'dropoff'">
                                    <span class="flex flex-1">
                                        <span class="flex flex-col">
                                            <span class="block text-base font-bold text-slate-900 mb-1">Dépôt Physique</span>
                                            <span class="mt-1 flex text-xs font-medium leading-relaxed text-slate-500">Passez par la réception du labo BioScan. Gagnez du temps sur le transit postal.</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            
                            <!-- Conservation instructions shown via JS depending on dropoff -->
                            <div x-show="deliveryType === 'dropoff'" x-transition class="mt-6 p-5 bg-amber-50 rounded-2xl border border-amber-200 flex gap-4 text-amber-900" style="display: none;">
                                <div class="bg-amber-100 p-2 rounded-full h-min">
                                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-sm">Conservation stricte exigée</h5>
                                    <p class="text-xs font-medium mt-1 leading-relaxed">
                                        Jusqu'au dépôt : <strong>Plumes</strong> à température ambiante en lieu sec. <strong>Sang fluide</strong> scellé impérativement entre 2°C et 8°C.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-slate-100">
                            <button type="button" @click="step = 2" class="text-slate-500 hover:text-slate-800 font-bold py-3 px-6 rounded-xl transition flex items-center gap-2">
                                Retour
                            </button>
                            <button type="submit" class="bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-slate-900/30 transition-all transform hover:-translate-y-0.5 flex items-center gap-3">
                                Confirmer et Générer le Dossier QR 
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Tutoriels & Assistant IA -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-3xl p-8 shadow-sm border border-blue-100/50 flex gap-6 relative overflow-hidden">
                    <div class="absolute right-0 top-0 w-32 h-32 bg-blue-500/5 rounded-full blur-2xl"></div>
                    
                    <div class="relative z-10 w-full">
                        <h4 class="font-outfit font-bold text-lg text-indigo-950 mb-4 flex items-center gap-2">
                            <svg class="h-6 w-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Guide Méthodologique
                        </h4>
                        
                        <div class="bg-indigo-900/10 p-5 rounded-2xl border border-indigo-900/10 flex flex-col gap-4">
                            <div class="relative w-full aspect-video bg-indigo-950 rounded-xl flex justify-center items-center group cursor-pointer overflow-hidden shadow-sm">
                                <div class="absolute inset-0 bg-cover bg-center opacity-60 transition duration-700 group-hover:opacity-80 group-hover:scale-105" style="background-image: url('https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&w=600&q=80');"></div>
                                <div class="w-14 h-14 bg-white/30 backdrop-blur-md rounded-full flex items-center justify-center group-hover:scale-110 transition z-10 border border-white/40 shadow-lg">
                                    <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                            <div class="text-sm text-indigo-900">
                                <strong>Vidéothèque Officielle :</strong> Maîtrisez le geste juste sans traumatiser l'animal. Extraction du bulbe, utilisation du papier FTA.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 flex flex-col relative overflow-hidden group">
                    <div class="absolute -right-8 -bottom-8 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl group-hover:bg-purple-500/20 transition duration-500"></div>
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold shadow-md">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                                </div>
                                <div class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-500 border-2 border-white rounded-full"></div>
                            </div>
                            <div>
                                <h4 class="font-outfit font-bold text-slate-800">BioScan Support AI</h4>
                                <p class="text-xs font-bold text-indigo-600">Online • Capacité Limitée</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex-1 bg-slate-50/50 rounded-2xl p-5 border border-slate-100 flex flex-col justify-between">
                        <div class="space-y-4">
                            <div class="bg-white p-4 rounded-2xl rounded-tl-none border border-slate-200 text-sm font-medium text-slate-700 w-[95%] shadow-sm leading-relaxed">
                                Bonjour l'éleveur ! Doutes sur la quantité de sang requise ou sur nos délais PCR actuels ?
                            </div>
                        </div>
                        <div class="mt-6 flex gap-2">
                            <input type="text" disabled placeholder="Saisir votre question..." class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm cursor-not-allowed text-slate-400">
                            <button disabled class="bg-slate-200 text-slate-400 px-4 py-2 rounded-xl cursor-not-allowed">
                                <svg class="w-5 h-5 transform rotate-45 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            </button>
                        </div>
                        <a href="#" class="block text-center text-xs font-bold text-purple-600 hover:text-purple-800 mt-4 underline decoration-purple-300 underline-offset-4">Débloquer les échanges illimités avec BioScan PRO</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
