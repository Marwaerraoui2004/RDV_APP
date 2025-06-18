<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediConnect - Plateforme Médicale Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/TextPlugin.min.js"></script>
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

        /* Loader Squelette */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #3a86ff 0%, #8338ec 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.8s ease-out, visibility 0.8s ease-out;
        }

        .loader-content {
            text-align: center;
            color: white;
        }

        .loader-logo {
            font-size: 3rem;
            margin-bottom: 20px;
            animation: pulse 2s infinite;
        }

        .loader-text {
            font-size: 1.5rem;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .loader-bar {
            width: 300px;
            height: 8px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 4px;
            overflow: hidden;
            position: relative;
        }

        .loader-progress {
            position: absolute;
            height: 100%;
            width: 0%;
            background: white;
            animation: loading 2s ease-in-out forwards;
        }

        @keyframes loading {
            0% { width: 0%; }
            70% { width: 80%; }
            100% { width: 100%; }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
            100% { transform: scale(1); opacity: 1; }
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

        /* Header */
        #header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 5%;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(10px);
            transition: var(--transition);
        }

        #header.scrolled {
            padding: 1rem 5%;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo i {
            color: var(--primary);
            font-size: 2rem;
        }

        .logo h1 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 0.8rem 1.8rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: var(--transition);
            display: inline-block;
            cursor: pointer;
            border: none;
            outline: none;
            font-family: 'Poppins', sans-serif;
        }

        .btn-login {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-login:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(58, 134, 255, 0.3);
        }

        .btn-register {
            background: linear-gradient(90deg, var(--primary), var(--accent));
            color: white;
            border: 2px solid transparent;
        }

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(131, 56, 236, 0.3);
        }

        .btn-large {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
        }

        /* Hero Section */
        .hero {
            display: flex;
            min-height: 100vh;
            padding: 0 5%;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-top: 100px;
        }

        .hero-content {
            flex: 1;
            padding-right: 50px;
            z-index: 2;
        }

        .hero-content h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-content h2 span {
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-content p {
            font-size: 1.2rem;
            color: var(--gray);
            margin-bottom: 2.5rem;
            max-width: 600px;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
        }

        .hero-image {
            flex: 1;
            position: relative;
            z-index: 1;
            perspective: 1000px;
        }

        .hero-image img {
            width: 100%;
            max-width: 600px;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            transform: rotateY(-5deg) rotateX(5deg);
            border: 10px solid white;
            animation: floatImage 8s infinite ease-in-out;
        }

        @keyframes floatImage {
            0%, 100% { transform: rotateY(-5deg) rotateX(5deg) translateY(0); }
            50% { transform: rotateY(5deg) rotateX(-2deg) translateY(-20px); }
        }

        /* Sections communes */
        section {
            padding: 100px 5%;
            position: relative;
        }

        .section-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 70px;
        }

        .section-header h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            position: relative;
            display: inline-block;
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-radius: 2px;
        }

        .section-header p {
            font-size: 1.1rem;
            color: var(--gray);
            line-height: 1.7;
        }

        /* Features Section */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            transition: var(--transition);
            box-shadow: var(--card-shadow);
            position: relative;
            overflow: hidden;
            z-index: 1;
            /* Ajout: rendre initialement invisible et légèrement décalé vers le bas */
            opacity: 0;
            transform: translateY(20px);
        }

        /* Animation GSAP corrigée */
        .feature-card.animated {
            opacity: 1;
            transform: translateY(0);
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 0;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            z-index: -1;
            transition: var(--transition);
            opacity: 0.9;
        }

        .feature-card:hover::before {
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .feature-card:hover .feature-icon {
            background: white;
            color: var(--primary);
        }

        .feature-card:hover h3, 
        .feature-card:hover p {
            color: white;
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: white;
            font-size: 2rem;
            transition: var(--transition);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            transition: var(--transition);
        }

        .feature-card p {
            color: var(--gray);
            transition: var(--transition);
            line-height: 1.6;
        }

        /* How it works section */
        .steps-container {
            display: flex;
            justify-content: center;
            margin-top: 50px;
            position: relative;
        }

        .steps-line {
            position: absolute;
            top: 60px;
            left: 10%;
            width: 80%;
            height: 3px;
            background: var(--light-gray);
            z-index: -1;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 25%;
            padding: 0 20px;
            position: relative;
        }

        .step-number {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            border: 3px solid var(--primary);
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(58, 134, 255, 0.2);
        }

        .step-content {
            text-align: center;
        }

        .step-content h3 {
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .step-content p {
            color: var(--gray);
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            padding: 80px 5%;
            color: white;
            text-align: center;
            border-radius: 20px;
            margin: 100px 5% 0;
            position: relative;
            overflow: hidden;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            z-index: 1;
        }

        .stats-content {
            position: relative;
            z-index: 2;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            font-family: 'Montserrat', sans-serif;
        }

        .stat-text {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Testimonials Slider */
        .testimonials {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
            overflow: hidden;
        }

        .testimonials-slider {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            height: 400px;
            overflow: hidden;
        }

        .slider-container {
            display: flex;
            transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
        }

        .testimonial-card {
            min-width: 100%;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: var(--card-shadow);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .testimonial-content {
            font-size: 1.2rem;
            font-style: italic;
            line-height: 1.7;
            color: var(--gray);
            margin-bottom: 30px;
            position: relative;
            padding-left: 30px;
        }

        .testimonial-content::before {
            content: '"';
            position: absolute;
            left: 0;
            top: -20px;
            font-size: 4rem;
            color: var(--light-gray);
            font-family: serif;
            line-height: 1;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-avatar {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .author-info h4 {
            font-size: 1.3rem;
            margin-bottom: 5px;
        }

        .author-info p {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .slider-nav {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 40px;
        }

        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--light-gray);
            cursor: pointer;
            transition: var(--transition);
        }

        .slider-dot.active {
            background: var(--primary);
            transform: scale(1.2);
        }

        /* FAQ Section */
        .faq-container {
            max-width: 800px;
            margin: 50px auto 0;
        }

        .faq-item {
            background: white;
            border-radius: 15px;
            margin-bottom: 20px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .faq-question {
            padding: 25px;
            font-size: 1.2rem;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .faq-question:hover {
            color: var(--primary);
        }

        .faq-question i {
            transition: var(--transition);
        }

        .faq-answer {
            padding: 0 25px;
            max-height: 0;
            overflow: hidden;
            transition: var(--transition);
        }

        .faq-item.active .faq-answer {
            padding: 0 25px 25px;
            max-height: 500px;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        /* CTA Section */
        .cta {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 30px;
            padding: 80px 5%;
            margin: 100px 5% 0;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            z-index: 1;
        }

        .cta-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .cta h2 {
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
        }

        .cta p {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        .cta .btn-register {
            background: white;
            color: var(--primary);
        }

        .cta .btn-login {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            color: white;
        }

        .cta .btn-login:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 80px 5% 30px;
            position: relative;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 60px;
        }

        .footer-col h3 {
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--primary);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-links a i {
            font-size: 0.8rem;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-5px);
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .hero {
                flex-direction: column;
                text-align: center;
                padding-top: 150px;
            }
            
            .hero-content {
                padding-right: 0;
                margin-bottom: 50px;
            }
            
            .hero-buttons {
                justify-content: center;
            }
            
            .hero-content h2 {
                font-size: 2.8rem;
            }
            
            .hero-content p {
                margin: 0 auto 2rem;
            }

            .steps-container {
                flex-direction: column;
                align-items: center;
            }

            .steps-line {
                display: none;
            }

            .step {
                width: 100%;
                max-width: 400px;
                margin-bottom: 40px;
            }
        }

        @media (max-width: 768px) {
            .hero-content h2 {
                font-size: 2.3rem;
            }
            
            .section-header h2 {
                font-size: 2rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }
            
            .cta h2 {
                font-size: 2.2rem;
            }
            
            .testimonial-card {
                padding: 30px;
            }
        }

        @media (max-width: 576px) {
            .logo h1 {
                font-size: 1.5rem;
            }
            
            .btn {
                padding: 0.6rem 1.2rem;
                font-size: 0.9rem;
            }
            
            .btn-large {
                padding: 0.8rem 1.5rem;
                font-size: 1rem;
            }
            
            .hero-content h2 {
                font-size: 2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Loader Squelette -->
    <div id="loader">
        <div class="loader-content">
            <div class="loader-logo">
                <i class="fas fa-heartbeat"></i>
            </div>
            <div class="loader-text"> MediConnect...</div>
            <div class="loader-bar">
                <div class="loader-progress"></div>
            </div>
        </div>
    </div>

    <!-- Floating background elements -->
    <div class="floating-element element-1"></div>
    <div class="floating-element element-2"></div>
    <div class="floating-element element-3"></div>

    <!-- Header -->
    <header id="header">
        <div class="logo">
            <i class="fas fa-heartbeat"></i>
            <h1>MediConnect</h1>
        </div>
        <div class="nav-buttons">
            <a href="{{route('login.create')}}" class="btn btn-login" style="text-decoration: none; color: inherit;">Connexion</a>
            <a href="{{route('register.create')}}" class="btn btn-register" style="text-decoration: none; color: inherit;">Inscription</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Votre santé <span>connectée</span>, simplifiée</h2>
            <p>MediConnect révolutionne votre expérience médicale en vous connectant facilement avec des professionnels de santé et en centralisant vos informations médicales.</p>
            <div class="hero-buttons">
                <button class="btn btn-register btn-large">Commencer maintenant</button>
                <button class="btn btn-login btn-large">Voir la démo</button>
            </div>
        </div>
        
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="section-header">
            <h2>Découvrez notre plateforme innovante</h2>
            <p>Une solution complète pour gérer votre santé et vos relations avec les professionnels médicaux</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3>Gestion de rendez-vous</h3>
                <p>Prenez, modifiez ou annulez vos rendez-vous en quelques clics, 24h/24 et 7j/7. Recevez des rappels automatiques par SMS et email.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-file-medical"></i>
                </div>
                <h3>Dossier médical sécurisé</h3>
                <p>Tous vos documents médicaux centralisés et accessibles en toute sécurité. Stockage crypté conforme aux normes de santé.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Messagerie médicale</h3>
                <p>Échangez en toute confidentialité avec vos professionnels de santé. Protocole de sécurité de niveau militaire.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <h3>Trouver un spécialiste</h3>
                <p>Accédez à notre réseau de professionnels de santé qualifiés et vérifiés. Filtrez par spécialité, disponibilité et localisation.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <h3>Rappels intelligents</h3>
                <p>Ne manquez plus jamais un rendez-vous ou une prise de médicament. Personnalisez vos alertes selon vos besoins.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Suivi santé personnalisé</h3>
                <p>Visualisez l'évolution de vos indicateurs de santé au fil du temps. Partagez vos données avec vos médecins.</p>
            </div>
        </div>
    </section>

    <!-- How it Works Section -->
    <section class="how-it-works">
        <div class="section-header">
            <h2>Comment fonctionne MediConnect</h2>
            <p>Une solution simple en 4 étapes pour prendre le contrôle de votre santé</p>
        </div>
        <div class="steps-container">
            <div class="steps-line"></div>
            <div class="step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3>Créez votre compte</h3>
                    <p>Inscrivez-vous en 2 minutes et complétez votre profil médical</p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3>Importez vos documents</h3>
                    <p>Centralisez vos ordonnances, résultats d'analyses et comptes-rendus</p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3>Connectez-vous aux professionnels</h3>
                    <p>Trouvez et prenez rendez-vous avec des médecins près de chez vous</p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3>Gérez votre santé</h3>
                    <p>Suivez vos indicateurs, médicaments et rendez-vous en un seul endroit</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-content">
            <div class="section-header">
                <h2>MediConnect en chiffres</h2>
                <p>Rejoignez une communauté grandissante de patients et professionnels satisfaits</p>
            </div>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">50K+</div>
                    <div class="stat-text">Patients actifs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">3K+</div>
                    <div class="stat-text">Professionnels de santé</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">98%</div>
                    <div class="stat-text">Satisfaction utilisateurs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">24/7</div>
                    <div class="stat-text">Support disponible</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="section-header">
            <h2>Ce que nos utilisateurs disent</h2>
            <p>Découvrez les témoignages de nos patients et médecins satisfaits</p>
        </div>
        <div class="testimonials-slider">
            <div class="slider-container">
                <div class="testimonial-card">
                    <p class="testimonial-content">"Grâce à MediConnect, j'ai pu trouver un spécialiste disponible rapidement et gérer mes ordonnances sans me déplacer. Une révolution pour mon quotidien !"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">MD</div>
                        <div class="author-info">
                            <h4>Marie Dubois</h4>
                            <p>Patient depuis 2022</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-content">"En tant que médecin, MediConnect m'a permis de réduire mon temps administratif de 30% et d'améliorer la relation avec mes patients. La messagerie sécurisée est un vrai plus."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">DL</div>
                        <div class="author-info">
                            <h4>Dr. David Lambert</h4>
                            <p>Cardiologue</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-content">"La centralisation de mon dossier médical est un soulagement. Plus besoin de transporter mes documents, tout est accessible en un clic, même en déplacement."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">TP</div>
                        <div class="author-info">
                            <h4>Thomas Petit</h4>
                            <p>Patient depuis 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-nav">
            <div class="slider-dot active" data-index="0"></div>
            <div class="slider-dot" data-index="1"></div>
            <div class="slider-dot" data-index="2"></div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq">
        <div class="section-header">
            <h2>Questions fréquentes</h2>
            <p>Trouvez les réponses aux questions les plus courantes sur notre plateforme</p>
        </div>
        <div class="faq-container">
            <div class="faq-item">
                <div class="faq-question">
                    Comment garantir la confidentialité de mes données médicales ?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>MediConnect utilise un cryptage de niveau bancaire pour protéger vos données. Nous respectons strictement les normes RGPD et HIPAA pour la sécurité des données médicales. Seuls les professionnels de santé que vous autorisez explicitement peuvent accéder à vos informations.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    Comment ajouter mes documents médicaux à la plateforme ?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Vous pouvez facilement importer vos documents médicaux en les téléchargeant depuis votre ordinateur ou smartphone. Nous acceptons les formats PDF, JPG et PNG. Vous pouvez également demander à votre médecin d'envoyer directement vos documents sur la plateforme.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    Combien coûte l'utilisation de MediConnect ?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>L'inscription et l'utilisation de base de MediConnect sont gratuites. Nous proposons également un abonnement premium à 9,99€/mois qui donne accès à des fonctionnalités avancées comme l'analyse intelligente de vos données de santé, des rappels illimités et un support prioritaire.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    Puis-je accéder à MediConnect depuis mon smartphone ?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Absolument ! MediConnect est disponible sur iOS et Android. Téléchargez notre application depuis l'App Store ou Google Play Store pour gérer votre santé où que vous soyez. Toutes vos données sont synchronisées en temps réel entre vos différents appareils.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="cta-content">
            <h2>Prêt à prendre le contrôle de votre santé ?</h2>
            <p>Rejoignez des milliers de patients et professionnels de santé qui utilisent déjà MediConnect</p>
            <div class="hero-buttons">
                <button class="btn btn-register btn-large"><a href="{{route('register.create')}}" style="text-decoration:none;">Créer un compte</a></button>
                <button class="btn btn-login btn-large">En savoir plus</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-grid">
            <div class="footer-col">
                <div class="logo" style="margin-bottom: 1.5rem;">
                    <i class="fas fa-heartbeat"></i>
                    <h1>MediConnect</h1>
                </div>
                <p style="color: rgba(255,255,255,0.7); margin-bottom: 1.5rem; max-width: 300px;">Votre plateforme de santé connectée pour une gestion simplifiée et sécurisée de votre parcours médical.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h3>Liens rapides</h3>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Accueil</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Fonctionnalités</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Tarifs</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> À propos</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Ressources</h3>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Blog santé</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> FAQ</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Centre d'aide</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Témoignages</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Presse</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Légal</h3>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Conditions d'utilisation</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Politique de confidentialité</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Cookies</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Mentions légales</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2025 MediConnect. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        // GSAP Animations
        document.addEventListener('DOMContentLoaded', function() {
            // Hide loader after 2 seconds
            setTimeout(() => {
                gsap.to("#loader", {
                    opacity: 0,
                    visibility: 'hidden',
                    duration: 0.8,
                    onComplete: () => {
                        document.getElementById('loader').remove();
                    }
                });
            }, 2000);

            // Header scroll effect
            window.addEventListener('scroll', () => {
                const header = document.getElementById('header');
                if (window.scrollY > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // GSAP animations for hero section
            gsap.registerPlugin(ScrollTrigger);
            
            // Hero section animations
            gsap.from('.hero-content h2', {
                y: 50,
                opacity: 0,
                duration: 1,
                delay: 0.5
            });
            
            gsap.from('.hero-content p', {
                y: 30,
                opacity: 0,
                duration: 1,
                delay: 0.8
            });
            
            gsap.from('.hero-buttons', {
                y: 30,
                opacity: 0,
                duration: 1,
                delay: 1.1
            });
            
            gsap.from('.hero-image', {
                x: 100,
                opacity: 0,
                duration: 1.2,
                delay: 0.7,
                ease: 'power3.out'
            });
            
            // Features animations
             gsap.from('.section-header', {
                scrollTrigger: {
                    trigger: '.features',
                    start: 'top 80%'
                },
                y: 50,
                opacity: 0,
                duration: 1
            });
            
            
             gsap.to('.feature-card', {
                scrollTrigger: {
                    trigger: '.features-grid',
                    start: 'top 85%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                stagger: 0.15,
                duration: 0.8,
                onComplete: function() {
                    // Ajoute une classe pour maintenir l'état après l'animation
                    document.querySelectorAll('.feature-card').forEach(card => {
                        card.classList.add('animated');
                    });
                }
            });
            
            // How it works animations
            gsap.from('.step', {
                scrollTrigger: {
                    trigger: '.how-it-works',
                    start: 'top 80%'
                },
                y: 50,
                opacity: 0,
                stagger: 0.2,
                duration: 0.8
            });
            
            // Testimonials slider
            const sliderContainer = document.querySelector('.slider-container');
            const sliderDots = document.querySelectorAll('.slider-dot');
            let currentSlide = 0;
            const slideCount = document.querySelectorAll('.testimonial-card').length;
            
            function goToSlide(index) {
                currentSlide = index;
                sliderContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
                
                // Update dots
                sliderDots.forEach((dot, i) => {
                    if (i === currentSlide) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            }
            
            // Add click events to dots
            sliderDots.forEach(dot => {
                dot.addEventListener('click', () => {
                    const index = parseInt(dot.getAttribute('data-index'));
                    goToSlide(index);
                });
            });
            
            // Auto slide
            setInterval(() => {
                currentSlide = (currentSlide + 1) % slideCount;
                goToSlide(currentSlide);
            }, 5000);
            
            // Animate testimonials on scroll
            gsap.from('.testimonials-slider', {
                scrollTrigger: {
                    trigger: '.testimonials',
                    start: 'top 80%'
                },
                y: 50,
                opacity: 0,
                duration: 1
            });
            
            // FAQ functionality
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                question.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    
                    // Close all items
                    faqItems.forEach(i => i.classList.remove('active'));
                    
                    // Open clicked item if it was closed
                    if (!isActive) {
                        item.classList.add('active');
                    }
                });
            });
            
            // CTA animation
            gsap.from('.cta', {
                scrollTrigger: {
                    trigger: '.cta',
                    start: 'top 80%'
                },
                y: 50,
                opacity: 0,
                duration: 1
            });
            
            // Footer animation
            gsap.from('.footer-grid', {
                scrollTrigger: {
                    trigger: 'footer',
                    start: 'top 80%'
                },
                y: 50,
                opacity: 0,
                duration: 1
            });
        });
    </script>
</body>
</html>