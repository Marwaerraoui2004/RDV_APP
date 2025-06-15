<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendre un rendez-vous - MediConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
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
        :root {
            --primary: #3a86ff;
            --primary-light: #e6f0ff;
            --primary-dark: #2667cc;
            --secondary: #38b000;
            --accent: #8338ec;
            --text-dark: #2d3748;
            --text-light: #718096;
            --bg-light: #f8f9fa;
            --bg-card: #ffffff;
            --border-radius: 16px;
            --shadow: 0 10px 30px rgba(0,0,0,0.08);
            --transition: all 0.3s ease;
        }

        .dark {
            --primary: #5da8ff;
            --primary-light: #2a4365;
            --text-dark: #e2e8f0;
            --text-light: #a0aec0;
            --bg-light: #1a202c;
            --bg-card: #2d3748;
            --shadow: 0 10px 30px rgba(0,0,0,0.25);
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            color: var(--text-dark);
            min-height: 100vh;
            padding: 20px;
            transition: background 0.3s;
        }

        body.dark {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
        }

        .appointment-container {
            max-width: 800px;
            margin: 40px auto;
            background: var(--bg-card);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
        }

        .appointment-header {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            padding: 25px 30px;
            position: relative;
            overflow: hidden;
        }

        .appointment-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 70%);
            z-index: 1;
        }

        .appointment-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .appointment-header h2 i {
            font-size: 1.5rem;
        }

        .appointment-content {
            padding: 30px;
        }

        .success-message {
            padding: 15px 20px;
            background: rgba(56, 182, 161, 0.15);
            color: #38b000;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: fadeIn 0.5s;
        }

        .success-message i {
            font-size: 1.2rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .appointment-form {
            display: grid;
            gap: 25px;
        }

        .form-group {
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label i {
            color: var(--primary);
            width: 22px;
            text-align: center;
        }

        .form-select, .form-input, .form-textarea {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            background: var(--bg-light);
            color: var(--text-dark);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-select:focus, .form-input:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(58, 134, 255, 0.2);
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%233a86ff' viewBox='0 0 16 16'%3E%3Cpath d='M8 11L3 6h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 14px;
        }

        .doctor-option {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 0;
        }

        .doctor-info {
            display: flex;
            flex-direction: column;
        }

        .doctor-name {
            font-weight: 600;
            color: var(--text-dark);
        }

        .doctor-speciality {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-top: 4px;
        }

        .doctor-rating {
            display: flex;
            align-items: center;
            gap: 4px;
            background: rgba(236, 201, 75, 0.15);
            color: #d69e2e;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .error-message {
            color: #e53e3e;
            font-size: 0.9rem;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
            animation: shake 0.5s;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }

        .submit-button {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            border: none;
            padding: 16px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 12px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .submit-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(131, 56, 236, 0.3);
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .form-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        /* Dark mode toggle */
        .theme-toggle {
            position: absolute;
            top: 25px;
            right: 25px;
            background: rgba(255, 255, 255, 0.2);
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

        .theme-toggle:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(20deg);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .appointment-container {
                margin: 20px auto;
            }
            
            .appointment-header {
                padding: 20px;
            }
            
            .appointment-content {
                padding: 20px;
            }
            
            .doctor-option {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
            
            .doctor-rating {
                align-self: flex-start;
            }
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                Prendre un rendez-vous
            </h2>
        </x-slot>

        <div class="appointment-container">
            <div class="appointment-header">
                <h2>
                    <i class="fas fa-calendar-check"></i>
                    Prendre un rendez-vous
                </h2>
                <div class="theme-toggle" onclick="toggleTheme()">
                    <i class="fas fa-moon" id="theme-icon"></i>
                </div>
            </div>
            
            <div class="appointment-content">
                @if(session('success'))
                    <div class="success-message">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('patient.appointments.store') }}" method="POST" class="appointment-form">
                    @csrf

                    <!-- Choix du docteur avec spécialité et note -->
                    <div class="form-group">
                        <label for="doctor_id" class="form-label">
                            <i class="fas fa-user-md"></i>
                            Choisissez un docteur
                        </label>
                        <select name="doctor_id" id="doctor_id" class="form-select" required>
                            <option value="" disabled selected>-- Sélectionnez un docteur --</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                    <div class="doctor-option">
                                        <div class="doctor-info">
                                            <span class="doctor-name">Dr. {{ $doctor->name }}</span>
                                            <span class="doctor-speciality">{{ $doctor->specialty ?? 'N/A' }}</span>
                                        </div>
                                        <div class="doctor-rating">
                                            <i class="fas fa-star"></i> {{ number_format($doctor->reviews_received_avg_rating ?? 0, 1) }}/5
                                        </div>
                                    </div>
                                </option>
                            @endforeach
                        </select>
                        @error('doctor_id')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Date et heure -->
                    <div class="form-group">
                        <label for="appointment_datetime" class="form-label">
                            <i class="fas fa-clock"></i>
                            Date et heure du rendez-vous
                        </label>
                        <input type="datetime-local" id="appointment_datetime" name="appointment_datetime"
                            class="form-input"
                            value="{{ old('appointment_datetime') }}" required>
                        @error('appointment_datetime')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Notes -->
                    <div class="form-group">
                        <label for="notes" class="form-label">
                            <i class="fas fa-notes-medical"></i>
                            Notes (optionnel)
                        </label>
                        <textarea id="notes" name="notes" rows="4"
                            class="form-textarea"
                            placeholder="Ajouter des informations complémentaires...">{{ old('notes') }}</textarea>
                        @error('notes')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Bouton -->
                    <button type="submit" class="submit-button">
                        <i class="fas fa-paper-plane"></i>
                        Envoyer la demande
                    </button>
                    
                    <div class="form-footer">
                        Vous pouvez modifier votre rendez-vous jusqu'à 24h à l'avance. 
                        <a href="#">Voir notre politique d'annulation</a>
                    </div>
                </form>
            </div>
        </div>
    </x-app-layout>
    
    <script>
        // Toggle dark mode
        function toggleTheme() {
            document.body.classList.toggle('dark');
            const icon = document.getElementById('theme-icon');
            
            if (document.body.classList.contains('dark')) {
                icon.className = 'fas fa-sun';
            } else {
                icon.className = 'fas fa-moon';
            }
            
            // Update Tailwind dark mode
            document.documentElement.classList.toggle('dark');
        }
        
        // Set min date to today
        const today = new Date().toISOString().slice(0, 16);
        document.getElementById('appointment_datetime').min = today;
        
        // Initialize theme based on system preference
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.body.classList.add('dark');
            document.documentElement.classList.add('dark');
            document.getElementById('theme-icon').className = 'fas fa-sun';
        }
    </script>
</body>
</html>