<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 min-h-screen flex flex-col">
    <!-- En-tête -->
    <header class="bg-white dark:bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-primary-600 dark:text-primary-400">
                        <i class="fas fa-user-shield mr-2"></i>MonProfil
                    </h1>
                </div>
                <nav class="flex space-x-4">
                    <a href="#" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-home mr-1"></i> Accueil
                    </a>
                    <a href="#" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-cog mr-1"></i> Paramètres
                    </a>
                    <a href="#" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-bell mr-1"></i> Notifications
                    </a>
                </nav>
                <div class="flex items-center">
                    <div class="ml-3 relative">
                        <button class="flex text-sm rounded-full focus:outline-none">
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="flex-grow py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <h2 class="font-semibold text-2xl text-primary-600 dark:text-primary-400 leading-tight">
                    <i class="fas fa-user-circle mr-2"></i>Profil Utilisateur
                </h2>
            </div>

            <div class="grid grid-cols-1 gap-8">
                <!-- Section informations profil -->
                <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-xl rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700">
                    <div class="p-6 sm:p-8">
                        <header class="mb-6">
                            <div class="flex items-center mb-4">
                                <div class="p-3 rounded-lg bg-primary-50 dark:bg-gray-700 mr-4">
                                    <i class="fas fa-user text-primary-600 dark:text-primary-400 text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">
                                        Informations du Profil
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Mettez à jour les informations de votre compte et votre adresse e-mail.
                                    </p>
                                </div>
                            </div>
                        </header>

                        <form class="mt-6 space-y-6">
                            <div class="space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Nom complet
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-user text-gray-400"></i>
                                        </div>
                                        <input id="name" name="name" type="text" class="pl-10 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-200 focus:ring-opacity-50 py-2 px-4" 
                                               placeholder="Votre nom complet" value="Alexandre Dubois">
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        Utilisez votre vrai nom pour que les autres puissent vous reconnaître.
                                    </p>
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Adresse e-mail
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-envelope text-gray-400"></i>
                                        </div>
                                        <input id="email" name="email" type="email" class="pl-10 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-200 focus:ring-opacity-50 py-2 px-4" 
                                               placeholder="Votre adresse e-mail" value="alex.dubois@example.com">
                                    </div>
                                </div>

                                <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-400 dark:border-yellow-600 p-4 rounded-lg">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-exclamation-circle text-yellow-400 text-xl"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-yellow-700 dark:text-yellow-400">
                                                Votre adresse e-mail n'est pas vérifiée.
                                                <button class="ml-2 font-medium underline text-yellow-700 dark:text-yellow-400 hover:text-yellow-600 dark:hover:text-yellow-300">
                                                    Cliquez ici pour renvoyer l'e-mail de vérification.
                                                </button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4">
                                <button type="submit" class="flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white rounded-lg shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                                    <i class="fas fa-save mr-2"></i> Enregistrer les modifications
                                </button>
                                
                                <div class="flex items-center">
                                    <div class="h-4 w-4 rounded-full bg-green-500 mr-2 animate-pulse"></div>
                                    <span class="text-sm text-green-600 dark:text-green-400 font-medium">Modifications enregistrées !</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Section mot de passe -->
                <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-xl rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700">
                    <div class="p-6 sm:p-8">
                        <header class="mb-6">
                            <div class="flex items-center mb-4">
                                <div class="p-3 rounded-lg bg-primary-50 dark:bg-gray-700 mr-4">
                                    <i class="fas fa-lock text-primary-600 dark:text-primary-400 text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">
                                        Mise à jour du mot de passe
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.
                                    </p>
                                </div>
                            </div>
                        </header>

                        <form class="mt-6 space-y-6">
                            <div class="space-y-4">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Mot de passe actuel
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-key text-gray-400"></i>
                                        </div>
                                        <input id="current_password" name="current_password" type="password" class="pl-10 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-200 focus:ring-opacity-50 py-2 px-4" 
                                               placeholder="Votre mot de passe actuel">
                                    </div>
                                </div>

                                <div>
                                    <label for="new_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Nouveau mot de passe
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-gray-400"></i>
                                        </div>
                                        <input id="new_password" name="new_password" type="password" class="pl-10 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-200 focus:ring-opacity-50 py-2 px-4" 
                                               placeholder="Votre nouveau mot de passe">
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        Le mot de passe doit contenir au moins 8 caractères avec des chiffres et des symboles.
                                    </p>
                                </div>

                                <div>
                                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Confirmer le mot de passe
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-gray-400"></i>
                                        </div>
                                        <input id="confirm_password" name="confirm_password" type="password" class="pl-10 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-200 focus:ring-opacity-50 py-2 px-4" 
                                               placeholder="Confirmer votre nouveau mot de passe">
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4">
                                <button type="submit" class="flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white rounded-lg shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                                    <i class="fas fa-sync-alt mr-2"></i> Mettre à jour le mot de passe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Section suppression compte -->
                <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-xl rounded-2xl overflow-hidden border border-red-200 dark:border-red-900/50">
                    <div class="p-6 sm:p-8">
                        <header class="mb-6">
                            <div class="flex items-center mb-4">
                                <div class="p-3 rounded-lg bg-red-50 dark:bg-red-900/20 mr-4">
                                    <i class="fas fa-exclamation-triangle text-red-600 dark:text-red-400 text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">
                                        Supprimer le compte
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées.
                                    </p>
                                </div>
                            </div>
                        </header>

                        <div class="mt-6 space-y-6">
                            <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 dark:border-red-600 p-4 rounded-lg">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-red-700 dark:text-red-400">
                                            Après la suppression de votre compte, vous perdrez l'accès à toutes vos données et ne pourrez pas récupérer votre compte.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="button" class="px-4 py-2.5 bg-red-50 dark:bg-gray-700 border border-red-200 dark:border-red-900 text-red-700 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors">
                                    <i class="fas fa-trash-alt mr-2"></i> Supprimer mon compte
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Pied de page -->
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex justify-center md:justify-start">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        © 2023 MonProfil. Tous droits réservés.
                    </p>
                </div>
                <div class="mt-4 flex justify-center md:mt-0">
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bouton dark/light mode -->
    <button id="theme-toggle" class="fixed bottom-6 right-6 p-3 bg-white dark:bg-gray-700 rounded-full shadow-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
        <i class="fas fa-moon dark:hidden"></i>
        <i class="fas fa-sun hidden dark:block"></i>
    </button>

    <script>
        // Toggle dark mode
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            const isDark = document.documentElement.classList.contains('dark');
            localStorage.setItem('darkMode', isDark);
        });

        // Load saved theme preference
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        }
    </script>
</body>
</html>