<?php
    include("pagesphp/animals.php");
    include("config/database.php");
$animals=getAllAnimals();
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
        /* Ajoutez dans la balise <style> */
.group:hover .group-hover\:opacity-100 {
    opacity: 1;
}

.mini-button {
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.mini-button:hover {
    transform: scale(1.1);
}

.animal-card {
    position: relative;
}

.animal-card:hover {
    transform: translateY(-4px);
    transition: transform 0.3s ease;
}

.floating-buttons {
    position: absolute;
    z-index: 10;
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
            <!-- Cartes animaux - Version avec petits boutons émojis -->
<div id="animals-container" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php if (!empty($animals)): ?>
        <?php foreach ($animals as $animal): ?>
            <div class="bg-white shadow-lg rounded-xl p-6 text-center hover:shadow-xl transition-shadow duration-300 relative animal-card">
                <!-- Boutons en haut à droite -->
                <div class="absolute top-3 right-3 flex gap-1">
                 <a href="pagesphp/animals.php?modify=<?= $animal['ID_Animal'] ?>">
                <button class="modify-animal-btn p-2 bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200 transition-colors text-sm"
                            title="Modifier">
                        ✏️
                    </button>
                    </a>
                    <a href="pagesphp/animals.php?delete=<?= $animal['ID_Animal'] ?>">
                    <button class="delete-animal-btn p-2 bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition-colors text-sm"
                            title="Supprimer">
                        🗑️
                    </button>
                    </a>
                </div>
                
                <img src="<?= $animal['image_animal'] ?>" 
                     alt="<?= $animal['NOM_Animal'] ?>" 
                     class="mx-auto w-32 h-32 rounded-full mb-4 object-cover border-4 border-orange-100">
                <h2 class="text-xl font-bold text-green-800 mb-2"><?= $animal['NOM_Animal'] ?></h2>
                <p class="text-gray-600 mb-1">
                    <span class="font-semibold">Régime:</span> 
                    <span class="px-2 py-1 rounded-full text-sm <?php 
                        echo $animal['Type_Alimentaire'] === 'Carnivore' ? 'bg-red-100 text-red-800' : 
                               ($animal['Type_Alimentaire'] === 'Herbivore' ? 'bg-green-100 text-green-800' : 
                               'bg-blue-100 text-blue-800');
                    ?>">
                        <?= $animal['Type_Alimentaire'] ?>
                    </span>
                </p>
                <p class="text-gray-600">
                    <span class="font-semibold">Habitat:</span> 
                    <?= $animal['Nom_Habitat'] ?? 'Non défini' ?>
                </p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="text-center py-12 col-span-3">
            <p class="text-gray-600">Aucun animal trouvé.</p>
        </div>
    <?php endif; ?>
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
   <div id="add-popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 page-hidden">
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
            <form id="animal-form" class="space-y-4 page-hidden" action="pagesphp/data.php" method="POST">
                
                <input type="hidden" name="action_type" value="ajouter_animal">
                
                <h4 class="text-xl font-bold text-green-700 mb-4">Nouvel animal</h4>
                <div>
                    <label class="block text-gray-700 mb-2">Nom de l'animal</label>
                    <input type="text" name="animal_name" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Image URL</label>
                    <input type="text" name="animal_image" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" placeholder="https://example.com/image.jpg">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Habitat</label>
                    <select name="animal_habitat" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" required>
                          <option value="">-- Choisir Habitat --</option>
        <option value="1">Savane</option>
        <option value="2">Jungle</option>
        <option value="3">Désert</option>
        <option value="4">Océan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Régime alimentaire</label>
                    <select name="animal_diet" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" required>
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
                <!-- ⭐ CHAMP CACHÉ HABITAT ⭐ -->
                <input type="hidden" name="action_type" value="ajouter_habitat">
                
                <h4 class="text-xl font-bold text-green-700 mb-4">Nouvel habitat</h4>
                <div>
                    <label class="block text-gray-700 mb-2">Nom de l'habitat</label>
                    <input type="text" name="habitat_name" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Description</label>
                    <textarea name="habitat_description" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none" rows="3"></textarea>
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
        }
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

    // Fermer le popup en cliquant à l'extérieur
    addPopup.addEventListener('click', (e) => {
        if (e.target === addPopup) {
            addPopup.classList.add('page-hidden');
        }
    });

    // Filtrage des animaux - les formulaires PHP géreront le filtrage
    searchAnimalInput.addEventListener('input', () => {
        // Le filtrage sera géré par PHP via soumission de formulaire
        // Vous pouvez ajouter ici une logique de soumission automatique si souhaité
        console.log('Recherche:', searchAnimalInput.value);
    });

    filterHabitatSelect.addEventListener('change', () => {
        // Le filtrage sera géré par PHP via soumission de formulaire
        console.log('Filtre habitat:', filterHabitatSelect.value);
    });

    filterRegimeSelect.addEventListener('change', () => {
        // Le filtrage sera géré par PHP via soumission de formulaire
        console.log('Filtre régime:', filterRegimeSelect.value);
    });

    // Fonction pour gérer les quiz (si maintenu côté client)
    function loadQuizQuestion() {
        // Cette fonction sera alimentée par PHP
        // Les questions du quiz seront injectées par PHP dans le HTML
        console.log('Chargement question quiz');
    }

    function checkAnswer(selectedAnswer, correctAnswer) {
        // Logique de vérification de réponse
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

    // Recommencer le quiz
    if (restartQuizBtn) {
        restartQuizBtn.addEventListener('click', () => {
            currentQuizQuestion = 0;
            quizScore = 0;
            loadQuizQuestion();
        });
    }

    // Initialisation
    document.addEventListener('DOMContentLoaded', () => {
        // Initialiser l'état de la page actuelle
        console.log('Application initialisée');
        
        // Si vous avez besoin d'initialiser des écouteurs d'événements supplémentaires
        // pour les éléments générés dynamiquement par PHP, faites-le ici
    });

    // Fonction helper pour obtenir la couleur selon le régime (peut être utile pour le style)
    function getDietColorClass(diet) {
        switch(diet) {
            case 'Carnivore': return 'bg-red-100 text-red-800';
            case 'Herbivore': return 'bg-green-100 text-green-800';
            case 'Omnivore': return 'bg-blue-100 text-blue-800';
            default: return 'bg-gray-100 text-gray-800';
        }
    }
</script>
</body>
</html>