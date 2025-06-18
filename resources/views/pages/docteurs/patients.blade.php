<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Patients - MediConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#2667cc',
                        primaryLight: '#e6f0ff',
                        primaryDark: '#1a4d99',
                        accent: '#457b9d',
                        success: '#38b000',
                        warning: '#ecc94b',
                        danger: '#e53e3e',
                        textDark: '#2d3748',
                        textLight: '#718096',
                        bgLight: '#f8f9fa',
                        bgCard: '#ffffff',
                    },
                    borderRadius: {
                        custom: '16px',
                    },
                    boxShadow: {
                        custom: '0 15px 30px rgba(0,0,0,0.1)',
                        customDark: '0 15px 30px rgba(0,0,0,0.25)',
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
            --shadow: 0 15px 30px rgba(0,0,0,0.25);
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
        
        .patients-container {
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
        
        .patients-header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        .patients-header h2 {
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
        
        .patients-header h2 i {
            color: var(--primary);
            font-size: 2rem;
            transition: var(--transition);
        }
        
        .patients-subtitle {
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
        
        .patient-card {
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
        .dark .patient-card {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }
        
        .patient-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(39, 103, 204, 0.2);
        }
        .dark .patient-card:hover {
            box-shadow: 0 12px 30px rgba(39, 103, 204, 0.4);
        }
        
        .patient-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        .dark .patient-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .patient-main-info {
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
        
        .patient-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .stat-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .stat-icon {
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
        
        .stat-content h4 {
            font-size: 0.95rem;
            color: var(--text-light);
            margin-bottom: 3px;
            transition: var(--transition);
        }
        
        .stat-content p {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--text-dark);
            transition: var(--transition);
        }
        
        .patient-actions {
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
        
        .view-btn {
            background: var(--primary);
            color: white;
        }
        .view-btn:hover {
            background: var(--primary-dark);
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
        
        /* Theme toggle */
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
        
        /* Responsive */
        @media (max-width: 768px) {
            .patients-container {
                padding: 30px;
            }
            
            .patients-header h2 {
                font-size: 2rem;
            }
            
            .patient-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .patient-actions {
                flex-direction: column;
                gap: 10px;
            }
        }
        
        @media (max-width: 480px) {
            .patients-container {
                padding: 25px 20px;
            }
            
            .patients-header h2 {
                font-size: 1.7rem;
            }
            
            .patient-main-info {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .patient-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                Mes Patients
            </h2>
        </x-slot>

        <div class="patients-container">
            <div class="floating-elements">
                <div class="floating-element element-1"></div>
                <div class="floating-element element-2"></div>
            </div>
            
            <div class="patients-header">
                <h2>
                    <i class="fas fa-user-injured"></i>
                    Mes Patients
                </h2>
                <div class="theme-toggle" onclick="toggleTheme()">
                    <i class="fas fa-moon" id="theme-icon"></i>
                </div>
                <p class="patients-subtitle">
                    Consultez et gérez les dossiers de vos patients
                </p>
            </div>
            
            @if ($patients->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-user-slash"></i>
                    <h3>Aucun patient enregistré</h3>
                    <p>Vous n'avez actuellement aucun patient dans votre liste.</p>
                </div>
            @else
                <div class="patients-list">
                    @foreach ($patients as $patient)
                        <div class="patient-card">
                            <div class="patient-header">
                                <div class="patient-main-info">
                                    <div class="patient-avatar">
                                        {{ substr($patient->name ?? 'N/A', 0, 1) }}
                                    </div>
                                    <div class="patient-details">
                                        <h3>{{ $patient->name ?? 'N/A' }}</h3>
                                        <p>
                                            {{ $patient->phone ?? 'Tél. non renseigné' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="patient-stats">
                                <div class="stat-item">
                                    <div class="stat-icon">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="stat-content">
                                        <h4>Dernier RDV</h4>

 @php
                                           $appointments = $patient->patientAppointments ?? collect(); // Si null, on met une collection vide

                                            $lastAppointment = $appointments
                                                ->where('appointment_datetime', '<', now())
                                                ->sortByDesc('appointment_datetime')
                                                ->first();
                                        @endphp

                                        @foreach($patient->patientAppointments as $app)
                                            <p>{{ $app->appointment_datetime }}</p>
                                        @endforeach
                                     </div>
                                </div>
                                
                                <div class="stat-item">
                                    <div class="stat-icon">
                                        <i class="fas fa-heartbeat"></i>
                                    </div>
                                    <div class="stat-content">
                                        <h4>Problème principal</h4>
                                        <p>{{ $patient->main_condition ?? 'Non spécifié' }}</p>
                                    </div>
                                </div>
                                
                                <div class="stat-item">
                                    <div class="stat-icon">
                                        <i class="fas fa-pills"></i>
                                    </div>
                                    <div class="stat-content">
                                        <h4>Traitement</h4>
                                        <p>{{ $patient->current_treatment ?? 'Aucun' }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="patient-actions">
                                <a href="{{ route('docteur.patients', $patient->id) }}" class="action-btn view-btn">
                                    <i class="fas fa-eye"></i> Dossier
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <script>
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
            
            // Check for saved theme preference or use system preference
            function loadTheme() {
                const savedTheme = localStorage.getItem('theme');
                const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                
                if (savedTheme === 'dark' || (!savedTheme && systemDark)) {
                    document.body.classList.add('dark');
                    document.getElementById('theme-icon').className = 'fas fa-sun';
                }
            }
            
            // Load theme on page load
            document.addEventListener('DOMContentLoaded', loadTheme);
        </script>
    </x-app-layout>
</body>
</html>
