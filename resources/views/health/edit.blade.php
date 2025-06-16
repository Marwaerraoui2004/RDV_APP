<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mes indicateurs de santé</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f0f7ff 0%, #e6f3ff 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #333;
        }
        
        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 700px;
            overflow: hidden;
            position: relative;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, #3a86ff, #8338ec);
        }
        
        .header {
            background: white;
            padding: 30px 30px 20px;
            border-bottom: 1px solid #f0f4f8;
        }
        
        .header h2 {
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .header h2 i {
            color: #3a86ff;
            font-size: 30px;
        }
        
        .form-container {
            padding: 30px;
        }
        
        .alert {
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: fadeIn 0.5s ease;
        }
        
        .alert-success {
            background: rgba(56, 182, 161, 0.15);
            border: 1px solid rgba(56, 182, 161, 0.25);
            color: #38b000;
        }
        
        .alert-success i {
            font-size: 20px;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
            animation: slideIn 0.6s ease-out;
            animation-fill-mode: backwards;
        }
        
        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        
        label {
            display: block;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 10px;
            color: #4a5568;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        label i {
            color: #3a86ff;
            font-size: 18px;
            width: 25px;
        }
        
        .input-container {
            position: relative;
        }
        
        input {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
        }
        
        input:focus {
            border-color: #3a86ff;
            outline: none;
            box-shadow: 0 0 0 4px rgba(58, 134, 255, 0.15);
        }
        
        input::placeholder {
            color: #a0aec0;
        }
        
        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #718096;
            font-size: 18px;
        }
        
        .error-message {
            color: #e53e3e;
            font-size: 14px;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            animation: fadeIn 0.3s ease;
        }
        
        .error-message i {
            font-size: 16px;
        }
        
        button {
            background: linear-gradient(135deg, #3a86ff, #8338ec);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 16px 30px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            box-shadow: 0 8px 20px rgba(58, 134, 255, 0.25);
        }
        
        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(58, 134, 255, 0.35);
        }
        
        button:active {
            transform: translateY(-1px);
        }
        
        .info-note {
            background: rgba(236, 201, 75, 0.1);
            border: 1px solid rgba(236, 201, 75, 0.2);
            border-radius: 12px;
            padding: 15px;
            margin-top: 30px;
            font-size: 14px;
            color: #a17917;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        
        .info-note i {
            color: #ecc94b;
            font-size: 18px;
            margin-top: 2px;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideIn {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive */
        @media (max-width: 600px) {
            .container {
                border-radius: 15px;
            }
            
            .header {
                padding: 25px 20px 15px;
            }
            
            .header h2 {
                font-size: 24px;
            }
            
            .form-container {
                padding: 20px;
            }
            
            input {
                padding: 14px 15px 14px 45px;
            }
            
            .input-icon {
                left: 15px;
            }
            
            button {
                padding: 15px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2><i class="fas fa-heartbeat"></i> Modifier mes indicateurs de santé</h2>
        </div>
        
        <div class="form-container">
           
            
            <form method="POST" action="{{ route('health.update') }}">
                @csrf
                
                <!-- Tension artérielle -->
                <div class="form-group">
                    <label>
                        <i class="fas fa-heart-pulse"></i>
                        Tension artérielle
                    </label>
                    <div class="input-container">
                        <i class="fas fa-tachometer-alt input-icon"></i>
                        <input type="text" name="tension_arterielle" value="120/80" placeholder="Ex: 120/80">
                    </div>
                    <!-- Message d'erreur -->
                    
                </div>
                
                <!-- Fréquence cardiaque -->
                <div class="form-group">
                    <label>
                        <i class="fas fa-heart"></i>
                        Fréquence cardiaque (bpm)
                    </label>
                    <div class="input-container">
                        <i class="fas fa-heartbeat input-icon"></i>
                        <input type="number" name="frequence_cardiaque" value="72">
                    </div>
                </div>
                
                <!-- Glycémie -->
                <div class="form-group">
                    <label>
                        <i class="fas fa-prescription-bottle"></i>
                        Glycémie (g/L)
                    </label>
                    <div class="input-container">
                        <i class="fas fa-vial input-icon"></i>
                        <input type="number" step="0.1" name="glycemie" value="1.2">
                    </div>
                </div>
                
                <!-- IMC -->
                <div class="form-group">
                    <label>
                        <i class="fas fa-weight-scale"></i>
                        IMC
                    </label>
                    <div class="input-container">
                        <i class="fas fa-calculator input-icon"></i>
                        <input type="number" step="0.1" name="imc" value="23.5">
                    </div>
                </div>
                
                <button type="submit">
                    <i class="fas fa-save"></i> Enregistrer les modifications
                </button>
                
                <div class="info-note">
                    <i class="fas fa-info-circle"></i>
                    <div>
                        <strong>Conseil :</strong> Pour des mesures précises, prenez votre tension artérielle après 5 minutes de repos, 
                        assis dans un environnement calme. Les mesures doivent être effectuées dans les mêmes conditions chaque fois.
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Animation pour afficher les messages d'erreur quand ils sont nécessaires
        document.addEventListener('DOMContentLoaded', function() {
            // Simulation de succès/erreur
            setTimeout(() => {
                document.querySelector('.alert').style.display = 'none';
            }, 5000);
            
            // Ajout d'effet de focus sur les champs
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.01)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });
        });
    </script>
</body>
</html>