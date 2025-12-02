<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Éducatif - Apprendre en s'amusant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap');
        
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        .animate-bounce-slow {
            animation: bounce 2s infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-sky-50 via-green-50 to-yellow-50">
    
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-2 cursor-pointer">
                    <h1 class="text-2xl font-bold text-amber-600">Zoo Éducatif</h1>
                </div>

                <div class="hidden md:flex gap-6 flex-1 justify-center">
                    <button class="hover:text-amber-600 transition font-semibold">Accueil</button>
                    <button class="hover:text-amber-600 transition font-semibold">Animaux</button>
                    <button class="hover:text-amber-600 transition font-semibold">Statistiques</button>
                    <button class="hover:text-amber-600 transition font-semibold">Jeu Quiz</button>
                </div>

                <div class="flex items-center gap-4">
                    <button class="px-3 py-1 bg-amber-100 rounded-full font-semibold text-amber-700 hover:bg-amber-200 transition">
                        EN
                    </button>
                    <button class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition font-semibold">
                        Admin
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="h-screen flex items-center justify-center bg-gradient-to-br from-sky-200 via-green-200 to-yellow-200">
        <div class="text-center">
            <h1 class="text-7xl font-bold text-amber-700 mb-4 drop-shadow-lg">Bienvenue au Zoo!</h1>
            <p class="text-3xl text-green-700 mb-8">Découvre les animaux, leurs habitats et apprends en t'amusant!</p>
            <div class="flex justify-center gap-4">
                <button class="px-8 py-4 bg-orange-500 text-white rounded-2xl font-bold text-xl hover:bg-orange-600 transform hover:scale-105 transition shadow-lg">
                    Découvrir
                </button>
                <button class="px-8 py-4 bg-green-500 text-white rounded-2xl font-bold text-xl hover:bg-green-600 transform hover:scale-105 transition shadow-lg">
                    Jouer
                </button>
            </div>
        </div>
    </section>

    <!-- Animal Gallery Section -->
    <section class="min-h-screen bg-gradient-to-br from-sky-100 via-green-100 to-yellow-100 p-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-5xl font-bold text-center text-amber-700 mb-8">Galerie des Animaux</h2>

            <!-- Filters -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <label class="block font-bold text-amber-700 mb-2">Chercher</label>
                        <input type="text" placeholder="Nom de l'animal..." 
                               class="w-full px-4 py-2 border-2 border-green-300 rounded-lg focus:outline-none focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block font-bold text-amber-700 mb-2">Habitat</label>
                        <select class="w-full px-4 py-2 border-2 border-green-300 rounded-lg focus:outline-none focus:border-orange-500">
                            <option>Tous</option>
                            <option>Savane</option>
                            <option>Jungle</option>
                            <option>Désert</option>
                            <option>Océan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-amber-700 mb-2">Type alimentaire</label>
                        <select class="w-full px-4 py-2 border-2 border-green-300 rounded-lg focus:outline-none focus:border-orange-500">
                            <option>Tous</option>
                            <option>Carnivore</option>
                            <option>Herbivore</option>
                            <option>Omnivore</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Animal Cards -->
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition">
                    <div class="bg-gradient-to-r from-orange-300 to-yellow-300 p-8 flex justify-center h-40">
                        <span class="text-7xl">🦁</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-amber-700 mb-2">Lion</h3>
                        <p class="text-gray-600 mb-4">Le roi de la savane, puissant et majestueux</p>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-green-700">Habitat:</span>
                                <span class="px-3 py-1 bg-yellow-300 text-yellow-900 rounded-full font-semibold">Savane</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-green-700">Type:</span>
                                <span class="px-3 py-1 bg-blue-300 text-blue-900 rounded-full font-semibold">Carnivore</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition">
                    <div class="bg-gradient-to-r from-orange-300 to-yellow-300 p-8 flex justify-center h-40">
                        <span class="text-7xl">🐘</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-amber-700 mb-2">Éléphant</h3>
                        <p class="text-gray-600 mb-4">Le plus grand animal terrestre avec une mémoire légendaire</p>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-green-700">Habitat:</span>
                                <span class="px-3 py-1 bg-yellow-300 text-yellow-900 rounded-full font-semibold">Savane</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-green-700">Type:</span>
                                <span class="px-3 py-1 bg-blue-300 text-blue-900 rounded-full font-semibold">Herbivore</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition">
                    <div class="bg-gradient-to-r from-orange-300 to-yellow-300 p-8 flex justify-center h-40">
                        <span class="text-7xl">🦒</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-amber-700 mb-2">Girafe</h3>
                        <p class="text-gray-600 mb-4">L'animal le plus grand avec son long cou unique</p>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-green-700">Habitat:</span>
                                <span class="px-3 py-1 bg-yellow-300 text-yellow-900 rounded-full font-semibold">Savane</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-green-700">Type:</span>
                                <span class="px-3 py-1 bg-blue-300 text-blue-900 rounded-full font-semibold">Herbivore</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition">
                    <div class="bg-gradient-to-r from-green-400 to-emerald-400 p-8 flex justify-center h-40">
                        <span class="text-7xl">🐵</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-amber-700 mb-2">Singe</h3>
                        <p class="text-gray-600 mb-4">Intelligent et amusant, toujours actif</p>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-green-700">Habitat:</span>
                                <span class="px-3 py-1 bg-green-400 text-green-900 rounded-full font-semibold">Jungle</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-green-700">Type:</span>
                                <span class="px-3 py-1 bg-blue-300 text-blue-900 rounded-full font-semibold">Omnivore</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition">
                    <div class="bg-gradient-to-r from-blue-400 to-cyan-400 p-8 flex justify-center h-40">
                        <span class="text-7xl">🦈</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-amber-700 mb-2">Requin</h3>
                        <p class="text-gray-600 mb-4">Le prédateur des mers, rapide et puissant</p>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-green-700">Habitat:</span>
                                <span class="px-3 py-1 bg-blue-400 text-blue-900 rounded-full font-semibold">Océan</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-green-700">Type:</span>
                                <span class="px-3 py-1 bg-blue-300 text-blue-900 rounded-full font-semibold">Carnivore</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition">
                    <div class="bg-gradient-to-r from-orange-200 to-amber-200 p-8 flex justify-center h-40">
                        <span class="text-7xl">🐪</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-amber-700 mb-2">Chameau</h3>
                        <p class="text-gray-600 mb-4">Expert du désert, peut survivre sans eau longtemps</p>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-green-700">Habitat:</span>
                                <span class="px-3 py-1 bg-orange-300 text-orange-900 rounded-full font-semibold">Désert</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-green-700">Type:</span>
                                <span class="px-3 py-1 bg-blue-300 text-blue-900 rounded-full font-semibold">Herbivore</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="min-h-screen bg-gradient-to-br from-sky-100 via-green-100 to-yellow-100 p-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-5xl font-bold text-center text-amber-700 mb-8">Statistiques du Zoo</h2>

            <!-- Stats Cards -->
            <div class="grid md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center transform hover:scale-105 transition">
                    <div class="text-4xl mb-3">🦁</div>
                    <div class="text-4xl font-bold text-amber-600 mb-2">6</div>
                    <p class="text-gray-700 font-semibold">Total Animaux</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center transform hover:scale-105 transition">
                    <div class="text-4xl mb-3">🏜️</div>
                    <div class="text-4xl font-bold text-amber-600 mb-2">4</div>
                    <p class="text-gray-700 font-semibold">Habitats</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center transform hover:scale-105 transition">
                    <div class="text-4xl mb-3">🦈</div>
                    <div class="text-4xl font-bold text-amber-600 mb-2">2</div>
                    <p class="text-gray-700 font-semibold">Carnivores</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center transform hover:scale-105 transition">
                    <div class="text-4xl mb-3">🦒</div>
                    <div class="text-4xl font-bold text-amber-600 mb-2">3</div>
                    <p class="text-gray-700 font-semibold">Herbivores</p>
                </div>
            </div>

            <!-- Distribution Chart -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h3 class="text-3xl font-bold text-amber-700 mb-6">Distribution par Habitat</h3>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-bold text-gray-800">Savane</span>
                            <span class="font-bold text-amber-600">3</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-6">
                            <div class="bg-yellow-300 h-6 rounded-full" style="width: 100%">
                                <span class="text-sm font-bold text-yellow-900">3</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-bold text-gray-800">Jungle</span>
                            <span class="font-bold text-amber-600">1</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-6">
                            <div class="bg-green-400 h-6 rounded-full" style="width: 33.33%">
                                <span class="text-sm font-bold text-green-900">1</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-bold text-gray-800">Désert</span>
                            <span class="font-bold text-amber-600">1</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-6">
                            <div class="bg-orange-300 h-6 rounded-full" style="width: 33.33%">
                                <span class="text-sm font-bold text-orange-900">1</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-bold text-gray-800">Océan</span>
                            <span class="font-bold text-amber-600">1</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-6">
                            <div class="bg-blue-400 h-6 rounded-full" style="width: 33.33%">
                                <span class="text-sm font-bold text-blue-900">1</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quiz Game Section -->
    <section class="min-h-screen bg-gradient-to-br from-sky-100 via-green-100 to-yellow-100 p-8 flex items-center justify-center">
        <div class="bg-white rounded-3xl shadow-2xl p-12 max-w-2xl w-full">
            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-bold text-amber-700">Question 1/3</span>
                    <span class="text-lg font-bold text-green-600">Score: 0</span>
                </div>
                <div class="w-full bg-gray-300 rounded-full h-3">
                    <div class="bg-orange-500 h-3 rounded-full" style="width: 33.33%"></div>
                </div>
            </div>

            <h2 class="text-3xl font-bold text-amber-700 mb-8 text-center">Quel animal mange de la viande?</h2>

            <div class="space-y-4 mb-8">
                <button class="w-full p-6 rounded-2xl font-bold text-lg bg-gradient-to-r from-sky-300 to-green-300 text-gray-800 hover:shadow-lg transition transform hover:scale-105">
                    Lion
                </button>
                <button class="w-full p-6 rounded-2xl font-bold text-lg bg-gradient-to-r from-sky-300 to-green-300 text-gray-800 hover:shadow-lg transition transform hover:scale-105">
                    Girafe
                </button>
                <button class="w-full p-6 rounded-2xl font-bold text-lg bg-gradient-to-r from-sky-300 to-green-300 text-gray-800 hover:shadow-lg transition transform hover:scale-105">
                    Chameau
                </button>
            </div>
        </div>
    </section>

    <!-- Admin Section -->
    <section class="min-h-screen bg-gradient-to-br from-sky-100 via-green-100 to-yellow-100 p-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-5xl font-bold text-center text-amber-700 mb-8">Panneau d'Administration</h2>

            <!-- Tab Navigation -->
            <div class="flex gap-4 mb-8 justify-center">
                <button class="px-6 py-2 bg-orange-500 text-white rounded-lg font-semibold hover:bg-orange-600">
                    Gérer Animaux
                </button>
                <button class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-400">
                    Gérer Habitats
                </button>
            </div>

            <!-- Add Animal Form -->
            <div class="bg-white rounded-2xl shadow-xl p-8 max-w-2xl mx-auto">
                <h3 class="text-2xl font-bold text-amber-700 mb-6">Ajouter un nouvel animal</h3>
                
                <form class="space-y-4">
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Nom (FR)</label>
                        <input type="text" placeholder="Ex: Lion" 
                               class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Nom (EN)</label>
                        <input type="text" placeholder="Ex: Lion" 
                               class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Habitat</label>
                        <select class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                            <option>Savane</option>
                            <option>Jungle</option>
                            <option>Désert</option>
                            <option>Océan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Type alimentaire</label>
                        <select class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                            <option>Carnivore</option>
                            <option>Herbivore</option>
                            <option>Omnivore</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Description (FR)</label>
                        <textarea placeholder="Description..." rows="3"
                                  class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500"></textarea>
                    </div>
                    <button type="submit" class="w-full px-6 py-3 bg-orange-500 text-white rounded-lg font-bold hover:bg-orange-600 transition">
                        Ajouter l'animal
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-8">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-lg mb-4">Zoo Éducatif - Plateforme d'apprentissage interactive pour les enfants</p>
            <p class="text-gray-400">© 2025 Zoo Éducatif. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
