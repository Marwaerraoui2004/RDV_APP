<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MediConnect') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary: #0d4a75;
            --secondary: #1a6b9f;
            --accent: #38b6a1;
            --light: #f0f7ff;
            --dark: #1c3d5a;
            --google: #4285F4;
            --text-dark: #2d3748;
            --text-light: #718096;
            --success: #48bb78;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, var(--dark), var(--primary));
            color: #333;
            position: relative;
            padding: 20px;
            overflow-x: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 10% 20%, rgba(56, 182, 161, 0.1) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(13, 74, 117, 0.15) 0%, transparent 25%);
            pointer-events: none;
        }
        
        .container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            margin: auto;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
            border-radius: 20px;
            overflow: hidden;
            z-index: 10;
            position: relative;
            background: white;
        }
        
        .logo {
            position: absolute;
            top: 1.5rem;
            left: 1.5rem;
            display: flex;
            align-items: center;
            font-size: 1.7rem;
            font-weight: 700;
            color: white;
            z-index: 100;
            padding: 0.7rem 1.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            background: rgba(13, 74, 117, 0.9);
            backdrop-filter: blur(5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }
        
        .logo:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }
        
        .logo i {
            margin-right: 12px;
            color: var(--accent);
            font-size: 1.8rem;
        }
        
        .content-container {
            display: flex;
            width: 100%;
            height: 100%;
            position: relative;
        }
        
        .image-section {
            flex: 1;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2.5rem;
            color: white;
            min-height: 350px;
            overflow: hidden;
        }
        
        .image-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(13, 74, 117, 0.85), rgba(56, 182, 161, 0.75));
            z-index: 1;
        }
        
        .login-image {
            background: url('https://images.unsplash.com/photo-1581595219319-5d78a7d5ea3c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80') no-repeat center center;
        }
        
        .register-image {
            background: url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80') no-repeat center center;
        }
        
        .image-content {
            position: relative;
            z-index: 2;
            margin-bottom: 1rem;
            max-width: 600px;
        }
        
        .image-content h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 2.4rem;
            margin-bottom: 1.2rem;
            font-weight: 700;
            line-height: 1.15;
            text-shadow: 0 3px 15px rgba(0,0,0,0.25);
        }
        
        .image-content p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-weight: 300;
            max-width: 500px;
            opacity: 0.9;
        }
        
        .features {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 1.2rem;
        }
        
        .feature {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            flex: 1 1 200px;
        }
        
        .feature i {
            font-size: 1.6rem;
            color: white;
            background: rgba(255,255,255,0.2);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 5px;
            transition: transform 0.3s ease;
        }
        
        .feature:hover i {
            transform: scale(1.1);
            background: rgba(255,255,255,0.25);
        }
        
        .feature-text h3 {
            font-size: 1.05rem;
            margin-bottom: 6px;
            font-weight: 600;
        }
        
        .feature-text p {
            font-size: 0.9rem;
            margin: 0;
            opacity: 0.85;
        }
        
        .form-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--light);
            padding: 2rem;
            position: relative;
            overflow: hidden;
            height: 100%;
            /* Correction: Ajout de défilement pour les grands écrans */
            overflow-y: auto;
        }
        
        /* Correction: Ajout d'un défilement spécifique pour les écrans mobiles */
        @media (max-width: 768px) {
            .form-section {
                overflow-y: visible;
            }
        }
        
        .form-section::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, var(--light) 0%, transparent 70%);
            opacity: 0.6;
            z-index: 0;
        }
        
        .form-container {
            width: 100%;
            max-width: 480px;
            padding: 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(13, 74, 117, 0.12);
            position: relative;
            overflow: visible; /* Correction: Permet au contenu de déborder */
            z-index: 2;
        }
        
        .form-container::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, var(--accent), var(--secondary));
        }
        
        .form-header {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 1rem;
            position: relative;
        }
        
        .form-header h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 2.2rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .form-header p {
            color: var(--secondary);
            font-size: 1.05rem;
            font-weight: 400;
            max-width: 350px;
            margin: 0 auto;
        }
        
        .role-selector {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 2rem;
        }
        
        .role-btn {
            flex: 1;
            padding: 14px 0;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            background: #f8fafc;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            color: var(--text-dark);
            text-align: center;
            font-size: 0.95rem;
            position: relative;
            overflow: hidden;
        }
        
        .role-btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 0;
            background: linear-gradient(to bottom, var(--accent), var(--secondary));
            z-index: 1;
            transition: height 0.3s ease;
            opacity: 0.15;
        }
        
        .role-btn:hover {
            border-color: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(56, 182, 161, 0.2);
        }
        
        .role-btn.active {
            background: white;
            color: var(--primary);
            border-color: var(--accent);
            box-shadow: 0 5px 15px rgba(56, 182, 161, 0.2);
        }
        
        .role-btn.active::before {
            height: 100%;
        }
        
        .role-btn i {
            display: block;
            font-size: 1.6rem;
            margin-bottom: 8px;
            color: var(--secondary);
        }
        
        .role-btn.active i {
            color: var(--accent);
        }
        
        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .input-group i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary);
            font-size: 1.1rem;
            transition: color 0.3s;
        }
        
        .input-group input, .input-group select {
            width: 100%;
            padding: 15px 18px 15px 50px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
            background: #f8fafc;
            font-weight: 500;
            color: var(--text-dark);
            font-family: 'Montserrat', sans-serif;
        }
        
        .input-group input:focus, .input-group select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(56, 182, 161, 0.15);
            background: white;
        }
        
        .input-group input:focus + i {
            color: var(--accent);
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .remember {
            display: flex;
            align-items: center;
        }
        
        .remember input {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            accent-color: var(--accent);
        }
        
        .remember label {
            color: var(--text-dark);
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .forgot {
            color: var(--accent);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.2s;
        }
        
        .forgot:hover {
            text-decoration: underline;
        }
        
        .login-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(13, 74, 117, 0.3);
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
            margin-bottom: 15px;
            font-family: 'Poppins', sans-serif;
            z-index: 1;
        }
        
        .login-btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--secondary), var(--accent));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }
        
        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(13, 74, 117, 0.4);
        }
        
        .login-btn:hover::before {
            opacity: 1;
        }
        
        .login-btn:active {
            transform: translateY(0);
        }
        
        .google-btn {
            width: 100%;
            padding: 15px;
            background: white;
            color: #5F6368;
            border: 1px solid #DADCE0;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 18px;
            font-family: 'Montserrat', sans-serif;
        }
        
        .google-btn:hover {
            background: #f8f9fa;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }
        
        .google-btn i {
            color: var(--google);
            font-size: 1.2rem;
        }
        
        .signup-link {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-dark);
            font-size: 1rem;
            font-weight: 500;
        }
        
        .signup-link a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 700;
            transition: all 0.2s;
            cursor: pointer;
            position: relative;
        }
        
        .signup-link a::after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }
        
        .signup-link a:hover {
            color: var(--primary);
        }
        
        .signup-link a:hover::after {
            width: 100%;
        }
        
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
            color: var(--text-light);
            font-weight: 500;
            font-size: 0.95rem;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .divider::before {
            margin-right: 12px;
        }
        
        .divider::after {
            margin-left: 12px;
        }
        
        .back-to-login {
            display: flex;
            align-items: center;
            color: var(--accent);
            text-decoration: none;
            font-weight: 700;
            margin-bottom: -20px;
            transition: all 0.2s;
            cursor: pointer;
            font-size: 1.05rem;
        }
        
        .back-to-login:hover {
            color: var(--primary);
            transform: translateX(-5px);
        }
        
        .back-to-login i {
            margin-right: 8px;
            transition: transform 0.3s ease;
        }
        
        .back-to-login:hover i {
            transform: translateX(-5px);
        }
        
        /* Champs supplémentaires pour médecin */
        .doctor-fields {
            display: none;
            background: rgba(240, 247, 255, 0.6);
            padding: 18px;
            border-radius: 12px;
            margin-bottom: 18px;
            border: 1px solid rgba(13, 74, 117, 0.1);
        }
        
        .doctor-fields.active {
            display: block;
        }
        
        .doctor-title {
            font-size: 1.15rem;
            color: var(--primary);
            margin-bottom: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .doctor-title i {
            color: var(--accent);
        }
        
        .grid-fields {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .container {
                height: auto;
                max-height: none;
                min-height: auto;
                flex-direction: column;
            }
            
            .content-container {
                flex-direction: column;
            }
            
            .image-section {
                min-height: 300px;
                padding: 2rem;
            }
            
            .form-container {
                padding: 2rem;
            }
            
            .form-header h1 {
                font-size: 2rem;
            }
            
            .role-selector {
                flex-direction: column;
                gap: 10px;
            }
            
            .grid-fields {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            
            .image-section {
                min-height: 250px;
                padding: 1.5rem;
            }
            
            .image-content h1 {
                font-size: 2rem;
            }
            
            .form-container {
                padding: 1.5rem;
            }
            
            .form-header h1 {
                font-size: 1.8rem;
            }
            
            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    {{ $slot }}
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion de la sélection du rôle
            document.querySelectorAll('.role-selector').forEach(selector => {
                const buttons = selector.querySelectorAll('.role-btn');
                const roleInput = selector.nextElementSibling; // Champ caché suivant
                
                buttons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        buttons.forEach(b => b.classList.remove('active'));
                        btn.classList.add('active');
                        roleInput.value = btn.dataset.role;
                        
                        // Afficher les champs médecin si nécessaire
                        const doctorFields = document.getElementById('doctor-fields');
                        if (doctorFields) {
                            doctorFields.classList.toggle('active', btn.dataset.role === 'doctor');
                            
                            // Faire défiler vers les champs médecin si nécessaire
                            if (btn.dataset.role === 'doctor' && doctorFields.classList.contains('active')) {
                                doctorFields.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            }
                        }
                    });
                });
            });
            
            // Animation pour les interactions
            const inputs = document.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-3px)';
                    this.parentElement.style.boxShadow = '0 5px 15px rgba(56, 182, 161, 0.15)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                    this.parentElement.style.boxShadow = 'none';
                });
            });
            
            // Effet de soumission des formulaires
            document.querySelectorAll('form').forEach(form => {
                const submitBtn = form.querySelector('button[type="submit"]');
                
                if (submitBtn) {
                    form.addEventListener('submit', function(e) {
                        const originalText = submitBtn.innerHTML;
                        submitBtn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Traitement en cours...';
                        submitBtn.disabled = true;
                        
                        // Réactiver le bouton après un délai en cas d'erreur
                        setTimeout(() => {
                            submitBtn.innerHTML = originalText;
                            submitBtn.disabled = false;
                        }, 5000);
                    });
                }
            });
        });
    </script>
</body>
</html>