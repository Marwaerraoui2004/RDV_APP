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
            --card-shadow: 0 10px 20px rgba(0,0,0,0.08);
            --transition: all 0.3s ease;
            --border-radius: 12px;
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
            opacity: 0.15;
        }

        .element-1 {
            width: 400px;
            height: 400px;
            background: var(--primary);
            top: -200px;
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

        .element-3 {
            width: 250px;
            height: 250px;
            background: var(--accent);
            top: 50%;
            left: 10%;
            animation: float3 12s infinite ease-in-out;
        }

        @keyframes float1 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(-40px, -40px) rotate(10deg); }
            50% { transform: translate(0px, -80px) rotate(0deg); }
            75% { transform: translate(40px, -40px) rotate(-10deg); }
        }

        @keyframes float2 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(40px, -40px) rotate(-10deg); }
            50% { transform: translate(80px, 0px) rotate(0deg); }
            75% { transform: translate(40px, 40px) rotate(10deg); }
        }

        @keyframes float3 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(15px, -30px) rotate(15deg); }
            50% { transform: translate(-15px, -15px) rotate(0deg); }
            75% { transform: translate(-30px, 15px) rotate(-15deg); }
        }

        /* Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: white;
            box-shadow: var(--card-shadow);
            padding: 1.2rem 0;
            height: 100vh;
            position: fixed;
            z-index: 100;
            transition: var(--transition);
            overflow-y: auto;
        }

        .logo {
            display: flex;
            align-items: center;
            padding: 0 1.5rem 1.2rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            margin-bottom: 1.2rem;
        }

        .logo i {
            font-size: 1.8rem;
            color: var(--accent);
            margin-right: 10px;
        }

        .logo h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-item {
            padding: 0.8rem 1.2rem;
            display: flex;
            align-items: center;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            margin: 0.2rem 0.5rem;
            border-radius: 10px;
        }

        .nav-item i {
            font-size: 1.1rem;
            width: 28px;
            color: var(--primary);
            transition: var(--transition);
        }

        .nav-item:hover {
            background: rgba(58, 134, 255, 0.08);
            color: var(--primary);
        }

        .nav-item:hover i {
            color: var(--accent);
        }

        .nav-item.active {
            background: rgba(58, 134, 255, 0.12);
            color: var(--primary);
            font-weight: 600;
        }

        .nav-item.active i {
            color: var(--accent);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 1.8rem;
            position: relative;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.8rem;
            padding-bottom: 1.2rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            position: relative;
        }

        .header-title h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.6rem;
            color: var(--primary);
            font-weight: 700;
        }

        .header-title p {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            position: relative;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 0.7rem 1rem 0.7rem 40px;
            border: 2px solid rgba(0,0,0,0.05);
            border-radius: 50px;
            width: 260px;
            font-size: 0.9rem;
            transition: var(--transition);
            background: white;
        }

        .search-box input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(58, 134, 255, 0.15);
        }

        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            padding: 0.6rem 1rem;
            background: white;
            border-radius: 50px;
            box-shadow: var(--card-shadow);
            cursor: pointer;
            transition: var(--transition);
            position: relative;
        }

        .user-profile:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .user-info h4 {
            font-size: 0.9rem;
            font-weight: 600;
        }

        .user-info p {
            font-size: 0.8rem;
            color: var(--text-light);
        }

        /* MODIFICATIONS POUR LE DROPDOWN */
        .user-profile-container {
            position: relative;
        }
        
        .dropdown-menu {
            position: absolute;
            top: calc(100% + 12px);
            right: 0;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            padding: 12px;
            width: 200px;
            z-index: 10000;
            display: none;
            opacity: 0;
            transform: translateY(8px);
            transition: opacity 0.25s ease, transform 0.25s ease;
        }
        
        .dropdown-menu.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .dropdown-menu a {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            color: var(--text-dark);
            text-decoration: none;
            border-radius: 8px;
            transition: var(--transition);
            margin: 4px 0;
            font-size: 0.9rem;
        }

        .dropdown-menu a:hover {
            background: rgba(58, 134, 255, 0.08);
            color: var(--primary);
        }
        
        .dropdown-menu a i {
            margin-right: 8px;
            width: 18px;
            text-align: center;
            font-size: 0.95rem;
        }

        .btn-logout {
            width: 100%;
            padding: 8px 12px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-size: 0.9rem;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(131, 56, 236, 0.25);
        }

        /* Stats Dashboard */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.2rem;
            margin-bottom: 1.8rem;
        }

        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.2rem 1.5rem;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            min-height: 160px;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--accent));
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-title {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-light);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            background: rgba(58, 134, 255, 0.08);
            color: var(--accent);
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-change {
            font-size: 0.85rem;
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
            gap: 1.5rem;
            margin-bottom: 1.8rem;
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
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            padding: 1.1rem 1.5rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary);
        }

        .card-action {
            color: var(--accent);
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .card-action:hover {
            color: var(--primary);
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Appointments */
        .appointment-list {
            list-style: none;
            padding: 0 0.5rem;
        }

        .appointment-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
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
            background: rgba(58, 134, 255, 0.08);
            border-radius: 10px;
            padding: 0.8rem;
            text-align: center;
            min-width: 90px;
            margin-right: 1.2rem;
        }

        .appointment-time .time {
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--primary);
        }

        .appointment-time .date {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .appointment-info h4 {
            font-size: 1rem;
            margin-bottom: 0.3rem;
            color: var(--text-dark);
        }

        .appointment-info p {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .appointment-info p i {
            margin-right: 6px;
            color: var(--accent);
            font-size: 0.9rem;
        }

        .appointment-status {
            display: inline-block;
            padding: 0.35rem 0.8rem;
            border-radius: 18px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-confirmed {
            background: rgba(56, 182, 161, 0.12);
            color: var(--success);
        }

        .status-pending {
            background: rgba(236, 201, 75, 0.12);
            color: var(--warning);
        }

        /* Doctors List */
        .doctor-list {
            list-style: none;
            padding: 0 0.5rem;
        }

        .doctor-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
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
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .doctor-info {
            flex: 1;
            min-width: 0;
        }

        .doctor-info h4 {
            font-size: 1rem;
            margin-bottom: 0.2rem;
        }

        .doctor-info p {
            font-size: 0.9rem;
            color: var(--text-light);
            display: flex;
            align-items: center;
        }

        .doctor-info p i {
            margin-right: 6px;
            color: var(--accent);
            font-size: 0.9rem;
        }

        .doctor-action {
            margin-left: 1rem;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50px;
            color: white;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            outline: none;
            flex-shrink: 0;
            white-space: nowrap;
        }

        .doctor-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(131, 56, 236, 0.25);
        }

        /* Health Indicators */
        .health-indicators {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .indicator-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.2rem;
            box-shadow: var(--card-shadow);
            text-align: center;
            transition: var(--transition);
        }

        .indicator-card:hover {
            transform: translateY(-3px);
        }

        .indicator-title {
            font-size: 0.95rem;
            color: var(--text-light);
            margin-bottom: 0.8rem;
        }

        .indicator-value {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.8rem;
        }

        .indicator-range {
            height: 6px;
            background: #e2e8f0;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 0.6rem;
        }

        .indicator-progress {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-radius: 3px;
        }

        .indicator-info {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        /* Documents */
        .documents-list {
            list-style: none;
            padding: 0 0.5rem;
        }

        .document-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
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
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: rgba(56, 182, 161, 0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--accent);
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .document-info {
            flex: 1;
            min-width: 0;
        }

        .document-info h4 {
            font-size: 1rem;
            margin-bottom: 0.2rem;
        }

        .document-info p {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .document-action {
            margin-left: auto;
            padding: 0.5rem;
            background: transparent;
            border: none;
            color: var(--accent);
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            flex-shrink: 0;
        }

        .document-action:hover {
            color: var(--primary);
            transform: translateY(-2px);
        }

        /* Quick Actions */
        .quick-actions {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .action-btn {
            padding: 0.9rem;
            border-radius: var(--border-radius);
            color: white;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.95rem;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
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

        /* MODIFICATIONS POUR LES LISTES VOLUMINEUSES */
        .scrollable-container {
            max-height: 380px;
            overflow-y: auto;
            padding-right: 5px;
        }
        
        .scrollable-container::-webkit-scrollbar {
            width: 6px;
        }
        
        .scrollable-container::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.03);
            border-radius: 3px;
        }
        
        .scrollable-container::-webkit-scrollbar-thumb {
            background: rgba(58, 134, 255, 0.4);
            border-radius: 3px;
        }
        
        .scrollable-container::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }
        
        .card-body-scrollable {
            padding: 0;
        }
        
        .appointment-list, .doctor-list, .documents-list {
            min-height: 100px;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .content-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
            }
            
            .sidebar .logo h1,
            .sidebar .nav-item span {
                display: none;
            }
            
            .sidebar .logo {
                justify-content: center;
                padding: 0 0.5rem 0.8rem;
            }
            
            .sidebar .nav-item {
                justify-content: center;
                padding: 0.9rem;
            }
            
            .sidebar .nav-item i {
                margin-right: 0;
                font-size: 1.3rem;
            }
            
            .main-content {
                margin-left: 70px;
            }
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .header-actions {
                width: 100%;
                justify-content: space-between;
                margin-top: 0.8rem;
            }
            
            .search-box input {
                width: 100%;
            }
            
            .health-indicators {
                grid-template-columns: 1fr;
            }
            
            .user-profile {
                padding: 0.5rem;
            }
            
            .user-info h4 {
                font-size: 0.85rem;
            }
            
            .user-info p {
                font-size: 0.75rem;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            
            .main-content {
                margin-left: 0;
                padding: 1.2rem;
            }
            
            .stat-card {
                padding: 1rem;
            }
            
            .stat-value {
                font-size: 1.6rem;
            }
            
            .card-header {
                padding: 1rem;
            }
            
            .card-body {
                padding: 1.2rem;
            }
        }
        
        /* Animation */
        .dashboard-grid, .content-row {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
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
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <i class="fas fa-heartbeat"></i>
                <h1>MediConnect</h1>
            </div>
            
            <nav>
                <a href="{{ route('patient.dashboard') }}"
                class="nav-item {{ request()->routeIs('patient.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Tableau de bord</span>
            </a>
            <a href="{{ route('patient.appointments') }}"
                class="nav-item {{ request()->routeIs('patient.appointments') ? 'active' : '' }}">
                <i class="fas fa-calendar-check"></i>
                <span>Mes rendez-vous</span>
            </a>
            <a href="{{ route('patient.doctors') }}"
                class="nav-item {{ request()->routeIs('patient.doctors') ? 'active' : '' }}">
                <i class="fas fa-user-md"></i>
                <span>Mes médecins</span>
            </a>
            <a href="{{ route('patient.documents') }}"
                class="nav-item {{ request()->routeIs('patient.documents') ? 'active' : '' }}">
                <i class="fas fa-file-medical"></i>
                <span>Mes documents</span>
            </a>
            <a href="{{ route('patient.prescriptions') }}" class="nav-item">
                <i class="fas fa-prescription"></i>
                <span>Mes ordonnances</span>
            </a>
            <a href="{{ route('patient.health') }}" class="nav-item">
                <i class="fas fa-heart"></i>
                <span>Ma santé</span>
            </a>
            <a href="{{ route('message.create') }}" class="nav-item">
                <i class="fas fa-comments"></i>
                <span>Messagerie</span>
            </a>
            <a href="{{ route('patient.settings') }}" class="nav-item">
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
                    <p>Bonjour {{Auth::user()->name}}, voici votre tableau de bord</p>
                </div>
                
                <div class="header-actions">
                    <form action="{{ route('patient.recherche') }}" method="GET" class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" name="q" placeholder="Rechercher...">
                    </form>
                    
                    <div class="user-profile-container">
                        <div class="user-profile" onclick="toggleDropdown()">
                            <div class="user-avatar">
                                {{ substr(Auth::user()->name, 0, 1) }}{{ substr(Auth::user()->name, strpos(Auth::user()->name, ' ') + 1, 1) }}
                            </div>

                            <div class="user-info">
                                <h4>{{Auth::user()->name}}</h4>
                                <p>{{Auth::user()->role}}</p>
                            </div>
                            <i class="fas fa-chevron-down"></i>
                        </div>

                        <div id="dropdownMenu" class="dropdown-menu">
                            <a href="{{route('profile.update')}}"><i class="fas fa-user"></i> Mon profil</a>
                            <a href="{{route('patient.settings')}}"><i class="fas fa-cog"></i> Paramètres</a>
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
            <div class="stat-title">Rendez-vous à venir</div>
            <div class="stat-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
        </div>

        <div class="stat-value">{{ $countUpcoming }}</div>

        @if ($nextAppointmentsList->count() > 0)
            @foreach($nextAppointmentsList->take(2) as $appointment)
                <div class="stat-change">
                    <i class="fas fa-clock"></i>
                    {{ \Carbon\Carbon::parse($appointment->appointment_datetime)->translatedFormat('D d M à H:i') }}
                </div>
            @endforeach
        @else
            <div class="stat-change">Aucun prochain rendez-vous</div>
        @endif
    </div>

    <!-- Médecins suivis -->
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-title">Médecins suivis</div>
            <div class="stat-icon">
                <i class="fas fa-user-md"></i>
            </div>
        </div>
        <div class="stat-value">{{ $countDoctors }}</div>
        <div class="stat-change">
            <i class="fas fa-user-plus"></i>
            @if($lastDoctor)
                Dernier vu : {{ $lastDoctor }}
            @else
                Aucun médecin trouvé
            @endif
        </div>
    </div>

    <!-- Dernière consultation -->
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-title">Dernière consultation</div>
            <div class="stat-icon">
                <i class="fas fa-heartbeat"></i>
            </div>
        </div>
        <div class="stat-value">
            {{ $daysSinceLast !== null ? $daysSinceLast . ' jours' : 'Aucune consultation' }}
        </div>
        <div class="stat-change">
            <i class="fas fa-calendar-alt"></i> Prochaine à venir
        </div>
    </div>

    <!-- Documents médicaux -->
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-title">Documents médicaux</div>
            <div class="stat-icon">
                <i class="fas fa-file-medical"></i>
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
                            <div class="card-action"><a href="{{ route('patient.appointments') }}">Voir tout</a></div>
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
                                            <h4>{{ optional($appointment->doctor)->name ?? 'Médecin inconnu' }}</h4>
                                            <p><i class="fas fa-stethoscope"></i> {{ optional($appointment->doctor)->specialty ?? 'Spécialité inconnue' }}</p>
                                            <span class="appointment-status status-confirmed">
                                        {{ ucfirst($appointment->status) }}</span>
                                        </div>
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
                    
                    <!-- Mes médecins -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Mes médecins</div>
                            <div class="card-action"><a href="{{ route('patient.doctors') }}">Tous voir</a></div>
                        </div>
                        <div class="card-body card-body-scrollable">
                            <div class="scrollable-container">
                                <ul class="doctor-list">
                                    @forelse ($mesMedecins as $medecin)
                                    <li class="doctor-item">
                                        <div class="doctor-avatar">{{ strtoupper(substr($medecin->name, 0, 1)) }}{{ strtoupper(substr(Str::after($medecin->name, ' '), 0, 1)) }}</div>
                                        <div class="doctor-info">
                                            <h4>Dr. {{ $medecin->name }}</h4>
                                            <p><i class="fas fa-heartbeat"></i> {{ $medecin->speciality ?? 'Spécialité inconnue' }}</p>
                                        </div>
                                        <a href="{{ route('patient.contact', $medecin->id) }}" class="doctor-action">Contacter</a>
                                    </li>
                                    @empty
                                        <li class="doctor-item">
                                            <p>Aucun médecin trouvé.</p>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $tensionMax = 200;
                    $freqMax = 200;
                    $glycemieMax = 2.0;
                    $imcMax = 40;

                    $tension = auth()->user()->tension_arterielle ? intval(explode('/', auth()->user()->tension_arterielle)[0]) : 0;
                    $freq = auth()->user()->frequence_cardiaque ?? 0;
                    $glycemie = auth()->user()->glycemie ?? 0;
                    $imc = auth()->user()->imc ?? 0;

                    $tensionPercent = min(100, ($tension / $tensionMax) * 100);
                    $freqPercent = min(100, ($freq / $freqMax) * 100);
                    $glycemiePercent = min(100, ($glycemie / $glycemieMax) * 100);
                    $imcPercent = min(100, ($imc / $imcMax) * 100);
                @endphp
                @php
                    if ($imc < 18.5) {
                        $imcMessage = 'Insuffisance pondérale';
                    } elseif ($imc >= 18.5 && $imc <= 24.9) {
                        $imcMessage = 'Poids normal';
                    } elseif ($imc >= 25 && $imc <= 29.9) {
                        $imcMessage = 'Surpoids';
                    } else {
                        $imcMessage = 'Obésité';
                    }


                @endphp
                @php
                    if ($tension < 120) {
                        $tensionMessage = 'Tension basse';
                    } elseif ($tension >= 120 && $tension <= 129) {
                        $tensionMessage = 'Tension normale';
                    } elseif ($tension >= 130 && $tension <= 139) {
                        $tensionMessage = 'Préhypertension';
                    } else {
                        $tensionMessage = 'Hypertension';
                    }
                @endphp    
                @php
                    if ($freq < 60) {
                        $glycemieMessage = 'Bradycardie (trop lente)';
                    } elseif ($freq >= 60 && $freq <= 100) {
                        $glycemieMessage = 'Fréquence normale';
                    } else {
                        $glycemieMessage = 'Tachycardie (trop rapide)';
                    }
                 @endphp
                @php
                    if ($freq < 60) {
                        $frequenceCardiaqueMessage= 'Bradycardie (trop lente)';
                    } elseif ($freq >= 60 && $freq <= 100) {
                        $frequenceCardiaqueMessage = 'Fréquence normale';
                    } else {
                        $frequenceCardiaqueMessage = 'Tachycardie (trop rapide)';
                    }
                @endphp
                                
                <!-- Right Column -->
                <div class="right-column">
                    <!-- Indicateurs de santé -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Mes indicateurs de santé</div>
                                <div class="card-action"><a href="{{ route('health.edit') }}"> Éditer</a></div>

                        </div>
                        <div class="card-body">
                            <div class="health-indicators">
                                <div class="indicator-card">
                                    <div class="indicator-title">Tension artérielle</div>
                                    <div class="indicator-value">{{ auth()->user()->tension_arterielle ?? 'N/A' }}</div>
                                    <div class="indicator-range">
                                        <div class="indicator-progress" style="width: {{ $tensionPercent }}%"></div>
                                    </div>
                                    <div class="indicator-info">{{$tensionMessage}}</div>
                                </div>
                                <div class="indicator-card">
                                    <div class="indicator-title">Fréquence cardiaque</div>
                                    <div class="indicator-value">{{ $freq }} bpm</div>
                                    <div class="indicator-range">
                                        <div class="indicator-progress" style="width: {{ $freqPercent }}%"></div>
                                    </div>
                                    <div class="indicator-info">{{$frequenceCardiaqueMessage}}</div>
                                </div>
                                <div class="indicator-card">
                                    <div class="indicator-title">Glycémie</div>
                                    <div class="indicator-value">{{ $glycemie }} g/L</div>
                                    <div class="indicator-range">
                                        <div class="indicator-progress" style="width: {{ $glycemiePercent }}%"></div>
                                    </div>
                                    <div class="indicator-info">{{$glycemieMessage}}</div>
                                </div>
                                <div class="indicator-card">
                                    <div class="indicator-title">IMC</div>
                                    <div class="indicator-value">{{ $imc }}</div>
                                    <div class="indicator-range">
                                        <div class="indicator-progress" style="width: {{ $imcPercent }}%"></div>
                                    </div>
                                    <div class="indicator-info">{{ $imcMessage }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Documents récents -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Derniers documents</div>
                            <a href="{{ route('patient.documents') }}" class="card-action" style="cursor:pointer; text-decoration: underline;">Tous voir</a>
                        </div>
                        <div class="card-body card-body-scrollable">
                            <div class="scrollable-container">
                                <ul class="documents-list">
                                    @forelse($documents as $document)
                                    <li class="document-item">
                                        <div class="document-icon">
                                            @if($document->type === 'cardiologique')
                                                <i class="fas fa-file-medical"></i>
                                            @elseif($document->type === 'ordonnance')
                                                <i class="fas fa-prescription"></i>
                                            @elseif($document->type === 'analyse')
                                                <i class="fas fa-file-contract"></i>
                                            @else
                                                <i class="fas fa-file"></i>
                                            @endif
                                        </div>
                                        <div class="document-info">
                                            <h4>{{ $document->title }}</h4>
                                            <p>Ajouté le {{ $document->created_at->format('d/m/Y') }}</p>
                                        </div>
                                        <a href="{{ route('documents.download', $document->id) }}" class="document-action" title="Télécharger">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </li>
                                    @empty
                                        <li class="document-item">
                                            <p>Aucun document disponible.</p>
                                        </li>
                                    @endforelse
                                </ul>
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
                                <div class="action-btn appointment">
                                    <i class="fas fa-calendar-plus"></i>
                                    <a href="{{ route('patient.appointments.create') }}" style="text-decoration: none; color: inherit;">Prendre rendez-vous</a>
                                </div>
                                <div class="action-btn advice">
                                    <i class="fas fa-comment-medical"></i> 
                                    <a href="{{ route('message.create') }}" style="text-decoration: none; color: inherit;">Demander conseil</a>
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
            
            // Rendre les éléments visibles après un court délai
            setTimeout(function() {
                document.getElementById('dashboardGrid').classList.add('visible');
                document.getElementById('contentRow').classList.add('visible');
            }, 300);
            
            // Animation des éléments au survol
            const cards = document.querySelectorAll('.card, .stat-card, .indicator-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    gsap.to(this, {
                        y: -4,
                        duration: 0.3,
                        ease: "power2.out"
                    });
                });
                
                card.addEventListener('mouseleave', function() {
                    gsap.to(this, {
                        y: 0,
                        duration: 0.3,
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
            const profile = document.querySelector('.user-profile-container');
            const menu = document.getElementById('dropdownMenu');
            
            if (!profile.contains(event.target)) {
                menu.classList.remove('show');
            }
        });
        
        // Navigation items animation
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(item => {
            item.addEventListener('click', function(e) {
                // Remove active class from all items
                navItems.forEach(i => i.classList.remove('active'));
                
                // Add active class to clicked item
                this.classList.add('active');
                
                // Animation
                gsap.from(this, {
                    scale: 0.95,
                    duration: 0.25,
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
                    duration: 0.15
                });
            });
            
            status.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    scale: 1,
                    duration: 0.15
                });
            });
        });
    </script>
</body>
</html>