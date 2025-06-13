 {{-- <div class="modal fade" id="adviceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Demander conseil médical</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="adviceForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Médecin</label>
                            <select class="form-select" name="doctor_id" required>
                                <option value="">Sélectionnez un médecin</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">Dr. {{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sujet</label>
                            <input type="text" class="form-control" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="message" rows="4" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-accent" id="submitAdvice">Envoyer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale Ajouter Document -->
    <div class="modal fade" id="documentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un document médical</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="documentForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Titre du document</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fichier (PDF, JPG, PNG - max 2MB)</label>
                            <input type="file" class="form-control" name="document" accept=".pdf,.jpg,.jpeg,.png"
                                required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-accent" id="submitDocument">Ajouter</button>
                </div>
            </div>
        </div>

        <!-- Modale Prendre Rendez-vous -->
    <div class="modal fade" id="appointmentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Prendre un rendez-vous</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="appointmentForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Médecin</label>
                            <select class="form-select" name="doctor_id" required>
                                <option value="">Sélectionnez un médecin</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">Dr. {{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" min="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Heure</label>
                            <select class="form-select" name="time" required disabled>
                                <option value="">Choisissez d'abord une date</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" id="submitAppointment">Confirmer</button>
                </div>
            </div>
        </div>
    </div> --}}









    <html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace Patient - MediConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        /* Le CSS reste inchangé */
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
            <a href="{{ route('patient.messaging') }}" class="nav-item">
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
                <p>
                    Bonjour
                    @if(isset($patient))
                        {{ $patient->name }}
                    @else
                        Utilisateur
                    @endif
                    , voici votre tableau de bord
                </p>
            </div>

            <div class="header-actions">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Rechercher...">
                </div>

                <div class="user-profile" id="profileDropdown">
                    <div class="user-avatar">
                        {{ substr($patient->name, 0, 1) }}{{ substr($patient->name, strpos($patient->name, ' ') + 1, 1) }}
                    </div>
                    <div class="user-info">
                        <h4>{{ $patient->name }}</h4>
                        <p>Patient</p>
                    </div>
                    <i class="fas fa-chevron-down"></i>

                    <!-- Menu déroulant profil -->
                    <div class="dropdown-menu"
                        style="display: none; position: absolute; background: white; box-shadow: var(--shadow); border-radius: var(--border-radius); padding: 0.5rem; width: 200px; z-index: 100; top: 100%; right: 0; margin-top: 5px;">
                        <a href="{{ route('patient.settings') }}" class="dropdown-item"
                            style="padding: 0.5rem; display: block; border-radius: 5px; transition: var(--transition);">
                            <i class="fas fa-user-cog me-2"></i> Mon profil
                        </a>
                        <a href="#" class="dropdown-item"
                            style="padding: 0.5rem; display: block; border-radius: 5px; transition: var(--transition);">
                            <i class="fas fa-cog me-2"></i> Paramètres
                        </a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="dropdown-item"
                            style="padding: 0.5rem; display: block; border-radius: 5px; transition: var(--transition);">
                            <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Stats Dashboard -->
        <div class="dashboard-grid">
            <!-- ... (stats dynamiques) ... -->
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
                        <!-- ... (liste dynamique) ... -->
                    </div>
                </div>

                <!-- Mes médecins -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Mes médecins</div>
                        <div class="card-action">Tous voir</div>
                    </div>
                    <div class="card-body">
                        <!-- ... (liste dynamique) ... -->
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
                            @foreach($healthIndicators as $indicator)
                                                    <div class="indicator-card">
                                                        <div class="indicator-title">{{ $indicator['title'] }}</div>
                                                        <div class="indicator-value">{{ $indicator['value'] }}</div>
                                                        <div class="indicator-range">
                                                            <div class="indicator-progress" style="width: 
                                                                {{ $indicator['title'] === 'Tension' ? 75 :
                                ($indicator['title'] === 'Fréquence cardiaque' ? 65 :
                                    ($indicator['title'] === 'Glycémie' ? 40 : 55)) }}%">
                                                            </div>
                                                        </div>
                                                        <div class="indicator-info">
                                                            @if($indicator['status'] === 'normal')
                                                                <i class="fas fa-check-circle text-success me-1"></i> Dans la norme
                                                            @elseif($indicator['status'] === 'warning')
                                                                <i class="fas fa-exclamation-triangle text-warning me-1"></i> À surveiller
                                                            @else
                                                                <i class="fas fa-exclamation-circle text-danger me-1"></i> Attention
                                                            @endif
                                                        </div>
                                                    </div>
                            @endforeach
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
                            @foreach($recentDocuments as $document)
                                <li class="document-item">
                                    <div class="document-icon">
                                        <i class="fas fa-file-medical"></i>
                                    </div>
                                    <div class="document-info">
                                        <h4>{{ $document->title }}</h4>
                                        <p>Ajouté {{ $document->created_at->diffForHumans() }}</p>
                                    </div>
                                    <a href="{{ route('patient.document.download', $document) }}" class="document-action">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Actions rapides -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Actions rapides</div>
                    </div>
                    <div class="card-body">
                        <button class="doctor-action" style="width: 100%; margin-bottom: 1rem;" data-bs-toggle="modal"
                            data-bs-target="#appointmentModal">
                            <i class="fas fa-calendar-plus"></i> Prendre rendez-vous
                        </button>
                        <button class="doctor-action"
                            style="width: 100%; margin-bottom: 1rem; background: rgba(56, 182, 161, 0.15);"
                            data-bs-toggle="modal" data-bs-target="#adviceModal">
                            <i class="fas fa-comment-medical"></i> Demander conseil
                        </button>
                        <button class="doctor-action" style="width: 100%; background: rgba(13, 74, 117, 0.15);"
                            data-bs-toggle="modal" data-bs-target="#documentModal">
                            <i class="fas fa-file-upload"></i> Ajouter un document
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
   
   
 </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Menu déroulant profil
            const profileDropdown = document.getElementById('profileDropdown');
            const dropdownMenu = profileDropdown.querySelector('.dropdown-menu');

            profileDropdown.addEventListener('click', function () {
                dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
            });

            // Fermer le menu quand on clique ailleurs
            document.addEventListener('click', function (e) {
                if (!profileDropdown.contains(e.target)) {
                    dropdownMenu.style.display = 'none';
                }
            });

            // Gestion des heures disponibles pour les rendez-vous
            const doctorSelect = document.querySelector('#appointmentModal select[name="doctor_id"]');
            const dateInput = document.querySelector('#appointmentModal input[name="date"]');
            const timeSelect = document.querySelector('#appointmentModal select[name="time"]');

            dateInput.addEventListener('change', function () {
                if (doctorSelect.value && dateInput.value) {
                    fetchAvailableHours(doctorSelect.value, dateInput.value);
                }
            });

            function fetchAvailableHours(doctorId, date) {
                fetch(`/api/appointments/available-hours?doctor_id=${doctorId}&date=${date}`)
                    .then(response => response.json())
                    .then(data => {
                        timeSelect.innerHTML = '';
                        if (data.hours && data.hours.length > 0) {
                            data.hours.forEach(hour => {
                                const option = document.createElement('option');
                                option.value = hour;
                                option.textContent = hour;
                                timeSelect.appendChild(option);
                            });
                            timeSelect.disabled = false;
                        } else {
                            const option = document.createElement('option');
                            option.textContent = 'Aucun créneau disponible';
                            timeSelect.appendChild(option);
                            timeSelect.disabled = true;
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                        timeSelect.innerHTML = '<option>Erreur de chargement</option>';
                    });
            }

            // Soumission du formulaire de rendez-vous
            document.getElementById('submitAppointment').addEventListener('click', function () {
                const formData = new FormData(document.getElementById('appointmentForm'));

                fetch('/patient/appointment/store', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Rendez-vous pris avec succès!');
                            location.reload();
                        } else {
                            alert('Erreur: ' + (data.error || 'Impossible de prendre le rendez-vous'));
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                        alert('Une erreur est survenue');
                    });
            });

            // Soumission du formulaire de conseil
            document.getElementById('submitAdvice').addEventListener('click', function () {
                const formData = new FormData(document.getElementById('adviceForm'));

                fetch('/patient/send-message', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Message envoyé avec succès!');
                            document.getElementById('adviceModal').querySelector('.btn-close').click();
                        } else {
                            alert('Erreur: ' + (data.error || 'Impossible d\'envoyer le message'));
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                        alert('Une erreur est survenue');
                    });
            });

            // Soumission du formulaire de document
            document.getElementById('submitDocument').addEventListener('click', function () {
                const formData = new FormData(document.getElementById('documentForm'));

                fetch('/patient/upload-document', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Document ajouté avec succès!');
                            location.reload();
                        } else {
                            alert('Erreur: ' + (data.errors?.document?.[0] || 'Impossible d\'ajouter le document'));
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                        alert('Une erreur est survenue');
                    });
            });
        });
    </script>
</body>

</html>
