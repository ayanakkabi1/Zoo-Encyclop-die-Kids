<?php
include "config/database.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Éducatif - Apprendre en s'amusant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
        * { font-family: 'Poppins', sans-serif; }
        
        /* Animation pour les popups */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .popup-animation {
            animation: fadeIn 0.3s ease-out;
        }
        
        /* Animation pour les transitions de page */
        .page-transition {
            transition: opacity 0.3s ease-in-out;
        }
        
        /* Style pour brown qui manque dans Tailwind */
        .bg-brown-500 {
            background-color: #92400e;
        }
        
        /* Page cachée */
        .page-hidden {
            display: none !important;
        }
        
        /* Style pour le statut du quiz */
        .correct {
            background-color: #d1fae5 !important;
            border-color: #10b981 !important;
        }
        
        .incorrect {
            background-color: #fee2e2 !important;
            border-color: #ef4444 !important;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-green-50">
    
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-2">
                    <h1 class="text-2xl font-bold text-orange-600">Zoo Éducatif</h1>
                </div>
                <div class="hidden md:flex gap-6">
                    <a href="#page-accueil" class="page-link font-semibold hover:text-orange-600 transition-colors" data-page="accueil">Accueil</a>
                    <a href="#page-animaux" class="page-link font-semibold hover:text-orange-600 transition-colors" data-page="animaux">Animaux</a>
                    <a href="#page-statistiques" class="page-link font-semibold hover:text-orange-600 transition-colors" data-page="statistiques">Statistiques</a>
                    <a href="#page-quiz" class="page-link font-semibold hover:text-orange-600 transition-colors" data-page="quiz">Quiz</a>
                </div>
                <button id="admin-btn" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 font-semibold transition-colors">
                    Ajouter
                </button>
            </div>
        </div>
    </nav>

    <!-- Page d'accueil -->
    <section id="page-accueil" class="page min-h-screen flex items-center justify-center px-4">
        <div class="text-center max-w-4xl">
            <h1 class="text-4xl md:text-6xl font-bold text-green-800 mb-6">Bienvenue au Zoo Éducatif !</h1>
            <p class="text-lg md:text-2xl text-gray-700 mb-10">Découvre les animaux et apprends en t'amusant</p>
            <div class="flex flex-wrap justify-center gap-4">
                <button data-page="animaux" class="page-link px-8 py-3 bg-green-500 text-white rounded-xl font-bold text-lg hover:bg-green-600 transition-colors">
                    Voir les animaux
                </button>
                <button data-page="quiz" class="page-link px-8 py-3 bg-orange-500 text-white rounded-xl font-bold text-lg hover:bg-orange-600 transition-colors">
                    Jouer au quiz
                </button>
            </div>
        </div>
    </section>

    <!-- Page des animaux -->
    <section id="page-animaux" class="page py-16 px-4 bg-gray-50 page-hidden">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold text-center text-green-800 mb-10">Nos Animaux</h2>
            
            <!-- Filtres -->
            <div class="bg-white rounded-xl p-6 mb-8 shadow">
                <div class="grid md:grid-cols-3 gap-4">
                    <input type="text" placeholder="Rechercher un animal..." 
                           class="p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" 
                           id="search-animal">
                    <select class="p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" 
                            id="filter-habitat">
                        <option value="">Tous les habitats</option>
                        <!-- Les habitats seront chargés dynamiquement en PHP -->
                    </select>
                    <select class="p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" 
                            id="filter-regime">
                        <option value="">Tous les régimes</option>
                        <!-- Les régimes seront chargés dynamiquement en PHP -->
                    </select>
                </div>
            </div>

            <!-- Cartes animaux -->
            <div id="animals-container" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Les animaux seront chargés dynamiquement en PHP -->
                <div class="text-center py-12 col-span-3">
                    <p class="text-gray-600">Chargement des animaux...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Page des statistiques -->
    <section id="page-statistiques" class="page py-16 px-4 page-hidden">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold text-center text-green-800 mb-10">Statistiques</h2>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="bg-white p-8 rounded-xl shadow text-center">
                    <div class="text-4xl text-orange-600 mb-2" id="total-animals">0</div>
                    <p class="text-gray-700">Animaux</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow text-center">
                    <div class="text-4xl text-orange-600 mb-2" id="total-habitats">0</div>
                    <p class="text-gray-700">Habitats</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow text-center">
                    <div class="text-4xl text-orange-600 mb-2" id="total-carnivores">0</div>
                    <p class="text-gray-700">Carnivores</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow text-center">
                    <div class="text-4xl text-orange-600 mb-2" id="total-herbivores">0</div>
                    <p class="text-gray-700">Herbivores</p>
                </div>
            </div>
            
            <!-- Graphique des habitats -->
            <div class="mt-12 bg-white p-8 rounded-xl shadow">
                <h3 class="text-2xl font-bold text-green-800 mb-6">Répartition par habitat</h3>
                <div id="habitat-chart" class="flex items-end h-48 gap-4">
                    <!-- Le graphique sera généré dynamiquement en PHP -->
                </div>
            </div>
        </div>
    </section>

    <!-- Page du quiz -->
    <section id="page-quiz" class="page py-16 px-4 bg-gray-50 page-hidden">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-4xl font-bold text-center text-green-800 mb-10">Quiz du Zoo</h2>
            <div id="quiz-container" class="bg-white rounded-2xl shadow-xl p-8">
                <div class="text-center py-12">
                    <p class="text-gray-600">Le quiz sera chargé ici...</p>
                </div>
            </div>
            
            <div class="mt-8 text-center">
                <button id="restart-quiz" class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 font-semibold transition-colors">
                    Recommencer le quiz
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-800 text-white py-8 text-center">
        <p class="text-lg">Zoo Éducatif © 2025 - Tous droits réservés</p>
    </footer>

    <!-- Popup d'ajout -->
    <div id="add-popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 page-hidden" >
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 popup-animation">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-green-800">Ajouter un élément</h3>
                    <button id="close-popup" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
                </div>
                
                <div id="choice-buttons" class="mb-6">
                    <p class="text-gray-700 mb-4">Que souhaitez-vous ajouter ?</p>
                    <div class="flex gap-4">
                        <button id="add-animal-btn" class="flex-1 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 font-semibold transition-colors">
                            Animal
                        </button>
                        <button id="add-habitat-btn" class="flex-1 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 font-semibold transition-colors">
                            Habitat
                        </button>
                    </div>
                </div>
                
                <!-- Formulaire pour ajouter un animal -->
                <form id="animal-form" class="space-y-4 page-hidden"  action="pagesphp/data.php" method="POST">
                    <h4 class="text-xl font-bold text-green-700 mb-4">Nouvel animal</h4>
                    <div>
                        <label class="block text-gray-700 mb-2">Nom de l'animal</label>
                        <input type="text" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" id="animal-name" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Image URL</label>
                        <input type="text" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" id="animal-image" placeholder="https://example.com/image.jpg">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Habitat</label>
                        <select class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" id="animal-habitat" required>
                            <!-- Les habitats seront chargés dynamiquement en PHP -->
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Régime alimentaire</label>
                        <select class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" id="animal-diet" required>
                            <option value="">Sélectionnez un régime</option>
                            <option value="Carnivore">Carnivore</option>
                            <option value="Herbivore">Herbivore</option>
                            <option value="Omnivore">Omnivore</option>
                        </select>
                    </div>
                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="flex-1 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 font-semibold transition-colors">
                            Ajouter l'animal
                        </button>
                        <button type="button" id="cancel-animal" class="flex-1 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 font-semibold transition-colors">
                            Annuler
                        </button>
                    </div>
                </form>
                
                <!-- Formulaire pour ajouter un habitat -->
                <form id="habitat-form" class="space-y-4 page-hidden" action="pagesphp/data.php" method="POST">
                    <h4 class="text-xl font-bold text-green-700 mb-4">Nouvel habitat</h4>
                    <div>
                        <label class="block text-gray-700 mb-2">Nom de l'habitat</label>
                        <input type="text" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" id="habitat-name" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Description</label>
                        <textarea class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" id="habitat-description" rows="3"></textarea>
                    </div>
                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="flex-1 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 font-semibold transition-colors">
                            Ajouter l'habitat
                        </button>
                        <button type="button" id="cancel-habitat" class="flex-1 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 font-semibold transition-colors">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Variables globales
        let currentPage = 'accueil';
        let currentQuizQuestion = 0;
        let quizScore = 0;
        let quizQuestions = [];

        // Éléments DOM
        const pages = document.querySelectorAll('.page');
        const pageLinks = document.querySelectorAll('.page-link');
        const adminBtn = document.getElementById('admin-btn');
        const addPopup = document.getElementById('add-popup');
        const closePopupBtn = document.getElementById('close-popup');
        const addAnimalBtn = document.getElementById('add-animal-btn');
        const addHabitatBtn = document.getElementById('add-habitat-btn');
        const animalForm = document.getElementById('animal-form');
        const habitatForm = document.getElementById('habitat-form');
        const cancelAnimalBtn = document.getElementById('cancel-animal');
        const cancelHabitatBtn = document.getElementById('cancel-habitat');
        const searchAnimalInput = document.getElementById('search-animal');
        const filterHabitatSelect = document.getElementById('filter-habitat');
        const filterRegimeSelect = document.getElementById('filter-regime');
        const animalsContainer = document.getElementById('animals-container');
        const quizContainer = document.getElementById('quiz-container');
        const restartQuizBtn = document.getElementById('restart-quiz');
        const choiceButtons = document.getElementById('choice-buttons');

        // Navigation entre les pages
        pageLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetPage = link.dataset.page;
                navigateToPage(targetPage);
            });
        });

        // Fonction de navigation
        function navigateToPage(pageName) {
            // Cacher toutes les pages
            pages.forEach(page => {
                page.classList.add('page-hidden');
            });
            
            // Afficher la page cible
            const targetPage = document.getElementById(`page-${pageName}`);
            if (targetPage) {
                targetPage.classList.remove('page-hidden');
                
                // Mettre à jour la navigation active
                pageLinks.forEach(link => {
                    link.classList.remove('text-orange-600', 'underline');
                    if (link.dataset.page === pageName) {
                        link.classList.add('text-orange-600');
                    }
                });
                
                currentPage = pageName;
                
                // Charger le contenu spécifique à la page
                if (pageName === 'animaux') {
                    loadAnimals();
                } else if (pageName === 'quiz') {
                    loadQuiz();
                } else if (pageName === 'statistiques') {
                    loadStatistics();
                }
            }
        }

        async function loadAnimals() {
            try {
                const response = await fetch('api/get_animals.php');
                const animals = await response.json();
                
                renderAnimals(animals);
                populateFilters(animals);
            } catch (error) {
                console.error('Erreur lors du chargement des animaux:', error);
                animalsContainer.innerHTML = `
                    <div class="col-span-3 text-center py-12">
                        <p class="text-red-600">Erreur de chargement des animaux</p>
                    </div>
                `;
            }
        }

        // Afficher les animaux
        function renderAnimals(animals) {
            if (!animals || animals.length === 0) {
                animalsContainer.innerHTML = `
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-600 text-xl">Aucun animal trouvé</p>
                    </div>
                `;
                return;
            }
            
            animalsContainer.innerHTML = animals.map(animal => `
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="${animal.image || getDefaultImage(animal.name)}" 
                             alt="${animal.name}" 
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">${animal.name}</h3>
                        <p class="text-gray-600 mb-4">${animal.description}</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">${animal.habitat}</span>
                            <span class="px-3 py-1 ${getDietColorClass(animal.diet)} rounded-full text-sm">${animal.diet}</span>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <button class="edit-animal px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm" 
                                    data-id="${animal.id}">
                                Modifier
                            </button>
                            <button class="delete-animal px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 text-sm" 
                                    data-id="${animal.id}">
                                Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
            
            // Ajouter les écouteurs d'événements pour les boutons d'action
            document.querySelectorAll('.edit-animal').forEach(btn => {
                btn.addEventListener('click', (e) => editAnimal(e.target.dataset.id));
            });
            
            document.querySelectorAll('.delete-animal').forEach(btn => {
                btn.addEventListener('click', (e) => deleteAnimal(e.target.dataset.id));
            });
        }

        // Remplir les filtres
        function populateFilters(animals) {
            // Récupérer les habitats uniques
            const habitats = [...new Set(animals.map(animal => animal.habitat))];
            filterHabitatSelect.innerHTML = '<option value="">Tous les habitats</option>' + 
                habitats.map(habitat => `<option value="${habitat}">${habitat}</option>`).join('');
            
            // Récupérer les régimes uniques
            const regimes = [...new Set(animals.map(animal => animal.diet))];
            filterRegimeSelect.innerHTML = '<option value="">Tous les régimes</option>' + 
                regimes.map(regime => `<option value="${regime}">${regime}</option>`).join('');
        }

        // Fonction helper pour obtenir la couleur selon le régime
        function getDietColorClass(diet) {
            switch(diet) {
                case 'Carnivore': return 'bg-red-100 text-red-800';
                case 'Herbivore': return 'bg-green-100 text-green-800';
                case 'Omnivore': return 'bg-blue-100 text-blue-800';
                default: return 'bg-gray-100 text-gray-800';
            }
        }

        // Fonction helper pour obtenir une image par défaut
        function getDefaultImage(animalName) {
            const emojiMap = {
                'lion': '🦁', 'éléphant': '🐘', 'girafe': '🦒', 'panda': '🐼',
                'tigre': '🐅', 'singe': '🐒', 'chameau': '🐪', 'loup': '🐺'
            };
            
            const emoji = emojiMap[animalName.toLowerCase()] || '🐾';
            return `data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100'><text x='50%' y='50%' font-size='60' text-anchor='middle' dy='.3em'>${emoji}</text></svg>`;
        }

        // Charger les statistiques
        async function loadStatistics() {
            try {
                // Simuler un appel API
                const response = await fetch('api/get_statistics.php');
                const stats = await response.json();
                
                document.getElementById('total-animals').textContent = stats.totalAnimals || 0;
                document.getElementById('total-habitats').textContent = stats.totalHabitats || 0;
                document.getElementById('total-carnivores').textContent = stats.totalCarnivores || 0;
                document.getElementById('total-herbivores').textContent = stats.totalHerbivores || 0;
                
                // Générer le graphique des habitats
                generateHabitatChart(stats.habitatDistribution || []);
            } catch (error) {
                console.error('Erreur lors du chargement des statistiques:', error);
            }
        }

        // Générer le graphique des habitats
        function generateHabitatChart(distribution) {
            const chartContainer = document.getElementById('habitat-chart');
            
            if (!distribution || distribution.length === 0) {
                chartContainer.innerHTML = '<p class="text-gray-600">Aucune donnée disponible</p>';
                return;
            }
            
            const maxCount = Math.max(...distribution.map(d => d.count));
            
            chartContainer.innerHTML = distribution.map(item => `
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-full bg-green-500 rounded-t-lg transition-all duration-500" 
                         style="height: ${(item.count / maxCount) * 80}%">
                    </div>
                    <span class="mt-2 text-sm font-medium">${item.habitat}</span>
                    <span class="text-xs text-gray-600">${item.count}</span>
                </div>
            `).join('');
        }

        // Charger le quiz
        async function loadQuiz() {
            try {
                // Simuler un appel API
                const response = await fetch('api/get_quiz_questions.php');
                quizQuestions = await response.json();
                
                startQuiz();
            } catch (error) {
                console.error('Erreur lors du chargement du quiz:', error);
                quizContainer.innerHTML = `
                    <div class="text-center py-12">
                        <p class="text-red-600">Erreur de chargement du quiz</p>
                    </div>
                `;
            }
        }

        // Démarrer le quiz
        function startQuiz() {
            currentQuizQuestion = 0;
            quizScore = 0;
            loadQuizQuestion();
        }

        function loadQuizQuestion() {
            if (currentQuizQuestion >= quizQuestions.length) {
                showQuizResults();
                return;
            }
            
            const question = quizQuestions[currentQuizQuestion];
            
            quizContainer.innerHTML = `
                <div class="mb-6">
                    <div class="flex justify-between mb-2">
                        <span class="font-bold">Question ${currentQuizQuestion + 1}/${quizQuestions.length}</span>
                        <span class="font-bold text-green-600">Score: ${quizScore}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-green-500 h-3 rounded-full transition-all duration-300" 
                             style="width: ${((currentQuizQuestion) / quizQuestions.length) * 100}%"></div>
                    </div>
                </div>
                
                <h3 class="text-2xl font-bold text-center mb-8">${question.question}</h3>
                
                <div class="space-y-4">
                    ${question.options.map((option, index) => `
                        <button class="quiz-option w-full p-4 bg-gray-100 rounded-xl text-left hover:bg-gray-200 transition-colors" 
                                data-answer="${option}">
                            ${option}
                        </button>
                    `).join('')}
                </div>
            `;
            
            // Ajouter les écouteurs d'événements
            document.querySelectorAll('.quiz-option').forEach(button => {
                button.addEventListener('click', (e) => {
                    const selectedAnswer = e.target.dataset.answer;
                    checkAnswer(selectedAnswer, question.correctAnswer);
                });
            });
        }

        function checkAnswer(selectedAnswer, correctAnswer) {
            const buttons = document.querySelectorAll('.quiz-option');
            
            buttons.forEach(button => {
                button.disabled = true;
                const answer = button.dataset.answer;
                
                if (answer === correctAnswer) {
                    button.classList.add('correct');
                } else if (answer === selectedAnswer) {
                    button.classList.add('incorrect');
                }
            });
            
            if (selectedAnswer === correctAnswer) {
                quizScore++;
            }
            
            // Passer à la question suivante
            setTimeout(() => {
                currentQuizQuestion++;
                loadQuizQuestion();
            }, 2000);
        }

        function showQuizResults() {
            const percentage = (quizScore / quizQuestions.length) * 100;
            let emoji, message;
            
            if (percentage >= 90) {
                emoji = '🎉'; message = 'Excellent ! Vous êtes un expert des animaux !';
            } else if (percentage >= 70) {
                emoji = '😊'; message = 'Bon travail ! Continuez à apprendre.';
            } else if (percentage >= 50) {
                emoji = '😐'; message = 'Pas mal ! Vous pouvez faire mieux.';
            } else {
                emoji = '😅'; message = 'Continuez à explorer le zoo pour en apprendre plus !';
            }
            
            quizContainer.innerHTML = `
                <div class="text-center py-12">
                    <h3 class="text-3xl font-bold text-green-800 mb-6">Quiz terminé !</h3>
                    <div class="text-6xl mb-6">${emoji}</div>
                    <p class="text-2xl mb-2">Votre score: <span class="font-bold text-orange-600">${quizScore}/${quizQuestions.length}</span></p>
                    <p class="text-gray-600 mb-8">${message}</p>
                    <button id="retry-quiz" class="px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 font-semibold transition-colors">
                        Recommencer le quiz
                    </button>
                </div>
            `;
            
            document.getElementById('retry-quiz').addEventListener('click', startQuiz);
        }

        // Gestion du popup d'ajout
        adminBtn.addEventListener('click', () => {
            addPopup.classList.remove('page-hidden');
            choiceButtons.classList.remove('page-hidden');
            animalForm.classList.add('page-hidden');
            habitatForm.classList.add('page-hidden');
        });

        closePopupBtn.addEventListener('click', () => {
            addPopup.classList.add('page-hidden');
        });

        addAnimalBtn.addEventListener('click', () => {
            choiceButtons.classList.add('page-hidden');
            animalForm.classList.remove('page-hidden');
            habitatForm.classList.add('page-hidden');
        });

        addHabitatBtn.addEventListener('click', () => {
            choiceButtons.classList.add('page-hidden');
            animalForm.classList.add('page-hidden');
            habitatForm.classList.remove('page-hidden');
        });

        cancelAnimalBtn.addEventListener('click', () => {
            choiceButtons.classList.remove('page-hidden');
            animalForm.classList.add('page-hidden');
            animalForm.reset();
        });

        cancelHabitatBtn.addEventListener('click', () => {
            choiceButtons.classList.remove('page-hidden');
            habitatForm.classList.add('page-hidden');
            habitatForm.reset();
        });

        // Ajout d'un animal (simulé)
        animalForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const animalData = {
                name: document.getElementById('animal-name').value,
                description: document.getElementById('animal-description').value,
                image: document.getElementById('animal-image').value,
                habitat: document.getElementById('animal-habitat').value,
                diet: document.getElementById('animal-diet').value
            };
            
            try {
                // Simuler un appel API pour ajouter l'animal
                const response = await fetch('api/add_animal.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(animalData)
                });
                
                const result = await response.json();
                
                if (result.success) {
                    alert('Animal ajouté avec succès !');
                    animalForm.reset();
                    addPopup.classList.add('page-hidden');
                    
                    // Recharger la liste des animaux
                    if (currentPage === 'animaux') {
                        loadAnimals();
                    }
                } else {
                    alert('Erreur lors de l\'ajout de l\'animal: ' + result.message);
                }
            } catch (error) {
                console.error('Erreur:', error);
                alert('Erreur lors de l\'ajout de l\'animal');
            }
        });

        // Ajout d'un habitat (simulé)
        habitatForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const habitatData = {
                name: document.getElementById('habitat-name').value,
                description: document.getElementById('habitat-description').value,
                image: document.getElementById('habitat-image').value,
                climate: document.getElementById('habitat-climate').value
            };
            
            try {
                // Simuler un appel API pour ajouter l'habitat
                const response = await fetch('api/add_habitat.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(habitatData)
                });
                
                const result = await response.json();
                
                if (result.success) {
                    alert('Habitat ajouté avec succès !');
                    habitatForm.reset();
                    addPopup.classList.add('page-hidden');
                    
                    // Recharger les statistiques
                    if (currentPage === 'statistiques') {
                        loadStatistics();
                    }
                } else {
                    alert('Erreur lors de l\'ajout de l\'habitat: ' + result.message);
                }
            } catch (error) {
                console.error('Erreur:', error);
                alert('Erreur lors de l\'ajout de l\'habitat');
            }
        });

        // Fermer le popup en cliquant à l'extérieur
        addPopup.addEventListener('click', (e) => {
            if (e.target === addPopup) {
                addPopup.classList.add('page-hidden');
            }
        });

        // Filtrage des animaux
        searchAnimalInput.addEventListener('input', filterAnimals);
        filterHabitatSelect.addEventListener('change', filterAnimals);
        filterRegimeSelect.addEventListener('change', filterAnimals);

        function filterAnimals() {
            const searchTerm = searchAnimalInput.value.toLowerCase();
            const habitatFilter = filterHabitatSelect.value;
            const dietFilter = filterRegimeSelect.value;
            
            // Cette fonctionnalité serait implémentée côté serveur en PHP
            // Pour l'instant, nous allons simuler le filtrage
            console.log('Filtrage:', { searchTerm, habitatFilter, dietFilter });
            
            // En production, vous feriez un appel AJAX avec les paramètres de filtre
            // fetch(`api/get_animals.php?search=${searchTerm}&habitat=${habitatFilter}&diet=${dietFilter}`)
        }

        // Fonctions CRUD (à connecter avec votre backend PHP)
        async function editAnimal(id) {
            alert(`Modifier l'animal ${id} - À implémenter avec PHP`);
        }

        async function deleteAnimal(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cet animal ?')) {
                try {
                    // Simuler un appel API pour supprimer
                    const response = await fetch(`api/delete_animal.php?id=${id}`, {
                        method: 'DELETE'
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        alert('Animal supprimé avec succès');
                        loadAnimals();
                    } else {
                        alert('Erreur lors de la suppression: ' + result.message);
                    }
                } catch (error) {
                    console.error('Erreur:', error);
                    alert('Erreur lors de la suppression');
                }
            }
        }

        // Recommencer le quiz
        restartQuizBtn.addEventListener('click', startQuiz);

        // Initialisation
        document.addEventListener('DOMContentLoaded', () => {
            // Charger les données initiales
            loadAnimals();
            loadStatistics();
            loadQuiz();
        });
    </script>
</body>
</html>