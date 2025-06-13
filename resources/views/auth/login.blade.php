<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | MediConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <style>
        :root {
            --primary: #3a86ff;
            --primary-dark: #2667cc;
            --secondary: #ff006e;
            --accent: #8338ec;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #38b000;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --card-shadow: 0 15px 30px rgba(0,0,0,0.1);
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            overflow-x: hidden;
            position: relative;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1932&q=80') no-repeat center center/cover;
            opacity: 0.05;
            z-index: -1;
        }

        /* Floating Elements */
        .floating-element {
            position: fixed;
            border-radius: 50%;
            z-index: -1;
            filter: blur(60px);
            opacity: 0.4;
        }

        .element-1 {
            width: 500px;
            height: 500px;
            background: var(--primary);
            top: -250px;
            right: -100px;
            animation: float1 15s infinite ease-in-out;
        }

        .element-2 {
            width: 400px;
            height: 400px;
            background: var(--secondary);
            bottom: -150px;
            left: -100px;
            animation: float2 18s infinite ease-in-out;
        }

        .element-3 {
            width: 300px;
            height: 300px;
            background: var(--accent);
            top: 50%;
            left: 10%;
            animation: float3 12s infinite ease-in-out;
        }

        @keyframes float1 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(-50px, -50px) rotate(10deg); }
            50% { transform: translate(0px, -100px) rotate(0deg); }
            75% { transform: translate(50px, -50px) rotate(-10deg); }
        }

        @keyframes float2 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(50px, -50px) rotate(-10deg); }
            50% { transform: translate(100px, 0px) rotate(0deg); }
            75% { transform: translate(50px, 50px) rotate(10deg); }
        }

        @keyframes float3 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(20px, -40px) rotate(15deg); }
            50% { transform: translate(-20px, -20px) rotate(0deg); }
            75% { transform: translate(-40px, 20px) rotate(-15deg); }
        }

        /* Container */
        .container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            min-height: 700px;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            background: white;
            position: relative;
            z-index: 1;
        }

        /* Logo */
        .logo {
            position: absolute;
            top: 30px;
            left: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 10;
        }

        .logo i {
            color: rgb(156, 4, 4);
            font-size: 2rem;
        }

        .logo span {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            background: linear-gradient(90deg, black, rgb(57, 57, 212));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        .logo span span {
            font-weight: 300;
            color: var(--accent);
        }

        /* Image Section */
        .image-section {
            flex: 1;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            padding: 100px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .image-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1581595219319-5b8b331d0a61?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80') no-repeat center center/cover;
            opacity: 0.2;
        }

        .image-content {
            position: relative;
            z-index: 2;
        }

        .image-content h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
            line-height: 1.3;
        }

        .image-content p {
            font-size: 1.1rem;
            margin-bottom: 40px;
            opacity: 0.9;
            max-width: 500px;
        }

        .features {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .feature {
            display: flex;
            gap: 15px;
            align-items: flex-start;
        }

        .feature i {
            font-size: 1.8rem;
            color: white;
            background: rgba(255, 255, 255, 0.2);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .feature-text h3 {
            font-size: 1.3rem;
            margin-bottom: 5px;
        }

        .feature-text p {
            opacity: 0.8;
            margin-bottom: 0;
        }

        /* Form Section */
        .form-section {
            flex: 1;
            padding: 80px 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            width: 100%;
            max-width: 450px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.2rem;
            margin-bottom: 10px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-header p {
            color: var(--gray);
            font-size: 1.1rem;
        }

        .role-selector {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .role-btn {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px;
            border-radius: 15px;
            background: var(--light-gray);
            border: 2px solid transparent;
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
        }

        .role-btn i {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: var(--gray);
        }

        .role-btn.active {
            background: rgba(58, 134, 255, 0.1);
            border-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(58, 134, 255, 0.1);
        }

        .role-btn.active i {
            color: var(--primary);
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 1.1rem;
        }

        .input-group input {
            width: 100%;
            padding: 15px 20px 15px 55px;
            border-radius: 12px;
            border: 2px solid var(--light-gray);
            font-size: 1rem;
            transition: var(--transition);
            outline: none;
        }

        .input-group input:focus {
            border-color: var(--primary);
            box-shadow: 0 5px 15px rgba(58, 134, 255, 0.1);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 0.95rem;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember input {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
        }

        .remember label {
            color: var(--gray);
        }

        .remember-forgot a {
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition);
        }

        .remember-forgot a:hover {
            color: var(--accent);
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            padding: 16px;
            border-radius: 12px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            margin-bottom: 25px;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(131, 56, 236, 0.3);
        }

        .divider {
            position: relative;
            text-align: center;
            margin: 25px 0;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 1px;
            background: var(--light-gray);
            z-index: -1;
        }

        .divider span {
            background: white;
            padding: 0 15px;
        }

        .google-btn {
            width: 100%;
            padding: 16px;
            border-radius: 12px;
            background: white;
            color: var(--dark);
            font-size: 1.1rem;
            font-weight: 600;
            border: 2px solid var(--light-gray);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .google-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            border-color: var(--primary);
        }

        .google-btn i {
            color: #DB4437;
            font-size: 1.3rem;
        }

        .signup-link {
            text-align: center;
            margin-top: 30px;
            color: var(--gray);
            font-size: 0.95rem;
        }

        .signup-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }

        .signup-link a:hover {
            color: var(--accent);
            text-decoration: underline;
        }

        .alert {
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 25px;
            text-align: center;
            font-size: 0.95rem;
        }

        .alert-danger {
            background: rgba(255, 0, 0, 0.05);
            color: #e53e3e;
            border: 1px solid rgba(229, 62, 62, 0.2);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .container {
                flex-direction: column;
                min-height: auto;
            }
            
            .image-section {
                padding: 60px 30px;
            }
            
            .form-section {
                padding: 60px 30px;
            }
            
            .image-content h1 {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 10px;
            }
            
            .logo {
                top: 15px;
                left: 15px;
            }
            
            .logo i {
                font-size: 1.5rem;
            }
            
            .logo span {
                font-size: 1.4rem;
            }
            
            .image-section {
                padding: 80px 20px 40px;
            }
            
            .form-section {
                padding: 40px 20px;
            }
            
            .image-content h1 {
                font-size: 1.7rem;
            }
            
            .form-header h1 {
                font-size: 1.8rem;
            }
            
            .feature {
                gap: 10px;
            }
            
            .feature i {
                width: 45px;
                height: 45px;
                font-size: 1.3rem;
            }
            
            .feature-text h3 {
                font-size: 1.1rem;
            }
            
            .role-selector {
                flex-direction: column;
            }
            
            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Floating background elements -->
    <div class="floating-element element-1"></div>
    <div class="floating-element element-2"></div>
    <div class="floating-element element-3"></div>

    <div class="container">
        <div class="logo">
            <i class="fas fa-heartbeat"></i>
            <span>Medi<span>Connect</span></span>
        </div>
        
        <!-- Section d'image -->
        <div class="image-section">
            <div class="image-content">
                <h1>L'excellence médicale à votre service</h1>
                <p>Prenez rendez-vous avec les meilleurs spécialistes en quelques clics seulement</p>
                
                <div class="features">
                    <div class="feature">
                        <i class="fas fa-calendar-check"></i>
                        <div class="feature-text">
                            <h3>Prise de RDV simplifiée</h3>
                            <p>Disponibilité en temps réel</p>
                        </div>
                    </div>
                    <div class="feature">
                        <i class="fas fa-user-md"></i>
                        <div class="feature-text">
                            <h3>Professionnels qualifiés</h3>
                            <p>Médecins vérifiés et expérimentés</p>
                        </div>
                    </div>
                    <div class="feature">
                        <i class="fas fa-clock"></i>
                        <div class="feature-text">
                            <h3>Gain de temps</h3>
                            <p>Recherche rapide par spécialité</p>
                        </div>
                    </div>
                    <div class="feature">
                        <i class="fas fa-shield-alt"></i>
                        <div class="feature-text">
                            <h3>Sécurité des données</h3>
                            <p>Informations médicales protégées</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Section des formulaires -->
        <div class="form-section">
            <div class="form-container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="form-header">
                        <h1>Connexion</h1>
                        <p>Accédez à votre espace sécurisé</p>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Sélecteur de rôle -->
                    <div class="role-selector" id="login-role-selector">
                        <div class="role-btn active" data-role="patient">
                            <i class="fas fa-user-injured"></i>
                            Patient
                        </div>
                        <div class="role-btn" data-role="doctor">
                            <i class="fas fa-user-md"></i>
                            Médecin
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input id="email" type="email" name="email" placeholder="Adresse email" required autofocus value="{{ old('email') }}">
                    </div>

                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input id="password" type="password" name="password" placeholder="Mot de passe" required autocomplete="current-password">
                    </div>

                    <div class="remember-forgot">
                        <div class="remember">
                            <input id="remember_me" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember_me">Se souvenir de moi</label>
                        </div>
                        <a href="{{ route('password.reset.form') }}">Mot de passe oublié ?</a>
                    </div>

                    <button type="submit" class="login-btn">Se connecter</button>

                    <div class="divider">
                        <span>ou continuer avec</span>
                    </div>

                    <a href="{{ route('google.login') }}">
                        <button type="button" class="google-btn">
                            <i class="fab fa-google"></i>
                            Se connecter avec Google
                        </button>
                    </a>

                    <div class="signup-link">
                        Vous n'avez pas de compte ? 
                        <a href="{{ route('register') }}">Créer un compte</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // GSAP Animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animer les éléments de la page
            gsap.from('.image-section', {
                x: -50,
                opacity: 0,
                duration: 1,
                delay: 0.3
            });
            
            gsap.from('.form-section', {
                x: 50,
                opacity: 0,
                duration: 1,
                delay: 0.5
            });
            
            gsap.from('.logo', {
                y: -30,
                opacity: 0,
                duration: 0.8,
                delay: 0.2
            });
            
            gsap.from('.feature', {
                y: 30,
                opacity: 0,
                stagger: 0.15,
                duration: 0.8,
                delay: 0.8
            });
            
            // Animation du sélecteur de rôle
            const roleButtons = document.querySelectorAll('.role-btn');
            
            roleButtons.forEach(button => {
                button.addEventListener('click', () => {
                    roleButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    
                    // Animation du bouton sélectionné
                    gsap.from(button, {
                        scale: 0.9,
                        duration: 0.3,
                        ease: "back.out(1.7)"
                    });
                });
            });
            
            // Animation au focus des champs
            const inputs = document.querySelectorAll('input');
            
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    gsap.to(input, {
                        boxShadow: '0 5px 15px rgba(58, 134, 255, 0.2)',
                        duration: 0.3
                    });
                });
                
                input.addEventListener('blur', () => {
                    gsap.to(input, {
                        boxShadow: 'none',
                        duration: 0.3
                    });
                });
            });
        });
    </script>
</body>
</html>