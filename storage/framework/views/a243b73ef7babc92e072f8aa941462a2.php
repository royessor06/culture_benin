<!DOCTYPE html>
<html lang="fr" x-data="{ showPassword: false, isLoading: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion – Culture Bénin</title>

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
            --shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
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
                radial-gradient(circle at 20% 80%, rgba(212, 175, 55, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 135, 81, 0.1) 0%, transparent 50%);
            z-index: -1;
        }

        /* Decorative Elements */
        .decorative {
            position: absolute;
            z-index: -1;
        }

        .decorative-1 {
            top: 10%;
            left: 10%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, var(--primary) 0%, transparent 70%);
            opacity: 0.05;
            border-radius: 50%;
        }

        .decorative-2 {
            bottom: 10%;
            right: 10%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, var(--secondary) 0%, transparent 70%);
            opacity: 0.05;
            border-radius: 50%;
        }

        /* Login Container */
        .login-container {
            width: 100%;
            max-width: 480px;
            animation: fadeInUp 0.8s ease-out;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
        }

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
        }

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

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-wrapper input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
        }

        .forgot-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .forgot-link:hover {
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
            opacity: 0.7;
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

        /* Social Login */
        .social-login {
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

        /* Footer */
        .card-footer {
            text-align: center;
            padding: 1.5rem 2.5rem;
            background: #f9fafb;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 0.9rem;
        }

        .register-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            margin-left: 0.5rem;
            transition: var(--transition);
        }

        .register-link:hover {
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

        .success-message {
            background: rgba(22, 163, 74, 0.1);
            color: var(--success);
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
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

            .social-login {
                grid-template-columns: 1fr;
            }

            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }

        @media (max-width: 480px) {
            .card-header,
            .card-body,
            .card-footer {
                padding: 1.5rem;
            }

            .logo-text {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Decorative Elements -->
    <div class="decorative decorative-1"></div>
    <div class="decorative decorative-2"></div>

    <div class="login-container">
        <div class="login-card">
            <div class="card-header">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <div class="logo-text">Culture Bénin</div>
                </div>
                <h1>Bienvenue</h1>
                <p>Connectez-vous pour accéder à votre espace</p>
            </div>

            <div class="card-body">
                <!-- Error/Success Messages -->
                <?php if(session('error')): ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                <?php if(session('success')): ?>
                    <div class="success-message">
                        <i class="fas fa-check-circle"></i>
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('login.store')); ?>" @submit="isLoading = true">
                    <?php echo csrf_field(); ?>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label class="form-label">Adresse email</label>
                        <div class="input-wrapper">
                            <input
                                type="email"
                                name="email"
                                placeholder="votre@email.com"
                                class="form-input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('email')); ?>"
                                required
                                autofocus
                            >
                            <span class="input-icon">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style="color: var(--error);
                                        font-size: 0.85rem;
                                        margin-top: 0.25rem;
                                        display: block;">
                                <?php echo e($message); ?>

                            </small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label class="form-label">Mot de passe</label>
                        <div class="input-wrapper">
                            <input
                                :type="showPassword ? 'text' : 'password'"
                                name="mot_de_passe"
                                placeholder="Votre mot de passe"
                                class="form-input <?php $__errorArgs = ['mot_de_passe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                required
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
                        <?php $__errorArgs = ['mot_de_passe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style="color: var(--error); font-size: 0.85rem; margin-top: 0.25rem; display: block;">
                                <?php echo e($message); ?>

                            </small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="remember-forgot">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" name="remember">
                            <span>Se souvenir de moi</span>
                        </label>
                        <a href="<?php echo e(route('password.request')); ?>" class="forgot-link">
                            Mot de passe oublié ?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="submit-btn"
                        :disabled="isLoading"
                    >
                        <template x-if="!isLoading">
                            <span>
                                <i class="fas fa-sign-in-alt"></i>
                                Se connecter
                            </span>
                        </template>
                        <template x-if="isLoading">
                            <span>
                                <div class="spinner"></div>
                                Connexion...
                            </span>
                        </template>
                    </button>
                </form>

                <!-- Divider -->
                <div class="divider">
                    <span>Ou continuer avec</span>
                </div>

                <!-- Social Login -->
                <div class="social-login">
                    <button type="button" class="social-btn google">
                        <i class="fab fa-google"></i>
                        Google
                    </button>
                    <button type="button" class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i>
                        Facebook
                    </button>
                </div>

                <!-- Demo Account Info -->
                <div style="background: rgba(212, 175, 55, 0.1); padding: 1rem; border-radius: 10px; margin-top: 1.5rem; font-size: 0.9rem;">
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                        <i class="fas fa-lightbulb" style="color: var(--primary);"></i>
                        <strong>Compte de démonstration :</strong>
                    </div>
                    <div style="color: #6b7280;">
                        Email : <code> maurice.comlan@uac.bj</code><br>
                        Mot de passe : <code> Eneam123</code>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                Nouveau sur Culture Bénin ?
                <a href="<?php echo e(route('register')); ?>" class="register-link">
                    Créer un compte
                </a>
            </div>
        </div>
    </div>

    <script>
        // Auto-hide success/error messages after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const messages = document.querySelectorAll('.error-message, .success-message');
            messages.forEach(message => {
                setTimeout(() => {
                    message.style.transition = 'opacity 0.5s';
                    message.style.opacity = '0';
                    setTimeout(() => message.remove(), 500);
                }, 5000);
            });

            // Form auto-focus on first error field
            const errorField = document.querySelector('.form-input.error');
            if (errorField) {
                errorField.focus();
            }

            // Smooth form submission
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('.submit-btn');
                submitBtn.disabled = true;

                // Add pulse animation
                submitBtn.style.animation = 'pulse 1s infinite';
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\culture\resources\views\login.blade.php ENDPATH**/ ?>