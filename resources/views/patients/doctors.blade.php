<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes médecins consultés</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            themea: {
                extend: {
                    colors: {
                        primary: '#3a86ff',
                        primaryDark: '#2667cc',
                        secondary: '#ff006e',
                        accent: '#8338ec',
                        light: '#f8f9fa',
                        dark: '#212529',
                        success: '#38b000',
                        warning: '#ecc94b',
                        danger: '#e53e3e',
                        textDark: '#2d3748',
                        textLight: '#718096',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    boxShadow: {
                        card: '0 10px 20px rgba(0,0,0,0.08)',
                    }
                }
            }
        }
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            color: #2d3748;
            line-height: 1.6;
            min-height: 100vh;
        }

        .header {
            background: white;
            padding: 1.5rem 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #3a86ff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .empty-state {
            background: rgba(255, 246, 143, 0.25);
            border: 1px solid rgba(236, 201, 75, 0.3);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
            transition: all 0.3s ease;
        }

        .empty-state:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(236, 201, 75, 0.15);
        }

        .empty-state i {
            font-size: 2.5rem;
            color: #ecc94b;
            margin-bottom: 1rem;
        }

        .empty-state p {
            font-size: 1.1rem;
            color: #a17917;
            margin-bottom: 1.5rem;
        }

        .doctors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .doctor-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background: linear-gradient(135deg, #3a86ff, #8338ec);
            padding: 1.25rem;
            color: white;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .doctor-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2667cc, #5a2dc2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            flex-shrink: 0;
        }

        .doctor-info {
            flex: 1;
        }

        .doctor-info h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .doctor-info p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .card-body {
            padding: 1.5rem;
            flex: 1;
        }

        .specialty {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: #718096;
        }

        .specialty i {
            color: #8338ec;
            margin-right: 0.5rem;
            font-size: 1.1rem;
        }

        .rating {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            color: #718096;
        }

        .rating i {
            color: #ecc94b;
            margin-right: 0.5rem;
            font-size: 1.1rem;
        }

        .rating-value {
            font-weight: 600;
            color: #ecc94b;
        }

        .action-btn {
            display: block;
            width: 100%;
            padding: 0.75rem;
            text-align: center;
            background: #3a86ff;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .action-btn:hover {
            background: #2667cc;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(58, 134, 255, 0.3);
        }

        .action-btn i {
            margin-right: 0.5rem;
        }

        /* Animation */
        .doctor-card {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .doctor-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .doctors-grid {
                grid-template-columns: 1fr;
            }
            
            .header {
                padding: 1.25rem 1.5rem;
            }
            
            .container {
                padding: 1.5rem 1rem;
            }
        }

        @media (max-width: 480px) {
            .card-header {
                flex-direction: column;
                text-align: center;
            }
            
            .doctor-avatar {
                margin-bottom: 1rem;
            }
        }
        .return-link {
                display: inline-flex;
                align-items: center;
                font-size: 14px;
                color: #2563eb; /* bleu */
                text-decoration: none;
                font-weight: 500;
                gap: 0.4rem;
                transition: color 0.2s;
            }

            .return-link:hover {
                color: #1e40af; /* bleu foncé */
            }
    </style>
</head>
<body>
    <x-app-layout>

    <!-- Header -->
    <header class="header">
        <div style="margin-bottom: 1rem;">
            <a href="{{ route('patient.dashboard') }}" class="return-link">
                <i class="fas fa-arrow-left"></i> Retour au tableau de bord
            </a>
        </div>
        <h2>Mes médecins consultés</h2>
    </header>

    <!-- Main Content -->
    <div class="container">
        @if ($doctors->isEmpty())
            <div class="empty-state">
                <i class="fas fa-user-md"></i>
                <p>Vous n'avez encore consulté aucun médecin.</p>
            </div>
        @else
            <div class="doctors-grid">
                @foreach ($doctors as $doctor)
                    <div class="doctor-card">
                        <div class="card-header">
                            <div class="doctor-avatar">
                                {{ strtoupper(substr($doctor->name, 0, 1)) }}{{ strtoupper(substr(Str::after($doctor->name, ' '), 0, 1)) }}
                            </div>
                            <div class="doctor-info">
                                <h3>Dr. {{ $doctor->name }}</h3>
                                <p>Médecin consulté</p>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="specialty">
                                <i class="fas fa-stethoscope"></i>
                                <span>Spécialité : {{ $doctor->specialty ?? 'Non renseignée' }}</span>
                            </div>
                            
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>Note moyenne : <span class="rating-value">{{ number_format($doctor->reviews_received_avg_rating ?? 0, 1) }}/5</span></span>
                            </div>
                            
                            <a href="{{ route('patient.appointments.create', ['doctor_id' => $doctor->id]) }}"
                               class="action-btn">
                                <i class="fas fa-calendar-plus"></i> Prendre un rendez-vous
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des cartes au chargement
            const doctorCards = document.querySelectorAll('.doctor-card');
            
            doctorCards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('visible');
                }, 150 * index);
            });
        });
    </script>
    </x-app-layout>

</body>
</html>