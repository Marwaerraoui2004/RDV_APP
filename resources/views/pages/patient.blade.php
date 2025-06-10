<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace Patient - MediConnect</title>
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

        .stat-card.doctors {
            border-left-color: var(--primary);
        }

        .stat-card.health {
            border-left-color: var(--success);
        }

        .stat-card.documents {
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

        .stat-icon.doctors {
            background: rgba(13, 74, 117, 0.15);
            color: var(--primary);
        }

        .stat-icon.health {
            background: rgba(72, 187, 120, 0.15);
            color: var(--success);
        }

        .stat-icon.documents {
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

        /* Doctors List */
        .doctor-list {
            list-style: none;
        }

        .doctor-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .doctor-item:last-child {
            border-bottom: none;
        }

        .doctor-avatar {
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

        .doctor-info h4 {
            font-size: 1.05rem;
            margin-bottom: 0.2rem;
        }

        .doctor-info p {
            font-size: 0.9rem;
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
            padding: 0.5rem 1rem;
            background: var(--light);
            border-radius: var(--border-radius);
            color: var(--primary);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .doctor-action:hover {
            background: var(--primary);
            color: white;
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
            box-shadow: var(--shadow);
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
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .indicator-range {
            height: 6px;
            background: #e2e8f0;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 0.5rem;
        }

        .indicator-progress {
            height: 100%;
            background: var(--accent);
            border-radius: 3px;
        }

        .indicator-info {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        /* Documents */
        .documents-list {
            list-style: none;
        }

        .document-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .document-item:last-child {
            border-bottom: none;
        }

        .document-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: rgba(56, 182, 161, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--accent);
            font-size: 1.4rem;
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
            font-size: 1.2rem;
            cursor: pointer;
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
                
                <div class="user-profile">
                    <div class="user-avatar">MD</div>
                    <div class="user-info">
                        <h4>Marie Dupont</h4>
                        <p>Patient</p>
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </header>

        <!-- Stats Dashboard -->
        <div class="dashboard-grid">
            <div class="stat-card appointments">
                <div class="stat-header">
                    <div class="stat-title">Rendez-vous à venir</div>
                    <div class="stat-icon appointments">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
                <div class="stat-value">2</div>
                <div class="stat-change">Prochain dans 3 jours</div>
            </div>
            
            <div class="stat-card doctors">
                <div class="stat-header">
                    <div class="stat-title">Médecins suivis</div>
                    <div class="stat-icon doctors">
                        <i class="fas fa-user-md"></i>
                    </div>
                </div>
                <div class="stat-value">3</div>
                <div class="stat-change">Dernier ajout: Dr. Martin</div>
            </div>
            
            <div class="stat-card health">
                <div class="stat-header">
                    <div class="stat-title">Dernière consultation</div>
                    <div class="stat-icon health">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                </div>
                <div class="stat-value">15 jours</div>
                <div class="stat-change">Prochaine recommandée dans 1 mois</div>
            </div>
            
            <div class="stat-card documents">
                <div class="stat-header">
                    <div class="stat-title">Documents médicaux</div>
                    <div class="stat-icon documents">
                        <i class="fas fa-file-medical"></i>
                    </div>
                </div>
                <div class="stat-value">12</div>
                <div class="stat-change">Dernier ajouté hier</div>
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
                                <div class="doctor-action">Contacter</div>
                            </li>
                            <li class="doctor-item">
                                <div class="doctor-avatar">SB</div>
                                <div class="doctor-info">
                                    <h4>Dr. Sophie Bernard</h4>
                                    <p><i class="fas fa-eye"></i> Ophtalmologue</p>
                                </div>
                                <div class="doctor-action">Contacter</div>
                            </li>
                            <li class="doctor-item">
                                <div class="doctor-avatar">JL</div>
                                <div class="doctor-info">
                                    <h4>Dr. Jean Lefebvre</h4>
                                    <p><i class="fas fa-bone"></i> Rhumatologue</p>
                                </div>
                                <div class="doctor-action">Contacter</div>
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
                        <button class="doctor-action" style="width: 100%; margin-bottom: 1rem;">
                            <i class="fas fa-calendar-plus"></i> Prendre rendez-vous
                        </button>
                        <button class="doctor-action" style="width: 100%; margin-bottom: 1rem; background: rgba(56, 182, 161, 0.15);">
                            <i class="fas fa-comment-medical"></i> Demander conseil
                        </button>
                        <button class="doctor-action" style="width: 100%; background: rgba(13, 74, 117, 0.15);">
                            <i class="fas fa-file-upload"></i> Ajouter un document
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mise à jour de la date actuelle
            const today = new Date();
            const days = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
            const months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
            const dateString = `${days[today.getDay()]} ${today.getDate()} ${months[today.getMonth()]} ${today.getFullYear()}`;
            document.querySelector('.header-title p').textContent += " - " + dateString;
            
            // Animation des cartes
            const cards = document.querySelectorAll('.card, .stat-card, .indicator-card');
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
            
            // Téléchargement de documents
            const downloadBtns = document.querySelectorAll('.document-action');
            downloadBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    alert('Téléchargement du document...');
                });
            });
            
            // Actions rapides
            const actionBtns = document.querySelectorAll('.doctor-action');
            actionBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const action = this.textContent.trim();
                    alert(`Action: ${action}`);
                });
            });
        });
    </script>
</body>
</html>