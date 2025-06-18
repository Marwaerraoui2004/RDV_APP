<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une ordonnance - MediConnect</title>
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
        
        .prescription-container {
            max-width: 900px;
            margin: 40px auto;
            background: var(--bg-card);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
            padding: 40px;
            transition: var(--transition);
        }
        
        .prescription-header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        .prescription-header h2 {
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
        
        .prescription-header h2 i {
            color: var(--primary);
            font-size: 2rem;
            transition: var(--transition);
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-dark);
            transition: var(--transition);
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--bg-light);
            color: var(--text-dark);
        }
        
        .dark .form-control {
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
            background-color: var(--bg-card);
        }
        
        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }
        
        .signature-container {
            margin-top: 20px;
            border: 1px dashed rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            background-color: var(--bg-light);
            transition: var(--transition);
        }
        
        .dark .signature-container {
            border: 1px dashed rgba(255, 255, 255, 0.1);
        }
        
        .signature-label {
            font-weight: 600;
            margin-bottom: 15px;
            display: block;
            color: var(--text-dark);
            transition: var(--transition);
        }
        
        #signature-pad {
            background-color: var(--bg-card);
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            cursor: crosshair;
            width: 100%;
            height: 150px;
        }
        
        .dark #signature-pad {
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .signature-actions {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            border: none;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background: var(--primary-dark);
        }
        
        .btn-secondary {
            background: var(--accent);
            color: white;
        }
        
        .btn-secondary:hover {
            background: #3a6a8a;
        }
        
        .btn-danger {
            background: var(--danger);
            color: white;
        }
        
        .btn-danger:hover {
            background: #c53030;
        }
        
        .alert-success {
            background: rgba(56, 182, 161, 0.15);
            color: var(--success);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            border-left: 4px solid var(--success);
            transition: var(--transition);
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
            .prescription-container {
                padding: 30px;
            }
            
            .prescription-header h2 {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            .prescription-container {
                padding: 25px 20px;
            }
            
            .prescription-header h2 {
                font-size: 1.7rem;
            }
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                Créer une ordonnance
            </h2>
        </x-slot>

        <div class="prescription-container">
            <div class="floating-elements">
                <div class="floating-element element-1"></div>
                <div class="floating-element element-2"></div>
            </div>
            
            <div class="prescription-header">
                <h2>
                    <i class="fas fa-prescription-bottle-alt"></i>
                    Nouvelle ordonnance
                </h2>
                <div class="theme-toggle" onclick="toggleTheme()">
                    <i class="fas fa-moon" id="theme-icon"></i>
                </div>
            </div>
            
            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('prescriptions.store') }}">
                @csrf

                <input type="hidden" name="doctor_id" value="{{ auth()->user()->id }}">
                
                <div class="form-group">
                    <label for="patient_id" class="form-label">Patient</label>
                    <select name="patient_id" id="patient_id" class="form-control" required>
                        <option value="">-- Choisir un patient --</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="medication_name" class="form-label">Médicament</label>
                    <input type="text" name="medication_name" id="medication_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="dosage" class="form-label">Dosage</label>
                    <input type="text" name="dosage" id="dosage" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="frequency" class="form-label">Fréquence</label>
                    <input type="text" name="frequency" id="frequency" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="duration" class="form-label">Durée</label>
                    <input type="text" name="duration" id="duration" class="form-control" required>
                </div>

                <div class="signature-container">
                    <label class="signature-label">
                        <i class="fas fa-signature"></i> Signature digitale
                    </label>
                    <canvas id="signature-pad"></canvas>
                    <input type="hidden" name="signature" id="signature">
                    <div class="signature-actions">
                        <button type="button" id="clear" class="btn btn-danger">
                            <i class="fas fa-eraser"></i> Effacer
                        </button>
                    </div>
                </div>

                <div class="flex justify-end gap-4 mt-8">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Retour
                    </a>
                    <button type="submit" onclick="return prepareSignature()" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script>
        const canvas = document.getElementById('signature-pad');
        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)',
            penColor: 'rgb(0, 0, 0)'
        });

        function resizeCanvas() {
            const ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext('2d').scale(ratio, ratio);
            signaturePad.clear();
        }

        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        document.getElementById('clear').addEventListener('click', () => {
            signaturePad.clear();
        });

        function prepareSignature() {
            if(signaturePad.isEmpty()) {
                alert("Veuillez signer avant d'envoyer l'ordonnance.");
                return false;
            }
            const dataUrl = signaturePad.toDataURL();
            document.getElementById('signature').value = dataUrl;
            return true;
        }
        
        function toggleTheme() {
            document.body.classList.toggle('dark');
            const icon = document.getElementById('theme-icon');
            
            if (document.body.classList.contains('dark')) {
                icon.className = 'fas fa-sun';
                localStorage.setItem('theme', 'dark');
                // Update signature pad color for dark mode
                signaturePad.penColor = 'rgb(255, 255, 255)';
                signaturePad.backgroundColor = 'rgb(45, 55, 72)';
                signaturePad.clear();
            } else {
                icon.className = 'fas fa-moon';
                localStorage.setItem('theme', 'light');
                // Update signature pad color for light mode
                signaturePad.penColor = 'rgb(0, 0, 0)';
                signaturePad.backgroundColor = 'rgb(255, 255, 255)';
                signaturePad.clear();
            }
        }
        
        // Check for saved theme preference or use system preference
        function loadTheme() {
            const savedTheme = localStorage.getItem('theme');
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (savedTheme === 'dark' || (!savedTheme && systemDark)) {
                document.body.classList.add('dark');
                document.getElementById('theme-icon').className = 'fas fa-sun';
                signaturePad.penColor = 'rgb(255, 255, 255)';
                signaturePad.backgroundColor = 'rgb(45, 55, 72)';
                signaturePad.clear();
            }
        }
        
        // Load theme on page load
        document.addEventListener('DOMContentLoaded', loadTheme);
    </script>
</body>
</html>
