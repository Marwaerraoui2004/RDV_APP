<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Médecin - MediConnect</title>
    
    <!-- Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    
    <!-- Styles -->
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
            position: relative;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            position: relative;
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
            position: relative;
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
            position: relative;
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

        /* MODIFICATIONS POUR LE DROPDOWN */
        .user-profile-container {
            position: relative;
        }
        
        .dropdown-menu {
            position: absolute;
            top: calc(100% + 15px);
            right: 0;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 15px;
            width: 220px;
            z-index: 10000; /* Très élevé pour être au-dessus de tout */
            display: none;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        
        .dropdown-menu.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .dropdown-menu a {
            display: flex;
            align-items: center;
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
        
        .dropdown-menu a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
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
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--accent));
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

        /* Recent Patients */
        .patient-list {
            list-style: none;
        }

        .patient-item {
            display: flex;
            align-items: center;
            padding: 1.2rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            transition: var(--transition);
        }

        .patient-item:hover {
            background: rgba(58, 134, 255, 0.03);
        }

        .patient-item:last-child {
            border-bottom: none;
        }

        .patient-avatar {
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

        .patient-info h4 {
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
        }

        .patient-info p {
            font-size: 0.95rem;
            color: var(--text-light);
            display: flex;
            align-items: center;
        }

        .patient-info p i {
            margin-right: 8px;
            color: var(--accent);
        }

        .patient-action {
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

        .patient-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(131, 56, 236, 0.3);
        }

        /* Calendar */
        .calendar-container {
            padding: 1.5rem;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .calendar-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary);
        }

        .calendar-nav {
            display: flex;
            gap: 5px;
        }

        .calendar-nav button {
            background: white;
            border: 2px solid rgba(0,0,0,0.05);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin: 0;
            cursor: pointer;
            color: var(--primary);
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .calendar-nav button:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
            text-align: center;
        }

        .calendar-day {
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.8rem 0.5rem;
            color: var(--text-light);
        }

        .calendar-date {
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
        }

        .calendar-date:hover {
            background: rgba(58, 134, 255, 0.1);
            transform: scale(1.1);
        }

        .calendar-date.today {
            background: var(--primary);
            color: white;
            font-weight: 600;
        }

        .calendar-date.event {
            position: relative;
        }

        .calendar-date.event::after {
            content: "";
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--accent);
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

        .action-btn.prescription {
            background: linear-gradient(135deg, var(--success), #2b9c72);
        }

        .action-btn.patient {
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
        
        /* Correction du problème d'animation */
        .dashboard-grid, .content-row {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        
        .dashboard-grid.visible, .content-row.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Floating background elements -->
    <div class="floating-element element-1"></div>
    <div class="floating-element element-2"></div>
    <div class="floating-element element-3"></div>

    <div class="dashboard-container">
        <!-- Sidebar Médecin -->
        <aside class="sidebar">
            <div class="logo">
                <i class="fas fa-user-md"></i>
                <h1>MediConnect</h1>
            </div>
            
            <nav>
                <a href="{{ route('docteur.dashboard') }}" class="nav-item {{ request()->routeIs('docteur.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Tableau de bord</span>
                </a>
                <a href="{{ route('docteur.rendezvous.index') }}" class="nav-item {{ request()->routeIs('docteur.rendezvous.index') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i>
                    <span>Mes rendez-vous</span>
                </a>
                <a href="{{ route('docteur.patients') }}" class="nav-item {{ request()->routeIs('docteur.patients') ? 'active' : '' }}">
                    <i class="fas fa-procedures"></i>
                    <span>Mes patients</span>
                </a>
                <a href="{{ route('docteur.documents.index') }}" class="nav-item {{ request()->routeIs('docteur.documents.index') ? 'active' : '' }}">
                    <i class="fas fa-file-medical"></i>
                    <span>Documents médicaux</span>
                </a>
                <a href="{{ route('docteur.messagerie') }}" class="nav-item">
                    <i class="fas fa-comments"></i>
                    <span>Messagerie</span>
                </a>
                <a href="{{ route('docteur.parametres') }}" class="nav-item">
                    <i class="fas fa-cog"></i>
                    <span>Paramètres</span>
                </a>
                 <a href="{{ route('docteur.prescription') }}" class="nav-item">
                    <i class="fas fa-prescription"></i>
                    <span>Ordonnances</span>
                </a>
                 <a href="#" class="nav-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Statistiques</span>
                </a>
                 <a href="#" class="nav-item">
                    <i class="fas fa-question-circle"></i>
                    <span>Aide & Support</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-title">
                    <h2>Mon Espace Médecin</h2>
                    <p>Bonjour Dr. {{Auth::user()->name}}, voici votre tableau de bord</p>
                </div>
                
                <div class="header-actions">
                    <form action="{{ route('docteur.recherche') }}" method="GET" class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" name="q" placeholder="Rechercher patient, rendez-vous...">
                    </form>
                    
                    <div class="user-profile-container">
                        <div class="user-profile" onclick="toggleDropdown()">
                            <div class="user-avatar">
                                Dr. {{ substr(Auth::user()->name, 0, 1) }}{{ substr(Str::after(Auth::user()->name, ' '), 0, 1) }}
                            </div>
                            <div class="user-info">
                                <h4>Dr. {{Auth::user()->name}}</h4>
                                <p>{{Auth::user()->specialty}}</p>
                            </div>
                            <i class="fas fa-chevron-down"></i>
                        </div>

                        <div id="dropdownMenu" class="dropdown-menu">
                            <a href="{{route('profile.update')}}"><i class="fas fa-user"></i> Mon profil</a>
                            <a href="{{route('docteur.parametres')}}"><i class="fas fa-cog"></i> Paramètres</a>
                            <a href="#"><i class="fas fa-question-circle"></i> Aide</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn-logout" type="submit">
                                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Stats Dashboard -->
            <div class="dashboard-grid" id="dashboardGrid">
                <!-- Carte des rendez-vous -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Rendez-vous aujourd'hui</div>
                        <div class="stat-icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $countUpcoming }}</div>
                    @if ($nextAppointmentsList->count() > 0)
                        <div class="stat-change">
                            <i class="fas fa-clock"></i>
                            Prochain à {{ \Carbon\Carbon::parse($nextAppointment->appointment_datetime)->format('H:i') }}
                        </div>
                    @else
                        <div class="stat-change">Aucun rendez-vous aujourd'hui</div>
                    @endif
                </div>

                <!-- Patients suivis -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Patients suivis</div>
                        <div class="stat-icon">
                            <i class="fas fa-procedures"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $countPatients }}</div>
                    <div class="stat-change">
                        <i class="fas fa-user-plus"></i>
                        @if($lastPatient)
                            Dernier : {{ $lastPatient }}
                        @else
                            Aucun patient
                        @endif
                    </div>
                </div>

                <!-- Dernière consultation -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Dernière consultation</div>
                        <div class="stat-icon">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                    </div>
                    <div class="stat-value">
                        {{ $daysSinceLast !== null ? $daysSinceLast . ' jours' : 'Aucune' }}
                    </div>
                    <div class="stat-change">
                        <i class="fas fa-calendar-check"></i> {{ $lastAppointment ? 'Avec ' . optional($lastAppointment->patient)->name : '' }}
                    </div>
                </div>

                <!-- Documents créés -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Documents créés</div>
                        <div class="stat-icon">
                            <i class="fas fa-file-medical-alt"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $countDocuments }}</div>
                    <div class="stat-change">
                        <i class="fas fa-history"></i>
                        @if($lastDocDate)
                            Dernier : {{ $lastDocDate->diffForHumans() }}
                        @else
                            Aucun document
                        @endif
                    </div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="content-row" id="contentRow">
                <!-- Left Column -->
                <div class="left-column">
                    <!-- Rendez-vous à venir -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Mes prochains rendez-vous</div>
                            <div class="card-action"><a href="{{ route('docteur.rendezvous.index') }}">Voir tout</a></div>
                        </div>
                        <div class="card-body card-body-scrollable">
                            <div class="scrollable-container">
                                <ul class="appointment-list">
                                    @forelse ($nextAppointmentsList as $appointment)
                                    <li class="appointment-item">
                                        <div class="appointment-time">
                                            <div class="time">{{ \Carbon\Carbon::parse($appointment->appointment_datetime)->format('H:i') }}</div>
                                            <div class="date">{{ \Carbon\Carbon::parse($appointment->appointment_datetime)->translatedFormat('D d M') }}</div>
                                        </div>
                                        <div class="appointment-info">
                                            <h4>{{ optional($appointment->patient)->name ?? 'Patient inconnu' }}</h4>
                                            <p><i class="fas fa-info-circle"></i> {{ $appointment->notes ? Str::limit($appointment->notes, 30) : 'Aucune note' }}</p>
                                            <span class="appointment-status status-{{ $appointment->status }}">
                                                {{ ucfirst($appointment->status) }}
                                            </span>
                                        </div>
                                        <a href="{{ route('docteur.rendezvous.gerer', $appointment->id) }}" class="doctor-action">Gérer</a>
                                    </li>
                                    @empty
                                        <li class="appointment-item">
                                            <p>Aucun rendez-vous à venir.</p>
                                        </li>
                                    @endforelse        
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Mes patients récents -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Mes patients récents</div>
                            <div class="card-action"><a href="{{ route('docteur.patients') }}">Tous voir</a></div>
                        </div>
                        <div class="card-body card-body-scrollable">
                            <div class="scrollable-container">
                                <ul class="doctor-list">
                                    @forelse ($mesPatients as $patient)
                                    <li class="doctor-item">
                                        <div class="doctor-avatar">
                                            {{ strtoupper(substr($patient->name, 0, 1)) }}{{ strtoupper(substr(Str::after($patient->name, ' '), 0, 1)) }}
                                        </div>
                                        <div class="doctor-info">
                                            <h4>{{ $patient->name }}</h4>
                                            <p><i class="fas fa-birthday-cake"></i> {{ $patient->age }} ans</p>
                                            <p><i class="fas fa-phone"></i> {{ $patient->phone ?? 'Non renseigné' }}</p>
                                        </div>
                                        <a href="{{ route('docteur.messagerie') }}?patient_id={{ $patient->id }}" class="doctor-action">Contacter</a>
                                    </li>
                                    @empty
                                        <li class="doctor-item">
                                            <p>Aucun patient récent.</p>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column -->
                <div class="right-column">
                    <!-- Derniers documents créés -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Mes derniers documents</div>
                            <a href="{{ route('docteur.documents.creer') }}" class="card-action">Créer</a>
                        </div>
                        <div class="card-body card-body-scrollable">
                            <div class="scrollable-container">
                                <ul class="documents-list">
                                    @forelse($documents as $document)
                                    <li class="document-item">
                                        <div class="document-icon">
                                            @if($document->type === 'ordonnance')
                                                <i class="fas fa-prescription"></i>
                                            @elseif($document->type === 'compte-rendu')
                                                <i class="fas fa-file-medical-alt"></i>
                                            @elseif($document->type === 'bilan')
                                                <i class="fas fa-chart-line"></i>
                                            @else
                                                <i class="fas fa-file"></i>
                                            @endif
                                        </div>
                                        <div class="document-info">
                                            <h4>{{ $document->title }}</h4>
                                            <p>Pour {{ optional($document->patient)->name ?? 'Patient inconnu' }}</p>
                                            <p>Créé le {{ $document->created_at->format('d/m/Y') }}</p>
                                        </div>
                                        <div>
                                            <a href="{{ Storage::url($document->file_path) }}" class="document-action" title="Télécharger" download>
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="{{ route('docteur.documents.edit', $document->id) }}" class="document-action" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </li>
                                    @empty
                                        <li class="document-item">
                                            <p>Aucun document créé récemment.</p>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                      <!-- Calendrier -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Calendrier</div>
                        </div>
                        <div class="calendar-container">
                            <div class="calendar-header">
                                <div class="calendar-title">Octobre 2023</div>
                                <div class="calendar-nav">
                                    <button><i class="fas fa-chevron-left"></i></button>
                                    <button><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                            
                            <div class="calendar-grid">
                                <div class="calendar-day">Lun</div>
                                <div class="calendar-day">Mar</div>
                                <div class="calendar-day">Mer</div>
                                <div class="calendar-day">Jeu</div>
                                <div class="calendar-day">Ven</div>
                                <div class="calendar-day">Sam</div>
                                <div class="calendar-day">Dim</div>
                                
                                <!-- Dates du calendrier -->
                                <div class="calendar-date">25</div>
                                <div class="calendar-date">26</div>
                                <div class="calendar-date">27</div>
                                <div class="calendar-date">28</div>
                                <div class="calendar-date">29</div>
                                <div class="calendar-date">30</div>
                                <div class="calendar-date">1</div>
                                <div class="calendar-date">2</div>
                                <div class="calendar-date">3</div>
                                <div class="calendar-date event">4</div>
                                <div class="calendar-date event">5</div>
                                <div class="calendar-date">6</div>
                                <div class="calendar-date">7</div>
                                <div class="calendar-date">8</div>
                                <div class="calendar-date">9</div>
                                <div class="calendar-date event">10</div>
                                <div class="calendar-date today">11</div>
                                <div class="calendar-date event">12</div>
                                <div class="calendar-date">13</div>
                                <div class="calendar-date">14</div>
                                <div class="calendar-date">15</div>
                                <div class="calendar-date">16</div>
                                <div class="calendar-date event">17</div>
                                <div class="calendar-date">18</div>
                                <div class="calendar-date">19</div>
                                <div class="calendar-date">20</div>
                                <div class="calendar-date">21</div>
                                <div class="calendar-date">22</div>
                            </div>
                        </div>
                    </div>
                    
                   <div class="card">
                        <div class="card-header">
                            <div class="card-title">Actions rapides</div>
                        </div>
                        <div class="card-body">
                            <div class="quick-actions">
                                <button class="action-btn appointment">
                                    <i class="fas fa-plus"></i> Nouveau rendez-vous
                                </button>
                                <button class="action-btn prescription">
                                    <a href="{{ route('prescriptions.create') }}" >
                                         <i class="fas fa-file-medical"></i> Créer une ordonnance </a>
                                </button>
                                <button class="action-btn patient">
                                    <i class="fas fa-user-plus"></i> Ajouter un patient
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Statistiques rapides -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Statistiques</div>
                        </div>
                        <div class="card-body">
                            <div class="health-indicators">
                                <div class="indicator-card">
                                    <div class="indicator-title">RDV cette semaine</div>
                                    <div class="indicator-value">{{ $weeklyAppointments ?? 0 }}</div>
                                    <div class="indicator-range">
                                        <div class="indicator-progress" style="width: {{ min(100, (($weeklyAppointments ?? 0) / 20) * 100) }}%"></div>
                                    </div>
                                    <div class="indicator-info">
                                        {{ ($weeklyAppointments ?? 0) > 15 ? 'Charge élevée' : (($weeklyAppointments ?? 0) > 8 ? 'Charge normale' : 'Disponible') }}
                                    </div>
                                </div>
                                <div class="indicator-card">
                                    <div class="indicator-title">Nouveaux patients</div>
                                    <div class="indicator-value">{{ $newPatientsThisMonth ?? 0 }}</div>
                                    <div class="indicator-range">
                                        <div class="indicator-progress" style="width: {{ min(100, (($newPatientsThisMonth ?? 0) / 10) * 100) }}%"></div>
                                    </div>
                                    <div class="indicator-info">Ce mois-ci</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation pour les éléments du dashboard
            setTimeout(function() {
                document.getElementById('dashboardGrid').classList.add('visible');
                document.getElementById('contentRow').classList.add('visible');
            }, 300);
        });

        function toggleDropdown() {
            const menu = document.getElementById('dropdownMenu');
            menu.classList.toggle('show');
        }

        // Fermer le dropdown si on clique ailleurs
        window.onclick = function(event) {
            if (!event.target.matches('.user-profile')) {
                const dropdowns = document.getElementsByClassName("dropdown-menu");
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
</html>