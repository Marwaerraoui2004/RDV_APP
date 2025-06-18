<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous patients - MediConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#3a86ff',
                        primaryLight: '#e6f0ff',
                        primaryDark: '#2667cc',
                        secondary: '#38b000',
                        accent: '#8338ec',
                        textDark: '#2d3748',
                        textLight: '#718096',
                        bgLight: '#f8f9fa',
                        bgCard: '#ffffff',
                    },
                    borderRadius: {
                        custom: '16px',
                    },
                    boxShadow: {
                        custom: '0 10px 30px rgba(0,0,0,0.08)',
                        customDark: '0 10px 30px rgba(0,0,0,0.25)',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        :root {
            --primary: #2667cc;
            --primary-light: #e6f0ff;
            --primary-dark: #1a4d99;
            --accent: #457b9d;
            --success: #38b000;
            --warning: #ecc94b;
            --danger: #e53e3e;
            --text-dark: #2d3748;
            --text-light: #718096;
            --bg-light: #f8f9fa;
            --bg-card: #ffffff;
            --border-radius: 16px;
            --shadow: 0 15px 30px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
        }
        
        .dark {
            --primary: #5da8ff;
            --primary-light: #2a4365;
            --primary-dark: #3a86ff;
            --accent: #83a3ec;
            --text-dark: #e2e8f0;
            --text-light: #a0aec0;
            --bg-light: #1a202c;
            --bg-card: #2d3748;
            --shadow: 0 10px 30px rgba(0,0,0,0.25);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f7ff 0%, #e6f2ff 100%);
            color: var(--text-dark);
            min-height: 100vh;
            transition: var(--transition);
        }
        body.dark {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
        }
        
        .appointments-container {
            max-width: 1000px;
            margin: 40px auto;
            background: var(--bg-card);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
            padding: 40px;
            transition: var(--transition);
        }
        
        .appointments-header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        .appointments-header h2 {
            font-size: 2.4rem;
            font-weight: 700;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 15px;
            transition: var(--transition);
        }
        
        .appointments-header h2 i {
            color: var(--primary);
            font-size: 2rem;
            transition: var(--transition);
        }
        
        .appointments-subtitle {
            color: var(--text-light);
            font-size: 1.1rem;
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.6;
            transition: var(--transition);
        }
        
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            background: var(--bg-light);
            border-radius: var(--border-radius);
            margin: 20px 0;
            transition: var(--transition);
        }
        
        .empty-state i {
            font-size: 4rem;
            color: var(--primary-light);
            margin-bottom: 20px;
            transition: var(--transition);
        }
        
        .empty-state h3 {
            font-size: 1.8rem;
            color: var(--text-dark);
            margin-bottom: 15px;
            transition: var(--transition);
        }
        
        .empty-state p {
            color: var(--text-light);
            margin-bottom: 30px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            transition: var(--transition);
        }
        
        .appointment-card {
            background: var(--bg-card);
            border-radius: var(--border-radius);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            padding: 25px;
            margin-bottom: 25px;
            transition: var(--transition);
            border-left: 4px solid var(--primary);
            position: relative;
            overflow: hidden;
        }
        .dark .appointment-card {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }
        
        .appointment-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(39, 103, 204, 0.2);
        }
        .dark .appointment-card:hover {
            box-shadow: 0 12px 30px rgba(39, 103, 204, 0.4);
        }
        
        .appointment-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        .dark .appointment-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .patient-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .patient-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.5rem;
            transition: var(--transition);
        }
        
        .patient-details h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--text-dark);
            transition: var(--transition);
        }
        
        .patient-details p {
            color: var(--text-light);
            font-size: 0.95rem;
            transition: var(--transition);
        }
        
        .appointment-status {
            padding: 6px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
        }
        
        .status-confirmed {
            background: rgba(56, 182, 161, 0.15);
            color: var(--success);
        }
        
        .status-pending {
            background: rgba(236, 201, 75, 0.15);
            color: var(--warning);
        }
        
        .status-cancelled {
            background: rgba(229, 62, 62, 0.15);
            color: var(--danger);
        }
        
        .appointment-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .detail-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .detail-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.2rem;
            transition: var(--transition);
        }
        
        .detail-content h4 {
            font-size: 0.95rem;
            color: var(--text-light);
            margin-bottom: 3px;
            transition: var(--transition);
        }
        
        .detail-content p {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--text-dark);
            transition: var(--transition);
        }
        
        .appointment-notes {
            background: var(--bg-light);
            border-radius: 12px;
            padding: 15px;
            margin-top: 15px;
            border-left: 3px solid var(--primary-light);
            transition: var(--transition);
        }
        
        .appointment-notes h4 {
            font-size: 1rem;
            color: var(--text-light);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }
        
        .appointment-notes p {
            color: var(--text-dark);
            line-height: 1.6;
            transition: var(--transition);
        }
        
        .appointment-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            justify-content: flex-end;
        }
        
        .action-btn {
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
        }
        
        .accept-btn {
            background: var(--success);
            color: white;
        }
        .accept-btn:hover {
            background: #2d9a00;
        }
        
        .pending-btn {
            background: var(--warning);
            color: white;
        }
        .pending-btn:hover {
            background: #d9b123;
        }
        
        .refuse-btn {
            background: var(--danger);
            color: white;
        }
        .refuse-btn:hover {
            background: #c53030;
        }
        
        .edit-btn {
            background: var(--accent);
            color: white;
        }
        .edit-btn:hover {
            background: #3a6ebd;
        }
        
        .action-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }
        
        .floating-element {
            position: absolute;
            border-radius: 50%;
            filter: blur(70px);
            opacity: 0.1;
            transition: var(--transition);
        }
        
        .element-1 {
            width: 300px;
            height: 300px;
            background: var(--primary);
            top: -100px;
            right: -100px;
        }
        
        .element-2 {
            width: 250px;
            height: 250px;
            background: var(--accent);
            bottom: -80px;
            left: -80px;
        }
        
        /* Dark mode toggle */
        .theme-toggle {
            position: absolute;
            top: 25px;
            right: 25px;
            background: rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 3;
            transition: var(--transition);
        }
        .dark .theme-toggle {
            background: rgba(255, 255, 255, 0.1);
        }

        .theme-toggle:hover {
            background: rgba(0, 0, 0, 0.2);
            transform: rotate(20deg);
        }
        .dark .theme-toggle:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        /* Form elements */
        .reason-field textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            background: var(--bg-light);
            color: var(--text-dark);
            transition: var(--transition);
        }
        .dark .reason-field textarea {
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .reason-field button {
            padding: 8px 20px;
            border-radius: 8px;
            background: var(--danger);
            color: white;
            border: none;
            cursor: pointer;
            transition: var(--transition);
        }
        .reason-field button:hover {
            background: #c53030;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .appointments-container {
                padding: 30px;
            }
            
            .appointments-header h2 {
                font-size: 2rem;
            }
            
            .appointment-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .appointment-status {
                align-self: flex-start;
            }
            
            .appointment-actions {
                flex-direction: column;
                gap: 10px;
            }
        }
        
        @media (max-width: 480px) {
            .appointments-container {
                padding: 25px 20px;
            }
            
            .appointments-header h2 {
                font-size: 1.7rem;
            }
            
            .patient-info {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .appointment-details {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                Rendez-vous patients
            </h2>
        </x-slot>

        <div class="appointments-container">
            <div class="floating-elements">
                <div class="floating-element element-1"></div>
                <div class="floating-element element-2"></div>
            </div>
            
            <div class="appointments-header">
                <h2>
                    <i class="fas fa-calendar-check"></i>
                    Rendez-vous patients
                </h2>
                <div class="theme-toggle" id="theme-toggle">
                    <i class="fas fa-moon" id="theme-icon"></i>
                </div>
                <p class="appointments-subtitle">
                    Gérer les rendez-vous de vos patients et mettre à jour leur statut
                </p>
            </div>
            
            @if ($appointments->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-calendar-times"></i>
                    <h3>Aucun rendez-vous prévu</h3>
                    <p>Vous n'avez actuellement aucun rendez-vous programmé avec vos patients.</p>
                </div>
            @else
                <div class="appointments-list">
                    @foreach ($appointments as $appointment)
                        <div class="appointment-card">
                            <div class="appointment-header">
                                <div class="patient-info">
                                    <div class="patient-avatar">
                                        {{ substr($appointment->patient->name ?? 'N/A', 0, 1) }}
                                    </div>
                                    <div class="patient-details">
                                        <h3>{{ $appointment->patient->name ?? 'N/A' }}</h3>
                                        <p>
                                            {{ $appointment->patient->age ?? 'N/A' }} ans • 
                                            {{ $appointment->patient->phone ?? 'Tél. non renseigné' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="appointment-status status-{{ str_replace(' ', '-', $appointment->status) }}">
                                    {{ ucfirst($appointment->status) }}
                                </div>
                            </div>
                            
                            <div class="appointment-details">
                                <div class="detail-item">
                                    <div class="detail-icon">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                    <div class="detail-content">
                                        <h4>Date</h4>
                                        <p>{{ \Carbon\Carbon::parse($appointment->appointment_datetime)->translatedFormat('d M Y') }}</p>
                                    </div>
                                </div>
                                
                                <div class="detail-item">
                                    <div class="detail-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="detail-content">
                                        <h4>Heure</h4>
                                        <p>{{ \Carbon\Carbon::parse($appointment->appointment_datetime)->format('H:i') }}</p>
                                    </div>
                                </div>
                                
                                <div class="detail-item">
                                    <div class="detail-icon">
                                        <i class="fas fa-heartbeat"></i>
                                    </div>
                                    <div class="detail-content">
                                        <h4>Motif</h4>
                                        <p>{{ $appointment->reason ?? 'Non précisé' }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            @if($appointment->notes)
                                <div class="appointment-notes">
                                    <h4>
                                        <i class="fas fa-notes-medical"></i>
                                        Notes
                                    </h4>
                                    <p>{{ $appointment->notes }}</p>
                                </div>
                            @endif
                            
                            <div class="appointment-actions">
                                <!-- Accepter -->
                                <form action="{{ route('docteur.rendezvous.statut', $appointment->id) }}" method="POST" class="action-form">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="accepté">
                                    <button type="submit" 
                                            class="action-btn accept-btn"
                                            title="Accepter le rendez-vous"
                                            {{ $appointment->status == 'accepté' ? 'disabled' : '' }}
                                            onclick="return confirm('Confirmer l\\'acceptation de ce rendez-vous?')">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Accepter</span>
                                    </button>
                                </form>

                                <!-- En attente -->
                                <form action="{{ route('docteur.rendezvous.statut', $appointment->id) }}" method="POST" class="action-form">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="en attente">
                                    <button type="submit" 
                                            class="action-btn pending-btn"
                                            title="Mettre en attente"
                                            {{ $appointment->status == 'en attente' ? 'disabled' : '' }}
                                            onclick="return confirm('Mettre ce rendez-vous en attente?')">
                                        <i class="fas fa-clock"></i>
                                        <span>En attente</span>
                                    </button>
                                </form>

                                <!-- Refuser -->
                                <form action="{{ route('docteur.rendezvous.statut', $appointment->id) }}" method="POST" class="action-form" id="refuse-form-{{ $appointment->id }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="refusé">
                                    <div class="reason-field" style="display: none;">
                                        <textarea name="reason" class="form-control mt-2" 
                                                placeholder="Raison du refus (optionnel)"></textarea>
                                        <button type="submit" class="btn btn-danger mt-2">
                                            Confirmer le refus
                                        </button>
                                    </div>
                                    <button type="button" 
                                            class="action-btn refuse-btn"
                                            title="Refuser le rendez-vous"
                                            {{ $appointment->status == 'refusé' ? 'disabled' : '' }}
                                            onclick="showReasonField({{ $appointment->id }})">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Refuser</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </x-app-layout>

    <script>
        // Fonction pour basculer le thème
        function toggleTheme() {
            document.body.classList.toggle('dark');
            const icon = document.getElementById('theme-icon');
            
            if (document.body.classList.contains('dark')) {
                icon.className = 'fas fa-sun';
                localStorage.setItem('theme', 'dark');
            } else {
                icon.className = 'fas fa-moon';
                localStorage.setItem('theme', 'light');
            }
        }
        
        // Charger le thème au démarrage
        function loadTheme() {
            const savedTheme = localStorage.getItem('theme');
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (savedTheme === 'dark' || (!savedTheme && systemDark)) {
                document.body.classList.add('dark');
                document.getElementById('theme-icon').className = 'fas fa-sun';
            }
        }
        
        // Ajouter l'écouteur d'événement
        document.addEventListener('DOMContentLoaded', function() {
            // Charger le thème au démarrage
            loadTheme();
            
            // Ajouter l'écouteur d'événement pour le bouton de bascule
            document.getElementById('theme-toggle').addEventListener('click', toggleTheme);
            
            // Fonction pour afficher le champ de raison
            window.showReasonField = function(appointmentId) {
                const form = document.getElementById('refuse-form-' + appointmentId);
                const reasonField = form.querySelector('.reason-field');
                const refuseBtn = form.querySelector('.refuse-btn');
                
                if (reasonField.style.display === 'none') {
                    reasonField.style.display = 'block';
                    refuseBtn.style.display = 'none';
                } else {
                    reasonField.style.display = 'none';
                    refuseBtn.style.display = 'block';
                }
            };
        });
    </script>
</body>
</html>