<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe | Clinique Médicale</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e0f7fa 0%, #f5f5f5 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .medical-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 105, 148, 0.15);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
            position: relative;
        }

        .medical-header {
            background: linear-gradient(135deg, #0288d1 0%, #005b9f 100%);
            color: white;
            padding: 25px 30px;
            text-align: center;
            position: relative;
        }

        .medical-header h1 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .medical-header p {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .medical-icon {
            background-color: white;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: -35px auto 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 2;
        }

        .medical-icon i {
            font-size: 32px;
            color: #0288d1;
        }

        .form-container {
            padding: 30px;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #0288d1;
            font-size: 18px;
        }

        .input-group input {
            width: 100%;
            padding: 15px 15px 15px 50px;
            border: 2px solid #e0f7fa;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #f8fdff;
            color: #005b9f;
        }

        .input-group input:focus {
            outline: none;
            border-color: #0288d1;
            box-shadow: 0 0 0 3px rgba(2, 136, 209, 0.2);
        }

        .input-group input::placeholder {
            color: #90a4ae;
        }

        button[type="submit"] {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #00c853 0%, #009624 100%);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            box-shadow: 0 4px 15px rgba(0, 200, 83, 0.3);
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 200, 83, 0.4);
            background: linear-gradient(135deg, #00e676 0%, #00b248 100%);
        }

        .password-info {
            background-color: #e8f5e9;
            border-left: 4px solid #4caf50;
            padding: 12px 15px;
            margin-top: 25px;
            border-radius: 0 8px 8px 0;
            font-size: 14px;
            color: #2e7d32;
        }

        .password-info ul {
            padding-left: 20px;
            margin-top: 5px;
        }

        .password-info li {
            margin-bottom: 3px;
        }

        .medical-footer {
            text-align: center;
            padding: 20px;
            background-color: #f1f8ff;
            color: #0288d1;
            font-size: 14px;
            border-top: 1px solid #e0f7fa;
        }

        .medical-footer a {
            color: #005b9f;
            text-decoration: none;
            font-weight: 600;
        }

        .medical-footer a:hover {
            text-decoration: underline;
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-container {
            animation: fadeIn 0.6s ease-out;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .medical-container {
                max-width: 100%;
            }
            
            .form-container {
                padding: 20px;
            }
            
            .medical-header {
                padding: 20px;
            }
            
            .medical-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="medical-container">
        <div class="medical-header">
            <h1>Réinitialisation du mot de passe</h1>
            <p>Entrez vos informations pour définir un nouveau mot de passe</p>
        </div><br>
        
        <div class="medical-icon">
            <i class="fas fa-lock"></i>
        </div>
        
        <form action="{{ route('password.reset.direct') }}" method="POST" class="form-container">
            @csrf
            
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Adresse email" required>
            </div>
            
            <div class="input-group">
                <i class="fas fa-key"></i>
                <input type="text" name="secret_code" placeholder="Code secret" required>
            </div>
            
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="new_password" placeholder="Nouveau mot de passe" required>
            </div>
            
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="new_password_confirmation" placeholder="Confirmer le nouveau mot de passe" required>
            </div>
            
            <button type="submit">Réinitialiser le mot de passe</button>
            
            <div class="password-info">
                <strong>Votre mot de passe doit contenir :</strong>
                <ul>
                    <li>Au moins 8 caractères</li>
                    <li>Une lettre majuscule et une minuscule</li>
                    <li>Un chiffre et un caractère spécial</li>
                </ul>
            </div>
        </form>
        
        <div class="medical-footer">
            <p>Besoin d'aide ? <a href="#">Contactez notre support</a></p>
            <p>© 2023 Clinique Médicale - Tous droits réservés</p>
        </div>
    </div>

    <script>
        // Animation au focus sur les champs
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>