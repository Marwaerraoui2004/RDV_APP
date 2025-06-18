<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des ordonnances - MediConnect</title>
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
                        danger: '#e53e3e'
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
        
        .prescriptions-container {
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
        
        .prescriptions-header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        .prescriptions-header h2 {
            font-size: 2.4rem;
            font-weight: 700;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .prescriptions-header h2 i {
            color: var(--primary);
            font-size: 2rem;
        }
        
        .prescriptions-subtitle {
            color: var(--text-light);
            font-size: 1.1rem;
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            background: var(--bg-light);
            border-radius: var(--border-radius);
            margin: 20px 0;
        }
        
        .empty-state i {
            font-size: 4rem;
            color: var(--primary-light);
            margin-bottom: 20px;
        }
        
        .empty-state h3 {
            font-size: 1.8rem;
            color: var(--text-dark);
            margin-bottom: 15px;
        }
        
        .empty-state p {
            color: var(--text-light);
            margin-bottom: 30px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .prescription-card {
            background: var(--bg-card);
            border-radius: var(--border-radius);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            padding: 25px;
            margin-bottom: 25px;
            transition: var(--transition);
            border-left: 4px solid var(--primary);
        }
        
        .dark .prescription-card {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }
        
        .prescription-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(39, 103, 204, 0.2);
        }
        
        .dark .prescription-card:hover {
            box-shadow: 0 12px 30px rgba(39, 103, 204, 0.4);
        }
        
        .prescription-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .dark .prescription-header {
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
        }
        
        .patient-details h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--text-dark);
        }
        
        .patient-details p {
            color: var(--text-light);
            font-size: 0.95rem;
        }
        
        .prescription-date {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .prescription-details {
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
        }
        
        .detail-content h4 {
            font-size: 0.95rem;
            color: var(--text-light);
            margin-bottom: 3px;
        }
        
        .detail-content p {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--text-dark);
        }
        
        .prescription-notes {
            background: var(--bg-light);
            border-radius: 12px;
            padding: 15px;
            margin-top: 15px;
            border-left: 3px solid var(--primary-light);
        }
        
        .prescription-notes h4 {
            font-size: 1rem;
            color: var(--text-light);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .prescription-notes p {
            color: var(--text-dark);
            line-height: 1.6;
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
        
        @media (max-width: 768px) {
            .prescriptions-container {
                padding: 30px;
            }
            
            .prescriptions-header h2 {
                font-size: 2rem;
            }
            
            .prescription-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
        
        @media (max-width: 480px) {
            .prescriptions-container {
                padding: 25px 20px;
            }
            
            .prescriptions-header h2 {
                font-size: 1.7rem;
            }
            
            .patient-info {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .prescription-details {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                Mes ordonnances
            </h2>
        </x-slot>

        <div class="prescriptions-container">
            <div class="floating-elements">
                <div class="floating-element element-1"></div>
                <div class="floating-element element-2"></div>
            </div>
            
            <div class="prescriptions-header">
                <h2>
                    <i class="fas fa-prescription-bottle-alt"></i>
                    Ordonnances
                </h2>
                <div class="theme-toggle" onclick="toggleTheme()">
                    <i class="fas fa-moon" id="theme-icon"></i>
                </div>
                <p class="prescriptions-subtitle">
                    Consultez les ordonnances que vous avez créées
                </p>
            </div>
            
            @if ($prescriptions->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-file-medical"></i>
                    <h3>Aucune ordonnance créée</h3>
                    <p>Vous n'avez pas encore créé d'ordonnances pour vos patients.</p>
                    <a href="{{ route('prescriptions.create') }}" class="action-btn create-btn">
                        <i class="fas fa-plus"></i> Créer une ordonnance
                    </a>
                </div>
            @else
                <div class="prescriptions-list">
                    @foreach ($prescriptions as $prescription)
                        <div class="prescription-card">
                            <div class="prescription-header">
                                <div class="patient-info">
                                    <div class="patient-avatar">
                                        {{ substr($prescription->patient->name ?? 'N/A', 0, 1) }}
                                    </div>
                                    <div class="patient-details">
                                        <h3>{{ $prescription->patient->name ?? 'N/A' }}</h3>
                                        <p>
                                            {{ $prescription->patient->phone ?? 'Tél. non renseigné' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="prescription-date">
                                    Créée le {{ $prescription->created_at->format('d/m/Y') }}
                                </div>
                            </div>
                            
                            <div class="prescription-details">
                                <div class="detail-item">
                                    <div class="detail-icon">
                                        <i class="fas fa-pills"></i>
                                    </div>
                                    <div class="detail-content">
                                        <h4>Médicament</h4>
                                        <p>{{ $prescription->medication_name }}</p>
                                    </div>
                                </div>
                                
                                <div class="detail-item">
                                    <div class="detail-icon">
                                        <i class="fas fa-syringe"></i>
                                    </div>
                                    <div class="detail-content">
                                        <h4>Dosage</h4>
                                        <p>{{ $prescription->dosage }}</p>
                                    </div>
                                </div>
                                
                                <div class="detail-item">
                                    <div class="detail-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="detail-content">
                                        <h4>Fréquence</h4>
                                        <p>{{ $prescription->frequency }}</p>
                                    </div>
                                </div>
                                
                                <div class="detail-item">
                                    <div class="detail-icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="detail-content">
                                        <h4>Durée</h4>
                                        <p>{{ $prescription->duration }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            @if($prescription->notes)
                                <div class="prescription-notes">
                                    <h4>
                                        <i class="fas fa-notes-medical"></i>
                                        Notes
                                    </h4>
                                    <p>{{ $prescription->notes }}</p>
                                </div>
                            @endif
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
            
            function loadTheme() {
                const savedTheme = localStorage.getItem('theme');
                const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                
                if (savedTheme === 'dark' || (!savedTheme && systemDark)) {
                    document.body.classList.add('dark');
                    document.getElementById('theme-icon').className = 'fas fa-sun';
                }
            }
            
            document.addEventListener('DOMContentLoaded', loadTheme);
        </script>
    </x-app-layout>
</body>
</html>
