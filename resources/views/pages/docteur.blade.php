<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Médecin - MediConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0d4a75;
            --secondary: #1a6b9f;
            --accent: #38b6a1;
            --light: #f0f7ff;
            --dark: #1c3d5a;
            --success: #48bb78;
            --warning: #ecc94b;
            --danger: #e53e3e;
            --text-dark: #2d3748;
            --text-light: #718096;
            --border-radius: 12px;
            --transition: all 0.3s ease;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f5f9fc;
            color: var(--text-dark);
            line-height: 1.6;
            display: flex;
            min-height: 100vh;
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
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 1.5rem;
        }

        .logo i {
            font-size: 2rem;
            color: var(--accent);
            margin-right: 12px;
        }

        .logo h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .nav-item {
            padding: 0.8rem 1.5rem;
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
            color: var(--secondary);
        }

        .nav-item:hover {
            background: var(--light);
            color: var(--primary);
        }

        .nav-item.active {
            background: rgba(13, 74, 117, 0.1);
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
            border-bottom: 1px solid #e2e8f0;
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
            gap: 1rem;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 0.8rem 1rem 0.8rem 40px;
            border: 1px solid #e2e8f0;
            border-radius: var(--border-radius);
            width: 280px;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .search-box input:focus {
            border-color: var(--accent);
            outline: none;
            box-shadow: 0 0 0 3px rgba(56, 182, 161, 0.1);
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.5rem 1rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            cursor: pointer;
            transition: var(--transition);
        }

        .user-profile:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
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

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        /* Stat Cards */
        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-left: 4px solid var(--accent);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-card.appointments {
            border-left-color: var(--accent);
        }

        .stat-card.patients {
            border-left-color: var(--primary);
        }

        .stat-card.earnings {
            border-left-color: var(--success);
        }

        .stat-card.rating {
            border-left-color: var(--warning);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.2rem;
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
        }

        .stat-icon.appointments {
            background: rgba(56, 182, 161, 0.15);
            color: var(--accent);
        }

        .stat-icon.patients {
            background: rgba(13, 74, 117, 0.15);
            color: var(--primary);
        }

        .stat-icon.earnings {
            background: rgba(72, 187, 120, 0.15);
            color: var(--success);
        }

        .stat-icon.rating {
            background: rgba(236, 201, 75, 0.15);
            color: var(--warning);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .stat-change {
            font-size: 0.9rem;
            color: var(--success);
            font-weight: 600;
        }

        .stat-change.negative {
            color: var(--danger);
        }

        /* Main Content Area */
        .content-row {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        /* Appointments Card */
        .card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
        }

        .card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid #e2e8f0;
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
            font-size: 0.95rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .card-action:hover {
            color: var(--primary);
        }

        .card-body {
            padding: 1.5rem;
        }

        .appointment-list {
            list-style: none;
        }

        .appointment-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .appointment-item:last-child {
            border-bottom: none;
        }

        .appointment-time {
            background: var(--light);
            border-radius: 10px;
            padding: 0.8rem;
            text-align: center;
            min-width: 100px;
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
            font-size: 1.05rem;
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
            margin-right: 8px;
            color: var(--accent);
        }

        .appointment-status {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
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
            padding: 1rem 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .patient-item:last-child {
            border-bottom: none;
        }

        .patient-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--accent);
            font-weight: 600;
            font-size: 1.2rem;
        }

        .patient-info h4 {
            font-size: 1.05rem;
            margin-bottom: 0.2rem;
        }

        .patient-info p {
            font-size: 0.9rem;
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
            padding: 0.5rem 1rem;
            background: var(--light);
            border-radius: var(--border-radius);
            color: var(--primary);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .patient-action:hover {
            background: var(--primary);
            color: white;
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
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary);
        }

        .calendar-nav button {
            background: var(--light);
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin: 0 0.3rem;
            cursor: pointer;
            color: var(--primary);
            transition: var(--transition);
        }

        .calendar-nav button:hover {
            background: var(--primary);
            color: white;
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
            padding: 0.5rem;
            color: var(--text-light);
        }

        .calendar-date {
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .calendar-date:hover {
            background: var(--light);
        }

        .calendar-date.today {
            background: var(--primary);
            color: white;
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
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
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
            }
            
            .stat-card {
                padding: 1.2rem;
            }
            
            .stat-value {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
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
                    <input type="text" placeholder="Rechercher...">
                </div>
                
                <div class="user-profile">
                    <div class="user-avatar">DM</div>
                    <div class="user-info">
                        <h4>Dr. David Martin</h4>
                        <p>Cardiologue</p>
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </header>

        <!-- Stats Dashboard -->
        <div class="dashboard-grid">
            <div class="stat-card appointments">
                <div class="stat-header">
                    <div class="stat-title">Rendez-vous aujourd'hui</div>
                    <div class="stat-icon appointments">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
                <div class="stat-value">8</div>
                <div class="stat-change">+2 par rapport à hier</div>
            </div>
            
            <div class="stat-card patients">
                <div class="stat-header">
                    <div class="stat-title">Nouveaux patients</div>
                    <div class="stat-icon patients">
                        <i class="fas fa-user-plus"></i>
                    </div>
                </div>
                <div class="stat-value">3</div>
                <div class="stat-change">+1 cette semaine</div>
            </div>
            
            <div class="stat-card earnings">
                <div class="stat-header">
                    <div class="stat-title">Revenus estimés</div>
                    <div class="stat-icon earnings">
                        <i class="fas fa-euro-sign"></i>
                    </div>
                </div>
                <div class="stat-value">1,240€</div>
                <div class="stat-change">+15% ce mois</div>
            </div>
            
            <div class="stat-card rating">
                <div class="stat-header">
                    <div class="stat-title">Satisfaction patients</div>
                    <div class="stat-icon rating">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="stat-value">4.8/5</div>
                <div class="stat-change">+0.2 ce trimestre</div>
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
                        <div class="card-action">Voir tout</div>
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
                        <div class="card-action">Voir tout</div>
                    </div>
                    <div class="card-body">
                        <ul class="patient-list">
                            <li class="patient-item">
                                <div class="patient-avatar">SD</div>
                                <div class="patient-info">
                                    <h4>Sarah Dubois</h4>
                                    <p><i class="fas fa-phone"></i> +33 6 12 34 56 78</p>
                                </div>
                                <div class="patient-action">Dossier</div>
                            </li>
                            <li class="patient-item">
                                <div class="patient-avatar">TL</div>
                                <div class="patient-info">
                                    <h4>Thomas Lambert</h4>
                                    <p><i class="fas fa-envelope"></i> thomas.l@example.com</p>
                                </div>
                                <div class="patient-action">Dossier</div>
                            </li>
                            <li class="patient-item">
                                <div class="patient-avatar">CG</div>
                                <div class="patient-info">
                                    <h4>Chloé Girard</h4>
                                    <p><i class="fas fa-map-marker-alt"></i> Paris, France</p>
                                </div>
                                <div class="patient-action">Dossier</div>
                            </li>
                            <li class="patient-item">
                                <div class="patient-avatar">PM</div>
                                <div class="patient-info">
                                    <h4>Pierre Moreau</h4>
                                    <p><i class="fas fa-birthday-cake"></i> 15/03/1975</p>
                                </div>
                                <div class="patient-action">Dossier</div>
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
                        <button class="patient-action" style="width: 100%; margin-bottom: 1rem;">
                            <i class="fas fa-plus"></i> Nouveau rendez-vous
                        </button>
                        <button class="patient-action" style="width: 100%; margin-bottom: 1rem; background: rgba(56, 182, 161, 0.15);">
                            <i class="fas fa-file-medical"></i> Créer une ordonnance
                        </button>
                        <button class="patient-action" style="width: 100%; background: rgba(13, 74, 117, 0.15);">
                            <i class="fas fa-user-plus"></i> Ajouter un patient
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion du calendrier
            const today = new Date();
            const calendarTitle = document.querySelector('.calendar-title');
            const monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
                               "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
            
            calendarTitle.textContent = `${monthNames[today.getMonth()]} ${today.getFullYear()}`;
            
            // Gestion du survol des cartes
            const cards = document.querySelectorAll('.card, .stat-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Navigation dans le menu
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    navItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Affichage du jour actuel dans le tableau de bord
            const days = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
            const months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
            const dateString = `${days[today.getDay()]} ${today.getDate()} ${months[today.getMonth()]} ${today.getFullYear()}`;
            document.querySelector('.header-title p').textContent += " - " + dateString;
        });
    </script>
</body>
</html>