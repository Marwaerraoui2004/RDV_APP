<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres de mon compte</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f0f7ff 0%, #f5f9ff 100%);
            min-height: 100vh;
            color: #333;
            padding: 20px;
        }
        
        .settings-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 30px;
        }
        
        .settings-header {
            text-align: center;
            margin-bottom: 40px;
            padding-top: 20px;
            grid-column: 1 / -1;
        }
        
        .settings-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 10px;
            background: linear-gradient(90deg, #3a86ff, #8338ec);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }
        
        .settings-header p {
            color: #718096;
            font-size: 1.1rem;
        }
        
        .settings-sidebar {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 30px 0;
            height: fit-content;
            position: sticky;
            top: 30px;
        }
        
        .user-profile-card {
            text-align: center;
            padding: 0 25px 25px;
            border-bottom: 1px solid #f0f4f8;
            margin-bottom: 20px;
        }
        
        .user-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3a86ff, #8338ec);
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: 600;
        }
        
        .user-name {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: #2d3748;
        }
        
        .user-role {
            color: #718096;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
        
        .nav-item {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: #718096;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }
        
        .nav-item:hover, .nav-item.active {
            background: rgba(58, 134, 255, 0.05);
            color: #3a86ff;
            border-left: 4px solid #3a86ff;
        }
        
        .nav-item i {
            font-size: 1.2rem;
            width: 30px;
        }
        
        .settings-content {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 40px;
            margin-bottom: 30px;
        }
        
        .section-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .section-title i {
            color: #3a86ff;
            background: rgba(58, 134, 255, 0.1);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 10px;
            color: #4a5568;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .form-group label i {
            color: #718096;
            font-size: 1rem;
        }
        
        input, select {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        input:focus, select:focus {
            border-color: #3a86ff;
            outline: none;
            box-shadow: 0 0 0 4px rgba(58, 134, 255, 0.15);
        }
        
        .password-toggle {
            position: relative;
        }
        
        .password-toggle i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #718096;
            cursor: pointer;
        }
        
        .switch-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f8fafc;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 15px;
        }
        
        .switch-label {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .switch-label i {
            font-size: 1.2rem;
            color: #3a86ff;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(58, 134, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .switch-text h3 {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 5px;
        }
        
        .switch-text p {
            color: #718096;
            font-size: 0.9rem;
        }
        
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }
        
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e2e8f0;
            transition: .4s;
            border-radius: 34px;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .slider {
            background-color: #3a86ff;
        }
        
        input:checked + .slider:before {
            transform: translateX(26px);
        }
        
        .btn-save {
            background: linear-gradient(135deg, #3a86ff, #8338ec);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 16px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            max-width: 250px;
            margin: 30px auto 0;
            box-shadow: 0 8px 20px rgba(58, 134, 255, 0.25);
        }
        
        .btn-save:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(58, 134, 255, 0.35);
        }
        
        .btn-save:active {
            transform: translateY(-1px);
        }
        
        .security-alert {
            background: rgba(255, 246, 143, 0.2);
            border: 1px solid rgba(236, 201, 75, 0.3);
            border-radius: 12px;
            padding: 20px;
            margin: 30px 0;
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }
        
        .security-alert i {
            color: #ecc94b;
            font-size: 1.5rem;
        }
        
        .security-alert h3 {
            color: #a17917;
            margin-bottom: 8px;
        }
        
        .security-alert p {
            color: #a17917;
            font-size: 0.95rem;
        }
        
        /* Nouveau: Conteneur pour le contenu principal */
        .main-content-container {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        
        /* Responsive */
        @media (max-width: 900px) {
            .settings-container {
                grid-template-columns: 1fr;
            }
            
            .settings-sidebar {
                position: static;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 600px) {
            .settings-content {
                padding: 25px 20px;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="settings-header">
        <h1>Paramètres de mon compte</h1>
        <p>Gérez vos informations personnelles, votre sécurité et vos préférences</p>
    </div>
    
    <div class="settings-container">
        <!-- Sidebar Navigation -->
        <div class="settings-sidebar">
            <div class="user-profile-card">
                <div class="user-avatar">
                        {{ substr(Auth::user()->name, 0, 1) }}{{ substr(Auth::user()->name, strpos(Auth::user()->name, ' ') + 1, 1) }}
                </div>
                <div class="user-name">{{Auth::user()->name}}</div>
                <div class="user-role">{{Auth::user()->role}}</div>
            </div>
            
            <a href="#personal-info" class="nav-item active">
                <i class="fas fa-user"></i>
                <span>Informations personnelles</span>
            </a>
            
            <a href="#account-security" class="nav-item">
                <i class="fas fa-lock"></i>
                <span>Sécurité du compte</span>
            </a>
            
            <a href="#notifications" class="nav-item">
                <i class="fas fa-bell"></i>
                <span>Préférences de notifications</span>
            </a>
            
            <a href="#appearance" class="nav-item">
                <i class="fas fa-moon"></i>
                <span>Apparence</span>
            </a>
            
            <a href="#language" class="nav-item">
                <i class="fas fa-language"></i>
                <span>Langue</span>
            </a>
            
            <a href="#privacy" class="nav-item">
                <i class="fas fa-shield-alt"></i>
                <span>Confidentialité</span>
            </a>
        </div>
        
        <!-- Main Content Container -->
        <div class="main-content-container">
            <!-- Informations personnelles -->
            <div id="personal-info" class="settings-content">
                <div class="section-title">
                    <i class="fas fa-user"></i>
                    <span>Informations personnelles</span>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label><i class="fas fa-signature"></i> Nom complet</label>
                        <input type="text" value="{{Auth::user()->name}}">
                    </div>
                    
                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i> Adresse email</label>
                        <input type="email" value="{{Auth::user()->email}}">
                    </div>
                    
                    
                    <div class="form-group">
                        <label><i class="fas fa-calendar"></i> Date de naissance</label>
                        <input type="date" value="2004-07-04">
                    </div>
                    
                    <div class="form-group">
                        <label><i class="fas fa-venus-mars"></i> Genre</label>
                        <select>
                            <option>Masculin</option>
                            <option>Féminin</option>
                            <option>Autre</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label><i class="fas fa-map-marker-alt"></i> Adresse</label>
                        <input type="text" value="{{Auth::user()->city}}">
                    </div>
                </div>
                
                <button class="btn-save">
                    <i class="fas fa-save"></i> Enregistrer les modifications
                </button>
            </div>
            
            <!-- Sécurité du compte -->
            <div id="account-security" class="settings-content">
                <div class="section-title">
                    <i class="fas fa-lock"></i>
                    <span>Sécurité du compte</span>
                </div>
                
                <div class="security-alert">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <h3>Votre compte est sécurisé</h3>
                        <p>Nous vous recommandons d'activer l'authentification à deux facteurs pour renforcer la sécurité de votre compte.</p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label><i class="fas fa-lock"></i> Mot de passe actuel</label>
                    <div class="password-toggle">
                        <input type="password" value="">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label><i class="fas fa-key"></i> Nouveau mot de passe</label>
                    <div class="password-toggle">
                        <input type="password" placeholder="Entrez votre nouveau mot de passe">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label><i class="fas fa-key"></i> Confirmer le nouveau mot de passe</label>
                    <div class="password-toggle">
                        <input type="password" placeholder="Confirmez votre nouveau mot de passe">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
                
                <div class="switch-container">
                    <div class="switch-label">
                        <i class="fas fa-mobile-alt"></i>
                        <div class="switch-text">
                            <h3>Authentification à deux facteurs</h3>
                            <p>Ajoutez une couche de sécurité supplémentaire à votre compte</p>
                        </div>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
                
                <button class="btn-save">
                    <i class="fas fa-save"></i> Mettre à jour la sécurité
                </button>
            </div>
            
            <!-- Préférences de notifications -->
            <div id="notifications" class="settings-content">
                <div class="section-title">
                    <i class="fas fa-bell"></i>
                    <span>Préférences de notifications</span>
                </div>
                
                <div class="switch-container">
                    <div class="switch-label">
                        <i class="fas fa-envelope"></i>
                        <div class="switch-text">
                            <h3>Notifications par email</h3>
                            <p>Recevez des notifications importantes par email</p>
                        </div>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
                
                <div class="switch-container">
                    <div class="switch-label">
                        <i class="fas fa-mobile-alt"></i>
                        <div class="switch-text">
                            <h3>Notifications push</h3>
                            <p>Recevez des notifications sur votre appareil mobile</p>
                        </div>
                    </div>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
                
                <div class="switch-container">
                    <div class="switch-label">
                        <i class="fas fa-calendar-check"></i>
                        <div class="switch-text">
                            <h3>Rappels de rendez-vous</h3>
                            <p>Recevez des rappels avant vos rendez-vous</p>
                        </div>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
                
                <div class="switch-container">
                    <div class="switch-label">
                        <i class="fas fa-file-medical"></i>
                        <div class="switch-text">
                            <h3>Nouveaux documents</h3>
                            <p>Être notifié lorsque de nouveaux documents sont disponibles</p>
                        </div>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
                
                <button class="btn-save">
                    <i class="fas fa-save"></i> Enregistrer les préférences
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password toggle functionality
            const passwordToggles = document.querySelectorAll('.password-toggle i');
            passwordToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    if (input.type === 'password') {
                        input.type = 'text';
                        this.classList.remove('fa-eye');
                        this.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        this.classList.remove('fa-eye-slash');
                        this.classList.add('fa-eye');
                    }
                });
            });
            
            // Animation for save buttons
            const saveButtons = document.querySelectorAll('.btn-save');
            saveButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Show saving animation
                    const originalHtml = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enregistrement...';
                    this.disabled = true;
                    
                    // Simulate save process
                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-check"></i> Enregistré avec succès!';
                        
                        // Revert after 2 seconds
                        setTimeout(() => {
                            this.innerHTML = originalHtml;
                            this.disabled = false;
                        }, 2000);
                    }, 1500);
                });
            });
            
            // Navigation smooth scrolling
            document.querySelectorAll('.nav-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all items
                    document.querySelectorAll('.nav-item').forEach(nav => {
                        nav.classList.remove('active');
                    });
                    
                    // Add active class to clicked item
                    this.classList.add('active');
                    
                    // Scroll to target section
                    const targetId = this.getAttribute('href');
                    const targetSection = document.querySelector(targetId);
                    if (targetSection) {
                        targetSection.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
        });
    </script>
</body>
</html>