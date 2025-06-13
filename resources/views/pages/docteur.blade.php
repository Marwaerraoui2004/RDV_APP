<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Médecin - MediConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <style>
        :root {
            --primary: #0d4a75;
            --primary-light: #1a6b9f;
            --secondary: #38b6a1;
            --secondary-dark: #2a9d8a;
            --accent: #ff6b6b;
            --light: #f0f7ff;
            --dark: #1c3d5a;
            --success: #48bb78;
            --warning: #ecc94b;
            --danger: #e53e3e;
            --text-dark: #2d3748;
            --text-light: #718096;
            --border-radius: 12px;
            --transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            --shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f5f9fc 0%, #e4edf5 100%);
            color: var(--text-dark);
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Floating Elements */
        .floating-element {
            position: fixed;
            border-radius: 50%;
            z-index: -1;
            filter: blur(60px);
            opacity: 0.2;
        }

        .element-1 {
            width: 400px;
            height: 400px;
            background: var(--primary);
            top: -150px;
            right: -100px;
            animation: float1 15s infinite ease-in-out;
        }

        .element-2 {
            width: 350px;
            height: 350px;
            background: var(--secondary);
            bottom: -100px;
            left: -100px;
            animation: float2 18s infinite ease-in-out;
        }

        @keyframes float1 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(-30px, -30px) rotate(10deg); }
            50% { transform: translate(0px, -60px) rotate(0deg); }
            75% { transform: translate(30px, -30px) rotate(-10deg); }
        }

        @keyframes float2 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(30px, -30px) rotate(-10deg); }
            50% { transform: translate(60px, 0px) rotate(0deg); }
            75% { transform: translate(30px, 30px) rotate(10deg); }
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: white;
            box-shadow: var(--shadow);
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
            font-size: 2.2rem;
            color: var(--secondary);
            margin-right: 12px;
        }

        .logo h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-item {
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            margin: 0.3rem 0.5rem;
            border-radius: var(--border-radius);
            position: relative;
        }

        .nav-item i {
            font-size: 1.3rem;
            width: 30px;
            color: var(--primary-light);
            transition: var(--transition);
        }

        .nav-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: linear-gradient(to right, rgba(13, 74, 117, 0.1), transparent);
            border-radius: var(--border-radius);
            transition: var(--transition);
        }

        .nav-item:hover {
            color: var(--primary);
        }

        .nav-item:hover::before {
            width: 100%;
        }

        .nav-item:hover i {
            color: var(--secondary);
            transform: scale(1.1);
        }

        .nav-item.active {
            background: rgba(13, 74, 117, 0.1);
            color: var(--primary);
            font-weight: 600;
        }

        .nav-item.active i {
            color: var(--secondary);
        }

        .nav-item.active::before {
            width: 4px;
            background: var(--secondary);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
            position: relative;
            z-index: 2;
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
            z-index: 10;
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
            z-index: 20;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 0.9rem 1rem 0.9rem 45px;
            border: 2px solid rgba(0,0,0,0.05);
            border-radius: 50px;
            width: 280px;
            font-size: 0.95rem;
            transition: var(--transition);
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .search-box input:focus {
            border-color: var(--secondary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(56, 182, 161, 0.2);
        }

        .search-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            z-index: 1;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.7rem 1.2rem;
            background: white;
            border-radius: 50px;
            box-shadow: var(--shadow);
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
            background: linear-gradient(135deg, var(--primary), var(--secondary));
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
            top: calc(100% + 10px);
            right: 0;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            padding: 15px;
            width: 220px;
            z-index: 1000; /* Important : valeur élevée pour être au-dessus des cartes */
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .dropdown-menu.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .dropdown-menu a {
            display: block;
            padding: 12px 15px;
            color: var(--text-dark);
            text-decoration: none;
            border-radius: 8px;
            transition: var(--transition);
            margin: 5px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dropdown-menu a:hover {
            background: rgba(13, 74, 117, 0.1);
            color: var(--primary);
        }

        .dropdown-menu a i {
            width: auto;
            font-size: 1.1rem;
            color: var(--secondary);
        }

        .btn-logout {
            width: 100%;
            padding: 12px 15px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            margin-top: 10px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .btn-logout:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(13, 74, 117, 0.3);
        }

        /* Stats Dashboard */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        /* Stat Cards */
        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.8rem;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, var(--secondary), var(--primary));
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
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            background: rgba(56, 182, 161, 0.15);
            color: var(--secondary);
        }

        .stat-card.patients .stat-icon {
            background: rgba(13, 74, 117, 0.15);
            color: var(--primary);
        }

        .stat-card.earnings .stat-icon {
            background: rgba(72, 187, 120, 0.15);
            color: var(--success);
        }

        .stat-card.rating .stat-icon {
            background: rgba(236, 201, 75, 0.15);
            color: var(--warning);
        }

        .stat-value {
            font-size: 2.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
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
            position: relative;
            z-index: 1;
        }

        /* Appointments Card */
        .card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: var(--transition);
            position: relative;
            z-index: 1;
        }

        .card:hover {
            transform: translateY(-5px);
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
            color: var(--secondary);
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .card-action:hover {
            color: var(--primary);
            transform: translateX(5px);
        }

        .card-body {
            padding: 1.8rem;
        }

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
            background: rgba(13, 74, 117, 0.03);
            border-radius: var(--border-radius);
        }

        .appointment-item:last-child {
            border-bottom: none;
        }

        .appointment-time {
            background: rgba(56, 182, 161, 0.1);
            border-radius: 12px;
            padding: 1rem;
            text-align: center;
            min-width: 100px;
            margin-right: 1.5rem;
            transition: var(--transition);
        }

        .appointment-item:hover .appointment-time {
            transform: scale(1.05);
            background: rgba(56, 182, 161, 0.15);
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
            font-size: 1.15rem;
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
            color: var(--secondary);
        }

        .appointment-status {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-confirmed {
            background: rgba(72, 187, 120, 0.15);
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
            background: rgba(13, 74, 117, 0.03);
            border-radius: var(--border-radius);
        }

        .patient-item:last-child {
            border-bottom: none;
        }

        .patient-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.2rem;
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
            transition: var(--transition);
        }

        .patient-item:hover .patient-avatar {
            transform: scale(1.1);
        }

        .patient-info h4 {
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
        }

        .patient-info p {
            font-size: 0.9rem;
            color: var(--text-light);
            display: flex;
            align-items: center;
        }

        .patient-info p i {
            margin-right: 8px;
            color: var(--secondary);
        }

        .patient-action {
            margin-left: auto;
            padding: 0.6rem 1.2rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: var(--border-radius);
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
            box-shadow: 0 5px 15px rgba(13, 74, 117, 0.3);
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
            background: rgba(13, 74, 117, 0.1);
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
            background: var(--secondary);
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .action-btn {
            padding: 1.2rem;
            border-radius: var(--border-radius);
            color: white;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-size: 1.1rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .action-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .action-btn.appointment {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }

        .action-btn.prescription {
            background: linear-gradient(135deg, var(--secondary), var(--secondary-dark));
        }

        .action-btn.patient {
            background: linear-gradient(135deg, #8a4fff, #6a35e0);
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
            
            .search-box input {
                width: 200px;
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
            
            .header-actions {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .search-box {
                width: 100%;
            }
            
            .search-box input {
                width: 100%;
            }
        }
        
        /* Notification */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            background: var(--success);
            color: white;
            border-radius: var(--border-radius);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            z-index: 10000;
            transform: translateX(120%);
            transition: transform 0.5s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .notification.show {
            transform: translateX(0);
        }
    </style>
</head>
<body>
    <!-- Floating background elements -->
    <div class="floating-element element-1"></div>
    <div class="floating-element element-2"></div>
    
    <!-- Notification -->
    <div class="notification" id="notification">
        <i class="fas fa-check-circle"></i> Action effectuée avec succès
    </div>

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
                    <span>Rendez-vous</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-user-injured"></i>
                    <span>Patients</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-file-medical"></i>
                    <span>Dossiers</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-prescription"></i>
                    <span>Ordonnances</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Statistiques</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-cog"></i>
                    <span>Paramètres</span>
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
                    <h2>Tableau de bord</h2>
                    <p>Bon retour, Dr. Martin. Voici votre activité aujourd'hui</p>
                </div>
                
                <div class="header-actions">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Rechercher patient, rendez-vous...">
                    </div>
                    
                    <div class="user-profile" onclick="toggleDropdown()">
                        <div class="user-avatar">DM</div>
                        <div class="user-info">
                            <h4>Dr. David Martin</h4>
                            <p>Cardiologue</p>
                        </div>
                        <i class="fas fa-chevron-down"></i>

                        <div id="dropdownMenu" class="dropdown-menu">
                            <a href="#"><i class="fas fa-user"></i> Mon profil</a>
                            <a href="#"><i class="fas fa-cog"></i> Paramètres</a>
                            <a href="#"><i class="fas fa-bell"></i> Notifications</a>
                            <button class="btn-logout" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Stats Dashboard -->
            <div class="dashboard-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Rendez-vous aujourd'hui</div>
                        <div class="stat-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                    <div class="stat-value">8</div>
                    <div class="stat-change"><i class="fas fa-arrow-up"></i> +2 par rapport à hier</div>
                </div>
                
                <div class="stat-card patients">
                    <div class="stat-header">
                        <div class="stat-title">Nouveaux patients</div>
                        <div class="stat-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                    <div class="stat-value">3</div>
                    <div class="stat-change"><i class="fas fa-user-plus"></i> +1 cette semaine</div>
                </div>
                
                <div class="stat-card earnings">
                    <div class="stat-header">
                        <div class="stat-title">Revenus estimés</div>
                        <div class="stat-icon">
                            <i class="fas fa-euro-sign"></i>
                        </div>
                    </div>
                    <div class="stat-value">1,240€</div>
                    <div class="stat-change"><i class="fas fa-chart-line"></i> +15% ce mois</div>
                </div>
                
                <div class="stat-card rating">
                    <div class="stat-header">
                        <div class="stat-title">Satisfaction patients</div>
                        <div class="stat-icon">
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="stat-value">4.8/5</div>
                    <div class="stat-change"><i class="fas fa-star"></i> +0.2 ce trimestre</div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="content-row">
                <!-- Left Column -->
                <div class="left-column">
                    <!-- Rendez-vous à venir -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Prochains rendez-vous</div>
                            <div class="card-action">Voir tout <i class="fas fa-arrow-right"></i></div>
                        </div>
                        <div class="card-body">
                            <ul class="appointment-list">
                                <li class="appointment-item">
                                    <div class="appointment-time">
                                        <div class="time">09:30</div>
                                        <div class="date">Aujourd'hui</div>
                                    </div>
                                    <div class="appointment-info">
                                        <h4>Marie Dupont</h4>
                                        <p><i class="fas fa-stethoscope"></i> Consultation de suivi</p>
                                        <span class="appointment-status status-confirmed">Confirmé</span>
                                    </div>
                                </li>
                                <li class="appointment-item">
                                    <div class="appointment-time">
                                        <div class="time">11:15</div>
                                        <div class="date">Aujourd'hui</div>
                                    </div>
                                    <div class="appointment-info">
                                        <h4>Jean Lefebvre</h4>
                                        <p><i class="fas fa-heartbeat"></i> Examen cardiologique</p>
                                        <span class="appointment-status status-confirmed">Confirmé</span>
                                    </div>
                                </li>
                                <li class="appointment-item">
                                    <div class="appointment-time">
                                        <div class="time">14:00</div>
                                        <div class="date">Aujourd'hui</div>
                                    </div>
                                    <div class="appointment-info">
                                        <h4>Sophie Bernard</h4>
                                        <p><i class="fas fa-file-medical"></i> Premier rendez-vous</p>
                                        <span class="appointment-status status-pending">En attente</span>
                                    </div>
                                </li>
                                <li class="appointment-item">
                                    <div class="appointment-time">
                                        <div class="time">16:45</div>
                                        <div class="date">Aujourd'hui</div>
                                    </div>
                                    <div class="appointment-info">
                                        <h4>Robert Martin</h4>
                                        <p><i class="fas fa-prescription-bottle"></i> Renouvellement ordonnance</p>
                                        <span class="appointment-status status-confirmed">Confirmé</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Patients récents -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Patients récents</div>
                            <div class="card-action">Voir tout <i class="fas fa-arrow-right"></i></div>
                        </div>
                        <div class="card-body">
                            <ul class="patient-list">
                                <li class="patient-item">
                                    <div class="patient-avatar">SD</div>
                                    <div class="patient-info">
                                        <h4>Sarah Dubois</h4>
                                        <p><i class="fas fa-phone"></i> +33 6 12 34 56 78</p>
                                    </div>
                                    <button class="patient-action">Dossier</button>
                                </li>
                                <li class="patient-item">
                                    <div class="patient-avatar">TL</div>
                                    <div class="patient-info">
                                        <h4>Thomas Lambert</h4>
                                        <p><i class="fas fa-envelope"></i> thomas.l@example.com</p>
                                    </div>
                                    <button class="patient-action">Dossier</button>
                                </li>
                                <li class="patient-item">
                                    <div class="patient-avatar">CG</div>
                                    <div class="patient-info">
                                        <h4>Chloé Girard</h4>
                                        <p><i class="fas fa-map-marker-alt"></i> Paris, France</p>
                                    </div>
                                    <button class="patient-action">Dossier</button>
                                </li>
                                <li class="patient-item">
                                    <div class="patient-avatar">PM</div>
                                    <div class="patient-info">
                                        <h4>Pierre Moreau</h4>
                                        <p><i class="fas fa-birthday-cake"></i> 15/03/1975</p>
                                    </div>
                                    <button class="patient-action">Dossier</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column -->
                <div class="right-column">
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
                    
                    <!-- Actions rapides -->
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
                                    <i class="fas fa-file-medical"></i> Créer une ordonnance
                                </button>
                                <button class="action-btn patient">
                                    <i class="fas fa-user-plus"></i> Ajouter un patient
                                </button>
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
            const cards = document.querySelectorAll('.card, .stat-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    gsap.to(this, {
                        y: -8,
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
            menu.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const profile = document.querySelector('.user-profile');
            const menu = document.getElementById('dropdownMenu');
            
            if (!profile.contains(event.target)) {
                menu.classList.remove('show');
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
        
        // Logout function
        function logout() {
            // Show notification
            const notification = document.getElementById('notification');
            notification.textContent = "Vous avez été déconnecté avec succès";
            notification.style.background = "var(--primary)";
            notification.classList.add('show');
            
            // Hide notification after 3 seconds
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
            
            // Simulate logout
            setTimeout(() => {
                alert('Vous avez été déconnecté avec succès. Redirection vers la page de connexion...');
            }, 500);
        }
        
        // Calendar navigation
        const calendarNavButtons = document.querySelectorAll('.calendar-nav button');
        calendarNavButtons.forEach(button => {
            button.addEventListener('click', function() {
                gsap.from('.calendar-grid', {
                    opacity: 0,
                    x: this.classList.contains('prev') ? -20 : 20,
                    duration: 0.3
                });
            });
        });
        
        // Quick action buttons
        const actionButtons = document.querySelectorAll('.action-btn');
        actionButtons.forEach(button => {
            button.addEventListener('click', function() {
                const notification = document.getElementById('notification');
                notification.textContent = "Action effectuée avec succès";
                notification.style.background = "var(--secondary)";
                notification.classList.add('show');
                
                setTimeout(() => {
                    notification.classList.remove('show');
                }, 3000);
            });
        });
    </script>
</body>
</html>