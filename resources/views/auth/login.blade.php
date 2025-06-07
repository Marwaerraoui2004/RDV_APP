<x-guest-layout>
    <div class="container">
        <div class="logo">
            <i class="fas fa-heartbeat"></i>
            <span>Medi<span style="font-weight: 300; color: var(--accent);">Connect</span></span>
        </div>
        
        <div class="content-container">
            <!-- Section d'image -->
            <div class="image-section login-image">
                <div class="image-content">
                    <h1>L'excellence médicale à votre service</h1>
                    <p>Prenez rendez-vous avec les meilleurs spécialistes en quelques clics seulement</p>
                    
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-calendar-check"></i>
                            <div class="feature-text">
                                <h3>Prise de RDV simplifiée</h3>
                                <p>Disponibilité en temps réel</p>
                            </div>
                        </div>
                        <div class="feature">
                            <i class="fas fa-user-md"></i>
                            <div class="feature-text">
                                <h3>Professionnels qualifiés</h3>
                                <p>Médecins vérifiés et expérimentés</p>
                            </div>
                        </div>
                        <div class="feature">
                            <i class="fas fa-clock"></i>
                            <div class="feature-text">
                                <h3>Gain de temps</h3>
                                <p>Recherche rapide par spécialité</p>
                            </div>
                        </div>
                        <div class="feature">
                            <i class="fas fa-shield-alt"></i>
                            <div class="feature-text">
                                <h3>Sécurité des données</h3>
                                <p>Informations médicales protégées</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Section des formulaires -->
            <div class="form-section">
                <div class="form-container">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="form-header">
                            <h1>Connexion</h1>
                            <p>Accédez à votre espace sécurisé</p>
                        </div>

                        

                        <!-- Sélecteur de rôle -->
                        <div class="role-selector" id="login-role-selector">
                            <div class="role-btn active" data-role="patient">
                                <i class="fas fa-user-injured"></i>
                                Patient
                            </div>
                            <div class="role-btn" data-role="doctor">
                                <i class="fas fa-user-md"></i>
                                Médecin
                            </div>
                        </div>
                        
                        @if(session('error'))
                            <div class="alert alert-danger" style="color: red; margin-bottom: 20px;">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input id="email" type="email" name="email" placeholder="Adresse email" required autofocus value="{{ old('email') }}">
                        </div>

                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input id="password" type="password" name="password" placeholder="Mot de passe" required autocomplete="current-password">
                        </div>

                        <div class="remember-forgot">
                            <div class="remember">
                                <input id="remember_me" type="checkbox" name="remember">
                                <label for="remember_me">Se souvenir de moi</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot">Mot de passe oublié ?</a>
                            @endif
                        </div>

                        <button type="submit" class="login-btn">Se connecter</button>

                        <div class="divider">ou continuer avec</div>

                        <a href="{{ route('google.login') }}">
                            <button type="button" class="google-btn">
                                <i class="fab fa-google"></i>
                                Se connecter avec Google
                            </button>
                        </a>

                        <div class="signup-link">
                            Vous n'avez pas de compte ? 
                            <a href="{{ route('register') }}">Créer un compte</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>