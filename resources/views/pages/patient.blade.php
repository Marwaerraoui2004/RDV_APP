<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace Patient - MediConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <style>
        :root {
            --primary: #3a86ff;
            --primary-dark: #2667cc;
            --secondary: #ff006e;
            --accent: #8338ec;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #38b000;
            --warning: #ecc94b;
            --danger: #e53e3e;
            --text-dark: #2d3748;
            --text-light: #718096;
            --card-shadow: 0 15px 30px rgba(0,0,0,0.1);
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            --border-radius: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            color: var(--text-dark);
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
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
            opacity: 0.3;
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

        /* Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: white;
            box-shadow: var(--card-shadow);
            padding: 1.5rem 0;
            height: 100vh;
            position: fixed;
            z-index: 100;
            transition: var(--transition);
            overflow-y: auto;
        }

        .logo {
            display: flex;
            align-items: center;
            padding: 0 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            margin-bottom: 1.5rem;
        }

        .logo i {
            font-size: 2rem;
            color: var(--accent);
            margin-right: 12px;
        }

        .logo h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-item {
            padding: 0.9rem 1.5rem;
            display: flex;
            align-items: center;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            margin: 0.3rem 0.5rem;
            border-radius: var(--border-radius);
        }

        .nav-item i {
            font-size: 1.2rem;
            width: 30px;
            color: var(--primary);
            transition: var(--transition);
        }

        .nav-item:hover {
            background: rgba(58, 134, 255, 0.1);
            color: var(--primary);
        }

        .nav-item:hover i {
            color: var(--accent);
        }

        .nav-item.active {
            background: rgba(58, 134, 255, 0.15);
            color: var(--primary);
            font-weight: 600;
        }

        .nav-item.active i {
            color: var(--accent);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .header-title h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            color: var(--primary);
            font-weight: 700;
        }

        .header-title p {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 0.8rem 1rem 0.8rem 45px;
            border: 2px solid rgba(0,0,0,0.05);
            border-radius: 50px;
            width: 280px;
            font-size: 0.95rem;
            transition: var(--transition);
            background: white;
        }

        .search-box input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(58, 134, 255, 0.2);
        }

        .search-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.7rem 1.2rem;
            background: white;
            border-radius: 50px;
            box-shadow: var(--card-shadow);
            cursor: pointer;
            transition: var(--transition);
        }

        .user-profile:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .user-info h4 {
            font-size: 0.95rem;
            font-weight: 600;
        }

        .user-info p {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            padding: 15px;
            width: 200px;
            z-index: 9999;;
            display: none;
            margin-top: 10px;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px 15px;
            color: var(--text-dark);
            text-decoration: none;
            border-radius: 8px;
            transition: var(--transition);
            margin: 5px 0;
        }

        .dropdown-menu a:hover {
            background: rgba(58, 134, 255, 0.1);
            color: var(--primary);
        }

        .btn-logout {
            width: 100%;
            padding: 10px 15px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            margin-top: 10px;
        }

        .btn-logout:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(131, 56, 236, 0.3);
        }

        /* Stats Dashboard */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.8rem;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            z-index: -1;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--accent));
            z-index: -1;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .stat-title {
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-light);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            background: rgba(58, 134, 255, 0.1);
            color: var(--accent);
        }

        .stat-value {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-change {
            font-size: 0.9rem;
            color: var(--success);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .stat-change.negative {
            color: var(--danger);
        }

        /* Main Content Area */
        .content-row {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.8rem;
            margin-bottom: 2rem;
        }

        /* Cards */
        .card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: var(--transition);
            position: relative;
            z-index: -1;
            margin: 5px;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            padding: 1.3rem 1.8rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary);
        }

        .card-action {
            color: var(--accent);
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .card-action:hover {
            color: var(--primary);
        }

        .card-body {
            padding: 1.8rem;
        }

        /* Appointments */
        .appointment-list {
            list-style: none;
        }

        .appointment-item {
            display: flex;
            align-items: center;
            padding: 1.2rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            transition: var(--transition);
        }

        .appointment-item:hover {
            background: rgba(58, 134, 255, 0.03);
        }

        .appointment-item:last-child {
            border-bottom: none;
        }

        .appointment-time {
            background: rgba(58, 134, 255, 0.1);
            border-radius: 12px;
            padding: 0.9rem;
            text-align: center;
            min-width: 100px;
            margin-right: 1.5rem;
        }

        .appointment-time .time {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--primary);
        }

        .appointment-time .date {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .appointment-info h4 {
            font-size: 1.1rem;
            margin-bottom: 0.4rem;
            color: var(--text-dark);
        }

        .appointment-info p {
            font-size: 0.95rem;
            color: var(--text-light);
            margin-bottom: 0.6rem;
            display: flex;
            align-items: center;
        }

        .appointment-info p i {
            margin-right: 8px;
            color: var(--accent);
        }

        .appointment-status {
            display: inline-block;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-confirmed {
            background: rgba(56, 182, 161, 0.15);
            color: var(--success);
        }

        .status-pending {
            background: rgba(236, 201, 75, 0.15);
            color: var(--warning);
        }

        /* Doctors List */
        .doctor-list {
            list-style: none;
        }

        .doctor-item {
            display: flex;
            align-items: center;
            padding: 1.2rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            transition: var(--transition);
        }

        .doctor-item:hover {
            background: rgba(58, 134, 255, 0.03);
        }

        .doctor-item:last-child {
            border-bottom: none;
        }

        .doctor-avatar {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.2rem;
            color: white;
            font-weight: 600;
            font-size: 1.3rem;
        }

        .doctor-info h4 {
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
        }

        .doctor-info p {
            font-size: 0.95rem;
            color: var(--text-light);
            display: flex;
            align-items: center;
        }

        .doctor-info p i {
            margin-right: 8px;
            color: var(--accent);
        }

        .doctor-action {
            margin-left: auto;
            padding: 0.6rem 1.2rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50px;
            color: white;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            outline: none;
        }

        .doctor-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(131, 56, 236, 0.3);
        }

        /* Health Indicators */
        .health-indicators {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.2rem;
        }

        .indicator-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            text-align: center;
            transition: var(--transition);
        }

        .indicator-card:hover {
            transform: translateY(-5px);
        }

        .indicator-title {
            font-size: 1rem;
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .indicator-value {
            font-size: 1.9rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }

        .indicator-range {
            height: 8px;
            background: #e2e8f0;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 0.8rem;
        }

        .indicator-progress {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-radius: 4px;
        }

        .indicator-info {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        /* Documents */
        .documents-list {
            list-style: none;
        }

        .document-item {
            display: flex;
            align-items: center;
            padding: 1.2rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            transition: var(--transition);
        }

        .document-item:hover {
            background: rgba(58, 134, 255, 0.03);
        }

        .document-item:last-child {
            border-bottom: none;
        }

        .document-icon {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            background: rgba(56, 182, 161, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.2rem;
            color: var(--accent);
            font-size: 1.5rem;
        }

        .document-info h4 {
            font-size: 1.05rem;
            margin-bottom: 0.3rem;
        }

        .document-info p {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .document-action {
            margin-left: auto;
            padding: 0.5rem;
            background: transparent;
            border: none;
            color: var(--accent);
            font-size: 1.3rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .document-action:hover {
            color: var(--primary);
            transform: translateY(-3px);
        }

        /* Quick Actions */
        .quick-actions {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .action-btn {
            padding: 1rem;
            border-radius: var(--border-radius);
            color: white;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .action-btn.appointment {
            background: linear-gradient(135deg, var(--primary), var(--accent));
        }

        .action-btn.advice {
            background: linear-gradient(135deg, var(--success), #2b9c72);
        }

        .action-btn.document {
            background: linear-gradient(135deg, var(--warning), #d4a62c);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .content-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
            }
            
            .sidebar .logo h1,
            .sidebar .nav-item span {
                display: none;
            }
            
            .sidebar .logo {
                justify-content: center;
                padding: 0 0.5rem 1rem;
            }
            
            .sidebar .nav-item {
                justify-content: center;
                padding: 1rem;
            }
            
            .sidebar .nav-item i {
                margin-right: 0;
                font-size: 1.4rem;
            }
            
            .main-content {
                margin-left: 80px;
            }
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.2rem;
            }
            
            .header-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .search-box input {
                width: 100%;
            }
            
            .health-indicators {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            
            .main-content {
                margin-left: 0;
                padding: 1.5rem;
            }
            
            .stat-card {
                padding: 1.5rem;
            }
            
            .stat-value {
                font-size: 1.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Floating background elements -->
    <div class="floating-element element-1"></div>
    <div class="floating-element element-2"></div>
    <div class="floating-element element-3"></div>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <i class="fas fa-heartbeat"></i>
                <h1>MediConnect</h1>
            </div>
            
            <nav>
                <a href="#" class="nav-item active">
                    <i class="fas fa-home"></i>
                    <span>Tableau de bord</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-calendar-check"></i>
                    <span>Mes rendez-vous</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-user-md"></i>
                    <span>Mes médecins</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-file-medical"></i>
                    <span>Mes documents</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-prescription"></i>
                    <span>Mes ordonnances</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-heart"></i>
                    <span>Ma santé</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-comments"></i>
                    <span>Messagerie</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-cog"></i>
                    <span>Paramètres</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-title">
                    <h2>Mon Espace Patient</h2>
                    <p>Bonjour Marie Dupont, voici votre tableau de bord</p>
                </div>
                
                <div class="header-actions">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Rechercher...">
                    </div>
                    
                    <div class="user-profile" onclick="toggleDropdown()">
                        <div class="user-avatar">MD</div>
                        <div class="user-info">
                            <h4>Marie Dupont</h4>
                            <p>Patient</p>
                        </div>
                        <i class="fas fa-chevron-down"></i>

                        <div id="dropdownMenu" class="dropdown-menu">
                            <a href="#"><i class="fas fa-user"></i> Mon profil</a>
                            <a href="#"><i class="fas fa-cog"></i> Paramètres</a>
                            <a href="#"><i class="fas fa-question-circle"></i> Aide</a>
                            <button class="btn-logout"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Stats Dashboard -->
            <div class="dashboard-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Rendez-vous à venir</div>
                        <div class="stat-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                    <div class="stat-value">2</div>
                    <div class="stat-change"><i class="fas fa-clock"></i> Prochain dans 3 jours</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Médecins suivis</div>
                        <div class="stat-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                    </div>
                    <div class="stat-value">3</div>
                    <div class="stat-change"><i class="fas fa-user-plus"></i> Dernier ajout: Dr. Martin</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Dernière consultation</div>
                        <div class="stat-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                    </div>
                    <div class="stat-value">15 jours</div>
                    <div class="stat-change"><i class="fas fa-calendar-alt"></i> Prochaine dans 1 mois</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Documents médicaux</div>
                        <div class="stat-icon">
                            <i class="fas fa-file-medical"></i>
                        </div>
                    </div>
                    <div class="stat-value">12</div>
                    <div class="stat-change"><i class="fas fa-history"></i> Dernier ajouté hier</div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="content-row">
                <!-- Left Column -->
                <div class="left-column">
                    <!-- Rendez-vous à venir -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Mes prochains rendez-vous</div>
                            <div class="card-action">Voir tout</div>
                        </div>
                        <div class="card-body">
                            <ul class="appointment-list">
                                <li class="appointment-item">
                                    <div class="appointment-time">
                                        <div class="time">09:30</div>
                                        <div class="date">Lun 15 Oct</div>
                                    </div>
                                    <div class="appointment-info">
                                        <h4>Dr. David Martin</h4>
                                        <p><i class="fas fa-stethoscope"></i> Cardiologie</p>
                                        <span class="appointment-status status-confirmed">Confirmé</span>
                                    </div>
                                </li>
                                <li class="appointment-item">
                                    <div class="appointment-time">
                                        <div class="time">11:00</div>
                                        <div class="date">Mer 24 Oct</div>
                                    </div>
                                    <div class="appointment-info">
                                        <h4>Dr. Sophie Bernard</h4>
                                        <p><i class="fas fa-eye"></i> Ophtalmologie</p>
                                        <span class="appointment-status status-pending">En attente</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Mes médecins -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Mes médecins</div>
                            <div class="card-action">Tous voir</div>
                        </div>
                        <div class="card-body">
                            <ul class="doctor-list">
                                <li class="doctor-item">
                                    <div class="doctor-avatar">DM</div>
                                    <div class="doctor-info">
                                        <h4>Dr. David Martin</h4>
                                        <p><i class="fas fa-heartbeat"></i> Cardiologue</p>
                                    </div>
                                    <button class="doctor-action">Contacter</button>
                                </li>
                                <li class="doctor-item">
                                    <div class="doctor-avatar">SB</div>
                                    <div class="doctor-info">
                                        <h4>Dr. Sophie Bernard</h4>
                                        <p><i class="fas fa-eye"></i> Ophtalmologue</p>
                                    </div>
                                    <button class="doctor-action">Contacter</button>
                                </li>
                                <li class="doctor-item">
                                    <div class="doctor-avatar">JL</div>
                                    <div class="doctor-info">
                                        <h4>Dr. Jean Lefebvre</h4>
                                        <p><i class="fas fa-bone"></i> Rhumatologue</p>
                                    </div>
                                    <button class="doctor-action">Contacter</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column -->
                <div class="right-column">
                    <!-- Indicateurs de santé -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Mes indicateurs de santé</div>
                        </div>
                        <div class="card-body">
                            <div class="health-indicators">
                                <div class="indicator-card">
                                    <div class="indicator-title">Tension artérielle</div>
                                    <div class="indicator-value">125/80</div>
                                    <div class="indicator-range">
                                        <div class="indicator-progress" style="width: 75%"></div>
                                    </div>
                                    <div class="indicator-info">Dans la norme</div>
                                </div>
                                <div class="indicator-card">
                                    <div class="indicator-title">Fréquence cardiaque</div>
                                    <div class="indicator-value">72 bpm</div>
                                    <div class="indicator-range">
                                        <div class="indicator-progress" style="width: 65%"></div>
                                    </div>
                                    <div class="indicator-info">Normale</div>
                                </div>
                                <div class="indicator-card">
                                    <div class="indicator-title">Glycémie</div>
                                    <div class="indicator-value">1.0 g/L</div>
                                    <div class="indicator-range">
                                        <div class="indicator-progress" style="width: 40%"></div>
                                    </div>
                                    <div class="indicator-info">Dans la norme</div>
                                </div>
                                <div class="indicator-card">
                                    <div class="indicator-title">IMC</div>
                                    <div class="indicator-value">22.3</div>
                                    <div class="indicator-range">
                                        <div class="indicator-progress" style="width: 55%"></div>
                                    </div>
                                    <div class="indicator-info">Poids normal</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Documents récents -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Derniers documents</div>
                            <div class="card-action">Tous voir</div>
                        </div>
                        <div class="card-body">
                            <ul class="documents-list">
                                <li class="document-item">
                                    <div class="document-icon">
                                        <i class="fas fa-file-medical"></i>
                                    </div>
                                    <div class="document-info">
                                        <h4>Compte rendu cardiologique</h4>
                                        <p>Ajouté le 05/10/2023</p>
                                    </div>
                                    <button class="document-action">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </li>
                                <li class="document-item">
                                    <div class="document-icon">
                                        <i class="fas fa-prescription"></i>
                                    </div>
                                    <div class="document-info">
                                        <h4>Ordonnance médicamenteuse</h4>
                                        <p>Ajoutée le 02/10/2023</p>
                                    </div>
                                    <button class="document-action">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </li>
                                <li class="document-item">
                                    <div class="document-icon">
                                        <i class="fas fa-file-contract"></i>
                                    </div>
                                    <div class="document-info">
                                        <h4>Résultats d'analyses</h4>
                                        <p>Ajoutés le 28/09/2023</p>
                                    </div>
                                    <button class="document-action">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Actions rapides -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Actions rapides</div>
                        </div>
                        <div class="card-body">
                            <div class="quick-actions">
                                <div class="action-btn appointment">
                                    <i class="fas fa-calendar-plus"></i>
                                    <a href="" style="text-decoration: none; color: inherit;">Prendre rendez-vous</a>
                                </div>
                                <div class="action-btn advice">
                                    <i class="fas fa-comment-medical"></i> 
                                    <a href="" style="text-decoration: none; color: inherit;">Demander conseil</a>
                                </div>
                                <div class="action-btn document">
                                    <i class="fas fa-file-upload"></i> 
                                    <a href="" style="text-decoration: none; color: inherit;">Ajouter un document</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // GSAP Animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animer les éléments au chargement
            gsap.registerPlugin(ScrollTrigger);
            
            // Animer les statistiques
            gsap.from('.stat-card', {
                scrollTrigger: {
                    trigger: '.dashboard-grid',
                    start: 'top 50%'
                },
                y: 50,
                opacity: 1,
                stagger: 0.15,
                duration: 0.2
            });
            
            // Animer les cartes
            gsap.from('.card', {
                scrollTrigger: {
                    trigger: '.content-row',
                    start: 'top 85%'
                },
                y: 50,
                opacity: 1,
                stagger: 0.2,
                duration: 0.8
            });
            
            // Animation des éléments au survol
            const cards = document.querySelectorAll('.card, .stat-card, .indicator-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    gsap.to(this, {
                        y: -6,
                        duration: 0.4,
                        ease: "power2.out"
                    });
                });
                
                card.addEventListener('mouseleave', function() {
                    gsap.to(this, {
                        y: 0,
                        duration: 0.4,
                        ease: "power2.out"
                    });
                });
            });
        });

        // Toggle dropdown menu
        function toggleDropdown() {
            const menu = document.getElementById('dropdownMenu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const profile = document.querySelector('.user-profile');
            const menu = document.getElementById('dropdownMenu');
            if (!profile.contains(event.target)) {
                menu.style.display = 'none';
            }
        });
        
        // Navigation items animation
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all items
                navItems.forEach(i => i.classList.remove('active'));
                
                // Add active class to clicked item
                this.classList.add('active');
                
                // Animation
                gsap.from(this, {
                    scale: 0.95,
                    duration: 0.3,
                    ease: "back.out(1.7)"
                });
            });
        });
        
        // Appointment status animation
        const statusItems = document.querySelectorAll('.appointment-status');
        statusItems.forEach(status => {
            status.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    scale: 1.05,
                    duration: 0.2
                });
            });
            
            status.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    scale: 1,
                    duration: 0.2
                });
            });
        });
    </script>
</body>
</html>