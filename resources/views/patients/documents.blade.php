<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes documents médicaux</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
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
                        card: '0 4px 6px rgba(0, 0, 0, 0.05)',
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
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            min-height: 100vh;
            color: #2d3748;
        }

        .header {
            background: white;
            padding: 1.5rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid #e2e8f0;
        }

        .header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #3a86ff;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .empty-state {
            background: rgba(255, 246, 143, 0.3);
            border: 1px solid rgba(236, 201, 75, 0.3);
            border-radius: 12px;
            padding: 2rem;
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
            font-size: 3rem;
            color: #ecc94b;
            margin-bottom: 1.5rem;
        }

        .empty-state p {
            font-size: 1.2rem;
            color: #a17917;
        }

        .documents-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .search-box {
            position: relative;
            max-width: 300px;
        }

        .search-box input {
            padding: 0.7rem 1rem 0.7rem 40px;
            border: 2px solid rgba(0,0,0,0.05);
            border-radius: 50px;
            width: 100%;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            background: white;
        }

        .search-box input:focus {
            border-color: #3a86ff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(58, 134, 255, 0.15);
        }

        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #718096;
            font-size: 0.95rem;
        }

        .filter-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            background: white;
            border-radius: 50px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .filter-btn:hover, .filter-btn.active {
            background: #3a86ff;
            color: white;
            border-color: #3a86ff;
        }

        .documents-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }

        .document-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 1.25rem;
        }

        .document-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        .document-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: linear-gradient(135deg, #3a86ff, #8338ec);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            flex-shrink: 0;
        }

        .document-icon i {
            font-size: 1.8rem;
            color: white;
        }

        .document-info {
            flex: 1;
        }

        .document-info h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.25rem;
        }

        .document-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .document-meta p {
            font-size: 0.9rem;
            color: #718096;
            display: flex;
            align-items: center;
        }

        .document-meta i {
            margin-right: 0.5rem;
            color: #8338ec;
        }

        .document-action {
            padding: 0.6rem 1.25rem;
            background: #3a86ff;
            color: white;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .document-action:hover {
            background: #2667cc;
            transform: translateY(-2px);
        }

        .document-action i {
            font-size: 0.9rem;
        }

        .document-type {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .type-ordonnance {
            background: rgba(56, 182, 161, 0.12);
            color: #38b000;
        }

        .type-analyse {
            background: rgba(58, 134, 255, 0.12);
            color: #3a86ff;
        }

        .type-imagerie {
            background: rgba(236, 201, 75, 0.12);
            color: #ecc94b;
        }

        .type-compte-rendu {
            background: rgba(131, 56, 236, 0.12);
            color: #8338ec;
        }

        /* Animation */
        .document-card {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .document-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .document-card {
                flex-direction: column;
                text-align: center;
            }

            .document-icon {
                margin-right: 0;
                margin-bottom: 1.25rem;
            }

            .document-meta {
                justify-content: center;
            }

            .document-action {
                margin-top: 1.25rem;
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }
            
            .header {
                padding: 1.25rem 1.5rem;
            }
            
            .empty-state {
                padding: 1.5rem;
            }
            
            .documents-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .search-box {
                max-width: 100%;
            }
            
            .document-meta {
                flex-direction: column;
                gap: 0.5rem;
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
    
    <!-- Header -->
    
    <header class="header">
        <div style="margin-bottom: 1rem;">
            <a href="{{ route('patient.dashboard') }}" class="return-link">
                <i class="fas fa-arrow-left"></i> Retour au tableau de bord
            </a>
    </div>
        <h2>Mes documents médicaux</h2>
    </header>
    

    <!-- Main Content -->
    <div class="container">
        @if ($documents->isEmpty())
            <div class="empty-state">
                <i class="fas fa-file-medical"></i>
                <p>Vous n'avez encore ajouté aucun document médical.</p>
            </div>
        @else
            <div class="documents-header">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Rechercher un document...">
                </div>
                
                <div class="filter-buttons">
                    <div class="filter-btn active">Tous</div>
                    <div class="filter-btn">Ordonnances</div>
                    <div class="filter-btn">Analyses</div>
                    <div class="filter-btn">Imagerie</div>
                </div>
            </div>
            
            <div class="documents-list">
                @foreach ($documents as $doc)
                    @php
                        // Déterminer le type de document pour le badge
                        $docType = 'compte-rendu';
                        $docTypeLabel = 'Compte-rendu';
                        $docIcon = 'file-medical';
                        
                        if (strpos(strtolower($doc->title), 'ordonnance') !== false) {
                            $docType = 'ordonnance';
                            $docTypeLabel = 'Ordonnance';
                            $docIcon = 'prescription';
                        } elseif (strpos(strtolower($doc->title), 'analyse') !== false || strpos(strtolower($doc->title), 'labo') !== false) {
                            $docType = 'analyse';
                            $docTypeLabel = 'Analyse';
                            $docIcon = 'vial';
                        } elseif (strpos(strtolower($doc->title), 'radio') !== false || strpos(strtolower($doc->title), 'scanner') !== false || strpos(strtolower($doc->title), 'irm') !== false) {
                            $docType = 'imagerie';
                            $docTypeLabel = 'Imagerie';
                            $docIcon = 'x-ray';
                        }
                    @endphp
                
                    <div class="document-card">
                        <div class="document-icon">
                            <i class="fas fa-{{ $docIcon }}"></i>
                        </div>
                        
                        <div class="document-info">
                            <h3>{{ $doc->title ?? 'Document médical' }}</h3>
                            <span class="document-type type-{{ $docType }}">{{ $docTypeLabel }}</span>
                            
                            <div class="document-meta">
                                <p>
                                    <i class="fas fa-user-md"></i>
                                    <span>Dr. {{ $doc->doctor->name ?? 'Inconnu' }}</span>
                                </p>
                                <p>
                                    <i class="fas fa-calendar"></i>
                                    <span>{{ $doc->created_at->translatedFormat('d M Y à H:i') }}</span>
                                </p>
                            </div>
                        </div>
                        
                        <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank"
                           class="document-action">
                            <i class="fas fa-download"></i> Télécharger
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des cartes au chargement
            const documentCards = document.querySelectorAll('.document-card');
            
            documentCards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('visible');
                }, 150 * index);
            });
            
            // Filtrage des documents
            const filterButtons = document.querySelectorAll('.filter-btn');
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Ici vous ajouteriez la logique de filtrage
                    // Pour l'exemple, nous allons simplement simuler un effet
                    documentCards.forEach(card => {
                        card.style.display = 'flex';
                    });
                });
            });
            
            // Recherche de documents
            const searchInput = document.querySelector('.search-box input');
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                documentCards.forEach(card => {
                    const title = card.querySelector('h3').textContent.toLowerCase();
                    if (title.includes(searchTerm)) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>