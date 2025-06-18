<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Ordonnances - MediConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        :root {
            --primary-color: #1a6fc4;
            --secondary-color: #2e8b57;
            --accent-color: #4fc3f7;
            --light-bg: #f0f9ff;
            --card-shadow: 0 8px 20px rgba(26, 111, 196, 0.12);
            --gold-accent: #d4af37;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f8fdff 0%, #e6f4ff 100%);
            min-height: 100vh;
            color: #333;
            padding: 20px;
        }
        
        .prescription-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: var(--primary-color);
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        
        .header-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: var(--secondary-color);
            border-radius: 2px;
        }
        
        .no-prescription-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 40px 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .no-prescription-card:hover {
            transform: translateY(-5px);
        }
        
        .no-prescription-icon {
            font-size: 4rem;
            color: var(--accent-color);
            margin-bottom: 20px;
            animation: pulse 2s infinite;
        }
        
        .prescription-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
            gap: 30px;
        }
        
        @media (max-width: 768px) {
            .prescription-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .prescription-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            border-left: 5px solid var(--primary-color);
            animation: fadeIn 0.6s ease forwards;
            opacity: 0;
            position: relative;
        }
        
        .prescription-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(26, 111, 196, 0.2);
        }
        
        .prescription-header {
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--accent-color) 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .medication-name {
            font-size: 1.4rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .prescription-date {
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 500;
        }
        
        .prescription-body {
            padding: 25px;
        }
        
        .doctor-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .doctor-icon {
            width: 50px;
            height: 50px;
            background: var(--light-bg);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1.2rem;
        }
        
        .prescription-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .detail-item {
            background: var(--light-bg);
            padding: 15px;
            border-radius: 8px;
        }
        
        .detail-label {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 5px;
            display: block;
        }
        
        .detail-value {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 1.1rem;
        }
        
        .notes-section {
            background: #fff8e1;
            border-left: 3px solid #ffc107;
            padding: 15px;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
        }
        
        .signature-section {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px dashed #ddd;
            text-align: center;
        }
        
        .signature-label {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 10px;
            display: block;
        }
        
        .signature-img {
            max-width: 220px;
            height: auto;
            border: 1px solid #eee;
            border-radius: 4px;
            padding: 10px;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        
        .prescription-footer {
            padding: 15px 25px;
            background: #f9fbfd;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            border-top: 1px solid #f0f0f0;
        }
        
        .btn-prescription {
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            position: relative;
            overflow: hidden;
            font-size: 1.05rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .btn-prescription:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .btn-prescription:hover:before {
            opacity: 1;
        }
        
        .btn-prescription i {
            transition: transform 0.3s ease;
        }
        
        .btn-prescription:hover i {
            transform: scale(1.15);
        }
        
        .btn-print {
            background: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }
        
        .btn-print:hover {
            background: var(--primary-color);
            color: white;
        }
        
        .btn-download {
            background: var(--secondary-color);
            color: white;
            border: 1px solid var(--secondary-color);
        }
        
        .btn-download:hover {
            background: #237347;
        }
        
        /* Overlay de chargement */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .loading-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 5px solid rgba(26, 111, 196, 0.2);
            border-top: 5px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }
        
        .loading-text {
            font-size: 1.2rem;
            color: var(--primary-color);
            font-weight: 500;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .prescription-card:nth-child(1) { animation-delay: 0.1s; }
        .prescription-card:nth-child(2) { animation-delay: 0.2s; }
        .prescription-card:nth-child(3) { animation-delay: 0.3s; }
        .prescription-card:nth-child(4) { animation-delay: 0.4s; }
        
        /* Styles d'impression */
        @media print {
            body {
                background: white !important;
                color: black !important;
                padding: 20px !important;
                font-size: 14px !important;
            }
            
            .prescription-card {
                box-shadow: none !important;
                border: 1px solid #ddd !important;
                border-radius: 10px !important;
                margin: 0 0 20px 0 !important;
                break-inside: avoid;
                page-break-inside: avoid;
            }
            
            .prescription-header {
                background: #f0f7ff !important;
                color: #333 !important;
                border-bottom: 2px solid #ddd;
            }
            
            .btn-prescription, .prescription-footer, .no-print {
                display: none !important;
            }
            
            .signature-img {
                max-width: 180px !important;
            }
            
            .notes-section {
                background: #fffdf5 !important;
                border: 1px solid #eee !important;
            }
        }
    </style>
</head>
<body>
    <!-- Overlay de chargement -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
        <div class="loading-text">Préparation de votre document...</div>
    </div>

    <div class="prescription-container">
        <h1 class="header-title">
            <i class="fas fa-file-prescription me-2"></i>Mes ordonnances
        </h1>
        
        <div class="content-section">
            <!-- Structure Blade adaptée au nouveau design -->
            @if($prescriptions->isEmpty())
                <div class="no-prescription-card">
                    <div class="no-prescription-icon">
                        <i class="fas fa-file-medical"></i>
                    </div>
                    <h3 class="fw-bold text-primary mb-3">Aucune ordonnance disponible</h3>
                    <p class="text-muted mb-4">Vos ordonnances apparaîtront ici après vos consultations médicales.</p>
                </div>
            @else
                <div class="prescription-grid">
                    @foreach($prescriptions as $prescription)
                    <div class="prescription-card" id="prescription-{{ $prescription->id }}">
                        <div class="prescription-header">
                            <div class="medication-name">
                                <i class="fas fa-pills"></i>
                                {{ $prescription->medication_name }}
                            </div>
                            <div class="prescription-date">
                                <i class="fas fa-calendar me-1"></i>{{ $prescription->created_at->format('d/m/Y') }}
                            </div>
                        </div>
                        
                        <div class="prescription-body">
                            <div class="doctor-info">
                                <div class="doctor-icon">
                                    <i class="fas fa-user-md"></i>
                                </div>
                                <div>
                                    <div class="detail-label">Docteur</div>
                                    <div class="detail-value">{{ $prescription->doctor->name }}</div>
                                </div>
                            </div>
                            
                            <div class="prescription-details">
                                <div class="detail-item">
                                    <span class="detail-label">Dosage</span>
                                    <span class="detail-value">{{ $prescription->dosage }} mg</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Fréquence</span>
                                    <span class="detail-value">{{ $prescription->frequency }} fois/jour</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Durée</span>
                                    <span class="detail-value">{{ $prescription->duration }} </span>
                                </div>
                            </div>
                            
                            @if($prescription->notes)
                            <div class="notes-section">
                                <span class="detail-label">Instructions spéciales</span>
                                <p>{{ $prescription->notes }}</p>
                            </div>
                            @endif
                            
                            @if($prescription->signature_path)
                            <div class="signature-section">
                                <span class="signature-label">Signature du docteur</span>
                                <img src="{{ asset('storage/' . $prescription->signature_path) }}" 
                                    alt="Signature médicale" 
                                    class="signature-img">
                            </div>
                            @endif
                        </div>
                        
                        <div class="prescription-footer">
                            <button class="btn-prescription btn-print" onclick="printPrescription('{{ $prescription->id }}')">
                                <i class="fas fa-print"></i> Imprimer
                            </button>
                            <button class="btn-prescription btn-download" onclick="downloadPrescription('{{ $prescription->id }}')">
                                <i class="fas fa-download"></i> Télécharger PDF
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <script>
        // Initialisation des animations avec GSAP
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des cartes d'ordonnances
            const prescriptionCards = document.querySelectorAll('.prescription-card');
            if (prescriptionCards.length > 0) {
                prescriptionCards.forEach((card, index) => {
                    gsap.from(card, {
                        opacity: 0,
                        y: 30,
                        duration: 0.6,
                        delay: index * 0.15,
                        ease: "power2.out"
                    });
                });
                
                // Animation au survol des cartes
                prescriptionCards.forEach(card => {
                    card.addEventListener('mouseenter', () => {
                        gsap.to(card, {
                            y: -10,
                            duration: 0.3,
                            ease: "power2.out"
                        });
                    });
                    
                    card.addEventListener('mouseleave', () => {
                        gsap.to(card, {
                            y: 0,
                            duration: 0.3,
                            ease: "power2.out"
                        });
                    });
                });
            }
            
            // Animation des boutons
            const buttons = document.querySelectorAll('.btn-prescription');
            buttons.forEach(btn => {
                btn.addEventListener('mouseenter', () => {
                    gsap.to(btn, {
                        scale: 1.05,
                        duration: 0.2,
                        ease: "power2.out"
                    });
                });
                
                btn.addEventListener('mouseleave', () => {
                    gsap.to(btn, {
                        scale: 1,
                        duration: 0.2,
                        ease: "power2.out"
                    });
                });
            });
        });
        
        // Fonction d'impression premium
        function printPrescription(id) {
            const element = document.getElementById('prescription-' + id);
            const loadingOverlay = document.getElementById('loadingOverlay');
            
            // Afficher l'overlay de chargement
            loadingOverlay.classList.add('active');
            
            setTimeout(() => {
                const printWindow = window.open('', '_blank');
                const appStylesheet = "{{ asset('css/app.css') }}";
                
                printWindow.document.write(`
                    <html>
                    <head>
                        <title>Ordonnance Médicale #${id}</title>
                        <link rel="stylesheet" href="${appStylesheet}">
                        <style>
                            body {
                                font-family: 'Montserrat', sans-serif;
                                padding: 40px;
                                background: white;
                                color: #333;
                            }
                            .prescription-card {
                                width: 100%;
                                max-width: 800px;
                                margin: 0 auto;
                                border: 1px solid #e0e0e0;
                                border-radius: 15px;
                                padding: 30px;
                                box-shadow: 0 8px 25px rgba(0,0,0,0.05);
                                position: relative;
                                background: white;
                            }
                            .prescription-header {
                                background: linear-gradient(90deg, #1a6fc4 0%, #4fc3f7 100%);
                                color: white;
                                padding: 20px;
                                border-radius: 12px 12px 0 0;
                                margin: -30px -30px 30px -30px;
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                            }
                            .medication-name {
                                font-size: 1.6rem;
                                font-weight: bold;
                            }
                            .prescription-date {
                                font-size: 1.1rem;
                                background: rgba(255,255,255,0.25);
                                padding: 8px 18px;
                                border-radius: 30px;
                            }
                            .doctor-info {
                                display: flex;
                                align-items: center;
                                margin-bottom: 25px;
                                padding-bottom: 25px;
                                border-bottom: 1px solid #f0f4f8;
                            }
                            .doctor-name {
                                font-size: 1.3rem;
                                font-weight: bold;
                            }
                            .prescription-details {
                                display: grid;
                                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                                gap: 20px;
                                margin-bottom: 30px;
                            }
                            .detail-item {
                                padding: 18px;
                                border-left: 3px solid #1a6fc4;
                                background: #f8fdff;
                                border-radius: 10px;
                            }
                            .detail-label {
                                font-size: 0.95rem;
                                color: #666;
                                margin-bottom: 8px;
                                font-weight: 500;
                            }
                            .detail-value {
                                font-weight: bold;
                                font-size: 1.15rem;
                                color: #1a6fc4;
                            }
                            .notes-section {
                                background: #fffcf0;
                                padding: 20px;
                                border-left: 4px solid #d4af37;
                                border-radius: 0 12px 12px 0;
                                margin: 25px 0;
                            }
                            .signature-section {
                                text-align: center;
                                margin-top: 30px;
                                padding-top: 25px;
                                border-top: 1px dashed #d1e0f0;
                            }
                            .signature-img {
                                max-width: 220px;
                                height: auto;
                                border: 1px solid #e2edf7;
                                border-radius: 6px;
                                padding: 12px;
                                background: white;
                            }
                            .btn-prescription, .prescription-footer {
                                display: none;
                            }
                            .watermark {
                                position: absolute;
                                bottom: 20px;
                                right: 20px;
                                opacity: 0.1;
                                font-size: 5rem;
                                color: #1a6fc4;
                                transform: rotate(-15deg);
                                pointer-events: none;
                            }
                            @media print {
                                body {
                                    padding: 15px !important;
                                }
                                .prescription-card {
                                    box-shadow: none !important;
                                    border: 1px solid #ddd !important;
                                    page-break-inside: avoid;
                                }
                            }
                        </style>
                    </head>
                    <body>
                        <div class="prescription-card">
                            ${element.innerHTML}
                            <div class="watermark">MediConnect</div>
                        </div>
                        <script>
                            window.onload = function() {
                                window.print();
                                setTimeout(function() {
                                    window.close();
                                }, 500);
                            };
                        <\/script>
                    </body>
                    </html>
                `);
                
                printWindow.document.close();
                loadingOverlay.classList.remove('active');
            }, 500);
        }
        
        // Fonction de téléchargement PDF premium
        function downloadPrescription(id) {
            const element = document.getElementById('prescription-' + id);
            const loadingOverlay = document.getElementById('loadingOverlay');
            
            // Afficher l'overlay de chargement
            loadingOverlay.classList.add('active');
            
            // Options pour le PDF
            const opt = {
                margin: 15,
                filename: `ordonnance_${id}.pdf`,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2, useCORS: true, logging: true },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
                pagebreak: { mode: 'avoid-all' }
            };
            
            setTimeout(() => {
                // Créer un clone de l'élément pour la conversion PDF
                const clone = element.cloneNode(true);
                
                // Ajouter un filigrane
                const watermark = document.createElement('div');
                watermark.innerHTML = 'MediConnect';
                watermark.style.position = 'absolute';
                watermark.style.bottom = '20px';
                watermark.style.right = '20px';
                watermark.style.opacity = '0.05';
                watermark.style.fontSize = '5rem';
                watermark.style.color = '#1a6fc4';
                watermark.style.transform = 'rotate(-15deg)';
                watermark.style.pointerEvents = 'none';
                watermark.style.zIndex = '100';
                clone.appendChild(watermark);
                
                // Créer un conteneur pour le PDF
                const pdfContainer = document.createElement('div');
                pdfContainer.style.padding = '30px';
                pdfContainer.style.maxWidth = '800px';
                pdfContainer.style.margin = '0 auto';
                pdfContainer.appendChild(clone);
                
                // Générer le PDF
                html2pdf().set(opt).from(pdfContainer).save().then(() => {
                    loadingOverlay.classList.remove('active');
                });
            }, 500);
        }
    </script>
</body>
</html>