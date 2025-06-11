<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediConnect - Présentation Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/TextPlugin.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #0d4a75;
            --secondary: #1a6b9f;
            --accent: #38b6a1;
            --light: #f0f7ff;
            --dark: #1c3d5a;
            --text-dark: #2d3748;
            --text-light: #718096;
            --transition: all 0.4s ease;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f5f9fc 0%, #e6f0f5 100%);
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Header & Navigation */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 1.5rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            transition: var(--transition);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.85);
            box-shadow: 0 5px 20px rgba(13, 74, 117, 0.05);
        }

        header.scrolled {
            padding: 1rem 5%;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 5px 20px rgba(13, 74, 117, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo i {
            font-size: 2.2rem;
            color: var(--accent);
            margin-right: 12px;
        }

        .logo h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
        }

        .nav-buttons {
            display: flex;
            gap: 1.2rem;
        }

        .btn {
            padding: 0.8rem 1.8rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            outline: none;
            position: relative;
            overflow: hidden;
            z-index: 1;
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
        }

        .btn-register {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
            box-shadow: 0 5px 15px rgba(13, 74, 117, 0.3);
        }

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(13, 74, 117, 0.4);
            background: linear-gradient(45deg, var(--secondary), var(--accent));
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 5%;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 650px;
            z-index: 2;
            padding-top: 6rem;
        }

        .hero h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 3.5rem;
            line-height: 1.2;
            color: var(--primary);
            margin-bottom: 1.5rem;
            font-weight: 800;
        }

        .hero h2 span {
            color: var(--accent);
            position: relative;
        }

        .hero h2 span::after {
            content: "";
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 100%;
            height: 15px;
            background: rgba(56, 182, 161, 0.25);
            z-index: -1;
        }

        .hero p {
            font-size: 1.3rem;
            color: var(--text-dark);
            margin-bottom: 2.5rem;
            max-width: 600px;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .btn-large {
            padding: 1.1rem 2.5rem;
            font-size: 1.1rem;
            border-radius: 50px;
        }

        .hero-image {
            position: absolute;
            right: 5%;
            top: 50%;
            transform: translateY(-50%);
            width: 45%;
            max-width: 700px;
            z-index: 1;
        }

        .hero-image img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(13, 74, 117, 0.2);
        }

        /* Floating elements */
        .floating-element {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            z-index: 0;
            opacity: 0.7;
        }

        .element-1 {
            width: 400px;
            height: 400px;
            top: 20%;
            left: 10%;
            background: radial-gradient(circle, rgba(56, 182, 161, 0.4) 0%, transparent 70%);
        }

        .element-2 {
            width: 300px;
            height: 300px;
            bottom: 30%;
            right: 20%;
            background: radial-gradient(circle, rgba(13, 74, 117, 0.4) 0%, transparent 70%);
        }

        .element-3 {
            width: 200px;
            height: 200px;
            top: 50%;
            left: 30%;
            background: radial-gradient(circle, rgba(26, 107, 159, 0.4) 0%, transparent 70%);
        }

        /* Features Section */
        .features {
            padding: 8rem 5%;
            background: white;
            position: relative;
            overflow: hidden;
        }

        .section-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 5rem;
        }

        .section-header h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 2.8rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .section-header p {
            font-size: 1.2rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
        }

        .feature-card {
            background: var(--light);
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
            transition: var(--transition);
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--accent), var(--secondary));
        }

        .feature-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(13, 74, 117, 0.15);
        }

        .feature-icon {
            width: 90px;
            height: 90px;
            background: rgba(56, 182, 161, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.5rem;
            color: var(--accent);
            transition: var(--transition);
        }

        .feature-card:hover .feature-icon {
            background: var(--accent);
            color: white;
            transform: scale(1.1);
        }

        .feature-card h3 {
            font-size: 1.6rem;
            color: var(--primary);
            margin-bottom: 1.2rem;
            font-weight: 600;
        }

        .feature-card p {
            color: var(--text-light);
            font-size: 1.1rem;
        }

        /* Testimonials */
        .testimonials {
            padding: 8rem 5%;
            background: linear-gradient(135deg, var(--dark) 0%, var(--primary) 100%);
            color: white;
            position: relative;
            overflow: hidden;
            clip-path: polygon(0 10%, 100% 0, 100% 90%, 0 100%);
        }

        .testimonials::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 10% 20%, rgba(56, 182, 161, 0.15) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(13, 74, 117, 0.2) 0%, transparent 25%);
            pointer-events: none;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            max-width: 1300px;
            margin: 0 auto;
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 2.5rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.12);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .testimonial-card::before {
            content: """;
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 6rem;
            color: rgba(255, 255, 255, 0.1);
            font-family: serif;
            line-height: 1;
        }

        .testimonial-content {
            font-size: 1.1rem;
            font-style: italic;
            margin-bottom: 1.8rem;
            position: relative;
            z-index: 2;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .author-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.2rem;
            font-weight: 600;
            color: var(--primary);
            font-size: 1.4rem;
        }

        .author-info h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.3rem;
        }

        .author-info p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
        }

        /* CTA Section */
        .cta {
            padding: 8rem 5%;
            text-align: center;
            background: white;
            position: relative;
            overflow: hidden;
        }

        .cta-content {
            max-width: 800px;
            margin: 0 auto;
            background: linear-gradient(135deg, var(--light) 0%, #e0f0f7 100%);
            padding: 5rem;
            border-radius: 25px;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .cta h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 2.8rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .cta p {
            font-size: 1.3rem;
            color: var(--text-light);
            margin-bottom: 2.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 5rem 5% 3rem;
            position: relative;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            max-width: 1300px;
            margin: 0 auto 4rem;
        }

        .footer-col h3 {
            font-size: 1.4rem;
            margin-bottom: 1.8rem;
            position: relative;
            padding-bottom: 0.8rem;
        }

        .footer-col h3::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--accent);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-links a i {
            margin-right: 10px;
            color: var(--accent);
            font-size: 0.9rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
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
            background: var(--accent);
            transform: translateY(-5px);
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
        }

        /* Animations */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }

        @keyframes pulse {
            0% { transform: scale(0.95); opacity: 0.7; }
            50% { transform: scale(1); opacity: 1; }
            100% { transform: scale(0.95); opacity: 0.7; }
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .hero h2 {
                font-size: 3rem;
            }
            .hero-image {
                width: 40%;
            }
        }

        @media (max-width: 992px) {
            .hero {
                flex-direction: column;
                text-align: center;
                padding-top: 8rem;
            }
            .hero-content {
                max-width: 100%;
                padding-top: 0;
            }
            .hero-buttons {
                justify-content: center;
            }
            .hero-image {
                position: relative;
                width: 80%;
                margin-top: 4rem;
                right: auto;
                top: auto;
                transform: none;
            }
            .hero p {
                margin-left: auto;
                margin-right: auto;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 1.2rem 5%;
            }
            .hero h2 {
                font-size: 2.5rem;
            }
            .hero p {
                font-size: 1.1rem;
            }
            .section-header h2 {
                font-size: 2.2rem;
            }
            .btn-large {
                padding: 1rem 2rem;
                font-size: 1rem;
            }
            .cta-content {
                padding: 3rem 2rem;
            }
            .cta h2 {
                font-size: 2.2rem;
            }
            .cta p {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .nav-buttons {
                gap: 0.8rem;
            }
            .btn {
                padding: 0.6rem 1.2rem;
                font-size: 0.9rem;
            }
            .hero h2 {
                font-size: 2rem;
            }
            .hero-buttons {
                flex-direction: column;
                gap: 1rem;
            }
            .hero-image {
                width: 100%;
            }
            .feature-card {
                padding: 2rem;
            }
            .section-header h2 {
                font-size: 1.8rem;
            }
            .section-header p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
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
            <a href="/login" class="btn btn-login">Connexion</a>
            <a href="/register" class="btn btn-register">Inscription</a>
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
        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" alt="MediConnect Plateforme Médicale">
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
                <p>Prenez, modifiez ou annulez vos rendez-vous en quelques clics, 24h/24 et 7j/7.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-file-medical"></i>
                </div>
                <h3>Dossier médical sécurisé</h3>
                <p>Tous vos documents médicaux centralisés et accessibles en toute sécurité.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-comments-medical"></i>
                </div>
                <h3>Messagerie médicale</h3>
                <p>Échangez en toute confidentialité avec vos professionnels de santé.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <h3>Trouver un spécialiste</h3>
                <p>Accédez à notre réseau de professionnels de santé qualifiés et vérifiés.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <h3>Rappels intelligents</h3>
                <p>Ne manquez plus jamais un rendez-vous ou une prise de médicament.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Suivi santé personnalisé</h3>
                <p>Visualisez l'évolution de vos indicateurs de santé au fil du temps.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="section-header">
            <h2>Ce que nos utilisateurs disent</h2>
            <p>Découvrez les témoignages de nos patients et médecins satisfaits</p>
        </div>
        <div class="testimonials-grid">
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
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="cta-content">
            <h2>Prêt à prendre le contrôle de votre santé ?</h2>
            <p>Rejoignez des milliers de patients et professionnels de santé qui utilisent déjà MediConnect</p>
            <div class="hero-buttons">
                <button class="btn btn-register btn-large">Créer un compte</button>
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
            <p>&copy; 2023 MediConnect. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        // Enregistrer les plugins GSAP
        gsap.registerPlugin(ScrollTrigger, TextPlugin);

        // Animation du header
        gsap.from('.logo', {
            opacity: 0,
            y: -20,
            duration: 1.5,
            ease: "elastic.out(1, 0.8)",
            delay: 0.3
        });

        gsap.from('.nav-buttons', {
            opacity: 0,
            y: -20,
            duration: 1.5,
            ease: "elastic.out(1, 0.8)",
            delay: 0.5
        });

        // Animation de la section hero
        const heroTimeline = gsap.timeline();
        heroTimeline
            .from('.hero-content', {
                opacity: 0,
                y: 50,
                duration: 1.5,
                ease: "power3.out"
            })
            .from('.hero p', {
                opacity: 0,
                y: 30,
                duration: 1,
                ease: "power3.out"
            }, "-=0.8")
            .from('.hero-buttons', {
                opacity: 0,
                y: 30,
                duration: 1,
                stagger: 0.2,
                ease: "power3.out"
            }, "-=0.7")
            .from('.hero-image', {
                opacity: 0,
                y: 50,
                rotationY: 30,
                duration: 1.5,
                ease: "power3.out"
            }, "-=1");

        // Animation des éléments flottants
        gsap.to('.element-1', {
            y: 30,
            duration: 4,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });

        gsap.to('.element-2', {
            y: -40,
            duration: 5,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });

        gsap.to('.element-3', {
            y: 20,
            duration: 3,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });

        // Animation de texte dynamique
        gsap.to("h2 span", {
            text: {
                value: ["connectée", "simplifiée", "sécurisée", "révolutionnée"],
                delimiter: " "
            },
            duration: 3,
            repeat: -1,
            repeatDelay: 1,
            ease: "none"
        });

        // Animation des sections au défilement
        gsap.utils.toEach(".section-header, .feature-card, .testimonial-card, .cta-content", (element) => {
            gsap.fromTo(element,
                { opacity: 0, y: 50 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 1,
                    scrollTrigger: {
                        trigger: element,
                        start: "top 80%",
                        end: "bottom 20%",
                        toggleActions: "play none none none",
                        markers: false
                    },
                    ease: "power3.out"
                }
            );
        });

        // Animation au survol des cartes
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                gsap.to(card, {
                    y: -15,
                    scale: 1.03,
                    duration: 0.5,
                    ease: "power2.out"
                });
                gsap.to(card.querySelector('.feature-icon'), {
                    y: -10,
                    scale: 1.1,
                    duration: 0.5,
                    ease: "power2.out",
                    backgroundColor: "rgba(56, 182, 161, 0.2)"
                });
            });
            
            card.addEventListener('mouseleave', () => {
                gsap.to(card, {
                    y: 0,
                    scale: 1,
                    duration: 0.7,
                    ease: "elastic.out(1, 0.8)"
                });
                gsap.to(card.querySelector('.feature-icon'), {
                    y: 0,
                    scale: 1,
                    duration: 0.7,
                    ease: "elastic.out(1, 0.8)",
                    backgroundColor: "rgba(56, 182, 161, 0.1)"
                });
            });
        });

        // Animation des boutons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                gsap.to(btn, {
                    y: -5,
                    duration: 0.3,
                    ease: "power2.out"
                });
            });
            
            btn.addEventListener('mouseleave', () => {
                gsap.to(btn, {
                    y: 0,
                    duration: 0.5,
                    ease: "elastic.out(1, 0.8)"
                });
            });
        });

        // Animation du texte dans le header
        gsap.to(".logo h1", {
            text: "MediConnect Pro",
            duration: 2,
            delay: 2,
            ease: "power2.inOut",
            repeat: 1,
            yoyo: true
        });

        // Animation de parallaxe pour les témoignages
        gsap.to(".testimonials", {
            backgroundPosition: "50% 100%",
            ease: "none",
            scrollTrigger: {
                trigger: ".testimonials",
                start: "top bottom",
                end: "bottom top",
                scrub: true
            }
        });

        // Effet de vague sur le footer
        gsap.to("footer", {
            backgroundPosition: "0% 100%",
            ease: "none",
            scrollTrigger: {
                trigger: "footer",
                start: "top bottom",
                end: "bottom top",
                scrub: true
            }
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>