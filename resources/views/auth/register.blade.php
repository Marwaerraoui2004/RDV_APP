<x-guest-layout>
    <div class="container">
        <div class="logo">
            <i class="fas fa-heartbeat"></i>
            <span>Medi<span style="font-weight: 300; color: var(--accent);">Connect</span></span>
        </div>
        
        <div class="content-container">
            <!-- Section d'image -->
            <div class="image-section register-image">
                <div class="image-content">
                    <h1>Rejoignez notre communauté médicale</h1>
                    <p>Accédez à tous les avantages en créant votre compte</p>
                    
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-comments"></i>
                            <div class="feature-text">
                                <h3>Communication simplifiée</h3>
                                <p>Messagerie sécurisée avec les médecins</p>
                            </div>
                        </div>
                        <div class="feature">
                            <i class="fas fa-bell"></i>
                            <div class="feature-text">
                                <h3>Rappels automatiques</h3>
                                <p>Notifications pour vos rendez-vous</p>
                            </div>
                        </div>
                        <div class="feature">
                            <i class="fas fa-file-medical"></i>
                            <div class="feature-text">
                                <h3>Dossier médical</h3>
                                <p>Accès à vos documents en ligne</p>
                            </div>
                        </div>
                        <div class="feature">
                            <i class="fas fa-star"></i>
                            <div class="feature-text">
                                <h3>Évaluations</h3>
                                <p>Partagez votre expérience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Section des formulaires -->
            <div class="form-section">
                <div class="form-container">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <a href="{{ route('login') }}" class="back-to-login">
                            <i class="fas fa-arrow-left"></i> Retour à la connexion
                        </a>
                        
                        <div class="form-header">
                            <h1>Créer un compte</h1>
                            <p>Rejoignez notre communauté médicale</p>
                        </div>
                        
                        <!-- Sélecteur de rôle -->
                        <div class="role-selector" id="register-role-selector">
                            <div class="role-btn active" data-role="patient">
                                <i class="fas fa-user-injured"></i>
                                Patient
                            </div>
                            <div class="role-btn" data-role="doctor">
                                <i class="fas fa-user-md"></i>
                                Médecin
                            </div>
                        </div>
                        
                        <!-- Champ caché pour stocker le rôle -->
                        <input type="hidden" name="role" id="register-role-input" value="patient">
                        
                        <div class="input-group">
                            <i class="fas fa-user"></i>
                            <input id="name" type="text" name="name" placeholder="Nom complet" required autofocus value="{{ old('name') }}">
                        </div>
                        
                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input id="email" type="email" name="email" placeholder="Adresse email" required value="{{ old('email') }}">
                        </div>
                        
                        <div class="input-group">
                            <i class="fas fa-phone"></i>
                            <input id="phone" type="tel" name="phone" placeholder="Téléphone" required value="{{ old('phone') }}">
                        </div>
                        
                        <!-- Champs supplémentaires pour médecin -->
                        <div class="doctor-fields" id="doctor-fields">
                            <div class="doctor-title">
                                <i class="fas fa-stethoscope"></i>
                                <span>Informations professionnelles</span>
                            </div>
                            
                            <div class="grid-fields">
                                <div class="input-group">
                                    <i class="fas fa-id-card"></i>
                                    <input type="text" name="onmm" placeholder="Numéro ONMM" value="{{ old('onmm') }}">
                                </div>
                                
                                <div class="input-group">
                                    <i class="fas fa-graduation-cap"></i>
                                    <select name="specialty">
                                        <option value="" disabled selected>Spécialité médicale</option>
                                        <option value="cardiology">Cardiologie</option>
                                        <option value="ophthalmology">Ophtalmologie</option>
                                        <option value="endocrinology">Endocrinologie (Diabète)</option>
                                        <option value="neurology">Neurologie</option>
                                        <option value="dermatology">Dermatologie</option>
                                        <option value="pediatrics">Pédiatrie</option>
                                        <option value="orthopedics">Orthopédie</option>
                                        <option value="gastroenterology">Gastro-entérologie</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="input-group">
                                <i class="fas fa-map-marker-alt"></i>
                                <input type="text" name="address" placeholder="Adresse professionnelle" value="{{ old('address') }}">
                            </div>
                            
                            <div class="grid-fields">
                                <div class="input-group">
                                    <i class="fas fa-city"></i>
                                    <input type="text" name="city" placeholder="Ville" value="{{ old('city') }}">
                                </div>
                                
                                <div class="input-group">
                                    <i class="fas fa-map-pin"></i>
                                    <input type="text" name="postal_code" placeholder="Code postal" value="{{ old('postal_code') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input id="password" type="password" name="password" placeholder="Mot de passe" required autocomplete="new-password">
                        </div>
                        
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
                        </div>
                        
                        <div class="remember">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">J'accepte les <a href="#" style="color: var(--accent);">conditions d'utilisation</a> et la <a href="#" style="color: var(--accent);">politique de confidentialité</a></label>
                        </div>
                        
                        <button type="submit" class="login-btn">S'inscrire</button>
                        
                        <div class="divider">ou continuer avec</div>
                        
                        <button type="button" class="google-btn">
                            <i class="fab fa-google"></i>
                            S'inscrire avec Google
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>