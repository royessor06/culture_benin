<!DOCTYPE html>
<html lang="fr" x-data="registerForm">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription – Culture Bénin</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        :root {
            --primary: #d4af37;
            --primary-dark: #b8941f;
            --secondary: #008751;
            --dark: #1a1a1a;
            --light: #f8f5f0;
            --error: #dc2626;
            --success: #16a34a;
            --radius: 16px;
            --shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 10% 20%, rgba(212, 175, 55, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 90% 80%, rgba(0, 135, 81, 0.1) 0%, transparent 50%);
            z-index: -1;
        }

        /* Pattern Overlay */
        .pattern-overlay {
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4af37' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
            z-index: -1;
        }

        /* Register Container */
        .register-container {
            width: 100%;
            max-width: 520px;
            animation: slideInUp 0.8s ease-out;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(20px);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .register-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--secondary), var(--primary));
        }

        /* Card Header */
        .card-header {
            padding: 2.5rem 2.5rem 1.5rem;
            text-align: center;
            background: linear-gradient(135deg, var(--dark), #2d2d2d);
            color: white;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 1rem;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark);
            font-size: 1.2rem;
            font-weight: bold;
        }

        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 600;
            background: linear-gradient(to right, var(--primary), #ffdb70);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .card-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .card-header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            max-width: 400px;
            margin: 0 auto;
            line-height: 1.5;
        }

        /* Progress Steps */
        .progress-steps {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
        }

        .step {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }

        .step.active {
            background: var(--primary);
            transform: scale(1.2);
        }

        /* Card Body */
        .card-body {
            padding: 2.5rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            transition: var(--transition);
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }

        .form-input.error {
            border-color: var(--error);
        }

        .form-input.success {
            border-color: var(--success);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            transition: var(--transition);
        }

        .form-input:focus + .input-icon {
            color: var(--primary);
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            transition: var(--transition);
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        /* Password Strength Meter */
        .password-strength {
            margin-top: 0.5rem;
        }

        .strength-meter {
            height: 4px;
            background: #e5e7eb;
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 0.25rem;
        }

        .strength-fill {
            height: 100%;
            width: 0;
            border-radius: 2px;
            transition: var(--transition);
        }

        .strength-text {
            font-size: 0.8rem;
            color: #6b7280;
            display: flex;
            justify-content: space-between;
        }

        /* Terms & Conditions */
        .terms-group {
            margin: 2rem 0;
            padding: 1.5rem;
            background: #f9fafb;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .terms-wrapper {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .terms-wrapper input[type="checkbox"] {
            margin-top: 0.25rem;
            width: 20px;
            height: 20px;
            accent-color: var(--primary);
        }

        .terms-text {
            font-size: 0.9rem;
            color: #4b5563;
            line-height: 1.5;
        }

        .terms-text a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .terms-text a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--dark);
            border: none;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .submit-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.2);
        }

        .submit-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .spinner {
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            color: #9ca3af;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e5e7eb;
        }

        .divider span {
            padding: 0 1rem;
            font-size: 0.9rem;
        }

        /* Social Register */
        .social-register {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .social-btn {
            padding: 0.8rem;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .social-btn:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        .social-btn.google {
            color: #ea4335;
        }

        .social-btn.facebook {
            color: #1877f2;
        }

        /* Login Link */
        .login-link {
            text-align: center;
            color: #6b7280;
            font-size: 0.95rem;
            margin-top: 1.5rem;
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            margin-left: 0.5rem;
            transition: var(--transition);
        }

        .login-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Error Message */
        .error-message {
            background: rgba(220, 38, 38, 0.1);
            color: var(--error);
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            animation: shake 0.5s ease-in-out;
        }

        /* Password Requirements */
        .requirements {
            margin-top: 0.5rem;
            font-size: 0.8rem;
            color: #6b7280;
        }

        .requirement {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.25rem;
        }

        .requirement i {
            font-size: 0.7rem;
            color: #9ca3af;
        }

        .requirement.met i {
            color: var(--success);
        }

        /* Animations */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        /* Responsive */
        @media (max-width: 640px) {
            .card-body {
                padding: 2rem;
            }

            .social-register {
                grid-template-columns: 1fr;
            }

            .register-card {
                margin: 1rem;
            }
        }

        @media (max-width: 480px) {
            .card-header,
            .card-body {
                padding: 1.5rem;
            }

            .logo-text {
                font-size: 1.5rem;
            }

            .terms-group {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="pattern-overlay"></div>

    <div class="register-container">
        <div class="register-card">
            <div class="card-header">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <div class="logo-text">Culture Bénin</div>
                </div>
                <h1>Rejoignez notre communauté</h1>
                <p>Créez votre compte pour contribuer à la préservation de notre patrimoine culturel</p>

                <div class="progress-steps">
                    <div class="step active"></div>
                    <div class="step"></div>
                    <div class="step"></div>
                </div>
            </div>

            <div class="card-body">
                <!-- Error Messages -->
                @if($errors->any())
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        Veuillez corriger les erreurs ci-dessous
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" @submit="isLoading = true" id="registerForm">
                    @csrf

                    <!-- Name Fields -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div class="form-group">
                            <label class="form-label">Nom</label>
                            <div class="input-wrapper">
                                <input
                                    type="text"
                                    name="nom"
                                    placeholder="Votre nom"
                                    class="form-input @error('nom') error @enderror"
                                    value="{{ old('nom') }}"
                                    required
                                    autofocus
                                >
                                <span class="input-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            @error('nom')
                                <small style="color: var(--error); font-size: 0.85rem; margin-top: 0.25rem; display: block;">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Prénom(s)</label>
                            <div class="input-wrapper">
                                <input
                                    type="text"
                                    name="prenom"
                                    placeholder="Votre prénom"
                                    class="form-input @error('prenom') error @enderror"
                                    value="{{ old('prenom') }}"
                                    required
                                >
                                <span class="input-icon">
                                    <i class="fas fa-user-circle"></i>
                                </span>
                            </div>
                            @error('prenom')
                                <small style="color: var(--error); font-size: 0.85rem; margin-top: 0.25rem; display: block;">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label class="form-label">Adresse email</label>
                        <div class="input-wrapper">
                            <input
                                type="email"
                                name="email"
                                placeholder="votre@email.com"
                                class="form-input @error('email') error @enderror"
                                value="{{ old('email') }}"
                                required
                            >
                            <span class="input-icon">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        @error('email')
                            <small style="color: var(--error); font-size: 0.85rem; margin-top: 0.25rem; display: block;">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label class="form-label">Mot de passe</label>
                        <div class="input-wrapper">
                            <input
                                :type="showPassword ? 'text' : 'password'"
                                name="mot_de_passe"
                                placeholder="Créez un mot de passe"
                                class="form-input @error('mot_de_passe') error @enderror"
                                required
                                x-model="password"
                                @input="checkPasswordStrength"
                            >
                            <span class="input-icon">
                                <i class="fas fa-lock"></i>
                            </span>
                            <button
                                type="button"
                                class="password-toggle"
                                @click="showPassword = !showPassword"
                            >
                                <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                            </button>
                        </div>

                        <!-- Password Strength Meter -->
                        <div class="password-strength" x-show="password.length > 0">
                            <div class="strength-meter">
                                <div class="strength-fill" :style="{
                                    width: passwordStrength + '%',
                                    backgroundColor: strengthColor
                                }"></div>
                            </div>
                            <div class="strength-text">
                                <span>Force du mot de passe :</span>
                                <span x-text="strengthText"></span>
                            </div>
                        </div>

                        <!-- Password Requirements -->
                        <div class="requirements">
                            <div class="requirement" :class="{ 'met': hasMinLength }">
                                <i :class="hasMinLength ? 'fas fa-check-circle' : 'fas fa-circle'"></i>
                                <span>Au moins 8 caractères</span>
                            </div>
                            <div class="requirement" :class="{ 'met': hasUppercase }">
                                <i :class="hasUppercase ? 'fas fa-check-circle' : 'fas fa-circle'"></i>
                                <span>Une majuscule</span>
                            </div>
                            <div class="requirement" :class="{ 'met': hasLowercase }">
                                <i :class="hasLowercase ? 'fas fa-check-circle' : 'fas fa-circle'"></i>
                                <span>Une minuscule</span>
                            </div>
                            <div class="requirement" :class="{ 'met': hasNumber }">
                                <i :class="hasNumber ? 'fas fa-check-circle' : 'fas fa-circle'"></i>
                                <span>Un chiffre</span>
                            </div>
                        </div>

                        @error('mot_de_passe')
                            <small style="color: var(--error); font-size: 0.85rem; margin-top: 0.25rem; display: block;">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label class="form-label">Confirmer le mot de passe</label>
                        <div class="input-wrapper">
                            <input
                                :type="showConfirmPassword ? 'text' : 'password'"
                                name="mot_de_passe_confirmation"
                                placeholder="Confirmez votre mot de passe"
                                class="form-input"
                                required
                                x-model="confirmPassword"
                                :class="{
                                    'success': passwordMatch && password.length > 0,
                                    'error': !passwordMatch && confirmPassword.length > 0
                                }"
                            >
                            <span class="input-icon">
                                <i class="fas fa-lock"></i>
                            </span>
                            <button
                                type="button"
                                class="password-toggle"
                                @click="showConfirmPassword = !showConfirmPassword"
                            >
                                <i :class="showConfirmPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                            </button>
                        </div>
                        <div x-show="!passwordMatch && confirmPassword.length > 0"
                             style="color: var(--error); font-size: 0.85rem; margin-top: 0.25rem;">
                            <i class="fas fa-times-circle"></i> Les mots de passe ne correspondent pas
                        </div>
                        <div x-show="passwordMatch && password.length > 0 && confirmPassword.length > 0"
                             style="color: var(--success); font-size: 0.85rem; margin-top: 0.25rem;">
                            <i class="fas fa-check-circle"></i> Les mots de passe correspondent
                        </div>
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="terms-group">
                        <div class="terms-wrapper">
                            <input
                                type="checkbox"
                                id="terms"
                                name="terms"
                                required
                                x-model="termsAccepted"
                            >
                            <label for="terms" class="terms-text">
                                J'accepte les <a href="#" target="_blank">Conditions d'utilisation</a>
                                et la <a href="#" target="_blank">Politique de confidentialité</a>.
                                Je comprends que mon compte sera utilisé pour contribuer à la plateforme Culture Bénin.
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="submit-btn"
                        :disabled="isLoading || !passwordMatch || password.length === 0"
                    >
                        <template x-if="!isLoading">
                            <span>
                                <i class="fas fa-user-plus"></i>
                                Créer mon compte
                            </span>
                        </template>
                        <template x-if="isLoading">
                            <span>
                                <div class="spinner"></div>
                                Création du compte...
                            </span>
                        </template>
                    </button>
                </form>

                <!-- Divider -->
                <div class="divider">
                    <span>Ou s'inscrire avec</span>
                </div>

                <!-- Social Register -->
                <div class="social-register">
                    <button type="button" class="social-btn google">
                        <i class="fab fa-google"></i>
                        Google
                    </button>
                    <button type="button" class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i>
                        Facebook
                    </button>
                </div>

                <!-- Login Link -->
                <div class="login-link">
                    Déjà un compte ?
                    <a href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('registerForm', () => ({
                password: '',
                confirmPassword: '',
                showPassword: false,
                showConfirmPassword: false,
                isLoading: false,
                termsAccepted: false,

                // Password strength
                passwordStrength: 0,
                strengthText: 'Faible',
                strengthColor: '#dc2626',

                // Password requirements
                hasMinLength: false,
                hasUppercase: false,
                hasLowercase: false,
                hasNumber: false,
                hasSpecial: false,

                // Computed properties
                get passwordMatch() {
                    return this.password === this.confirmPassword;
                },

                // Methods
                checkPasswordStrength() {
                    let strength = 0;

                    // Check length
                    if (this.password.length >= 8) {
                        strength += 25;
                        this.hasMinLength = true;
                    } else {
                        this.hasMinLength = false;
                    }

                    // Check uppercase
                    if (/[A-Z]/.test(this.password)) {
                        strength += 25;
                        this.hasUppercase = true;
                    } else {
                        this.hasUppercase = false;
                    }

                    // Check lowercase
                    if (/[a-z]/.test(this.password)) {
                        strength += 25;
                        this.hasLowercase = true;
                    } else {
                        this.hasLowercase = false;
                    }

                    // Check numbers
                    if (/[0-9]/.test(this.password)) {
                        strength += 25;
                        this.hasNumber = true;
                    } else {
                        this.hasNumber = false;
                    }

                    this.passwordStrength = strength;

                    // Update strength text and color
                    if (strength >= 75) {
                        this.strengthText = 'Fort';
                        this.strengthColor = '#16a34a';
                    } else if (strength >= 50) {
                        this.strengthText = 'Moyen';
                        this.strengthColor = '#f59e0b';
                    } else {
                        this.strengthText = 'Faible';
                        this.strengthColor = '#dc2626';
                    }
                }
            }));
        });

        // Form submission handling
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registerForm');

            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('.submit-btn');

                // Check if passwords match
                const password = this.querySelector('input[name="mot_de_passe"]').value;
                const confirmPassword = this.querySelector('input[name="mot_de_passe_confirmation"]').value;

                if (password !== confirmPassword) {
                    e.preventDefault();
                    alert('Les mots de passe ne correspondent pas.');
                    return;
                }

                // Check terms acceptance
                const termsChecked = this.querySelector('input[name="terms"]').checked;
                if (!termsChecked) {
                    e.preventDefault();
                    alert('Veuillez accepter les conditions d\'utilisation.');
                    return;
                }

                // If all good, show loading
                submitBtn.disabled = true;
                submitBtn.style.animation = 'pulse 1s infinite';
            });
        });
    </script>
</body>
</html>
