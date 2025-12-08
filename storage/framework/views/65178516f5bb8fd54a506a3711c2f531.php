<!doctype html>
<html lang="fr" x-data="{ darkMode: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard - Culture Bénin'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tableau de bord administrateur - Culture Bénin">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <link href="<?php echo e(asset('css/admin-tables.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body x-data="{ sidebarCollapsed: false, mobileMenuOpen: false, darkMode: localStorage.getItem('darkMode') === 'true' }"
      :class="{ 'sidebar-collapsed': sidebarCollapsed, 'sidebar-mobile-open': mobileMenuOpen, 'dark': darkMode }"
      x-init="$watch('darkMode', value => localStorage.setItem('darkMode', value))"
      class="page-transition">

<div class="app-wrapper">
    <!-- Sidebar -->
    <aside class="app-sidebar slide-in-left">
        <div class="sidebar-brand">
            <a href="<?php echo e(route('welcome')); ?>" class="brand-link">
                <div class="brand-logo">
                    <i class="fas fa-landmark"></i>
                </div>
                <span class="brand-text">Culture Bénin</span>
            </a>
        </div>

        <nav class="sidebar-nav">
            <!-- Dashboard -->
            <div class="nav-section">
                <div class="nav-title">Principal</div>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="<?php echo e(route('welcome')); ?>" class="nav-link <?php if(request()->routeIs('admin.dashboard')): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <span class="nav-text">Tableau de bord</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Gestion des contenus -->
            <div class="nav-section">
                <div class="nav-title">Contenus</div>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="<?php echo e(route('contenu.index')); ?>" class="nav-link <?php if(request()->routeIs('contenu.*')): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-palette"></i>
                            <span class="nav-text">Tous les contenus</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Gestion des données -->
            <div class="nav-section">
                <div class="nav-title">Données</div>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="<?php echo e(route('langue.index')); ?>" class="nav-link <?php if(request()->routeIs('langue.*')): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-language"></i>
                            <span class="nav-text">Langues</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('region.index')); ?>" class="nav-link <?php if(request()->routeIs('region.*')): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-map-marker-alt"></i>
                            <span class="nav-text">Régions</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Gestion des utilisateurs -->
            <div class="nav-section">
                <div class="nav-title">Utilisateurs</div>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="<?php echo e(route('administrateur.index')); ?>" class="nav-link <?php if(request()->routeIs('administrateur.*')): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-crown"></i>
                            <span>Administrateurs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('moderateur.index')); ?>" class="nav-link <?php if(request()->routeIs('moderateur.*')): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <span>Modérateurs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('contributeur.index')); ?>" class="nav-link <?php if(request()->routeIs('contributeur.*')): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-user-edit"></i>
                            <span>Contributeurs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('lecteur.index')); ?>" class="nav-link <?php if(request()->routeIs('lecteur.*')): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <span>Lecteurs</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Statistiques -->
            <div class="nav-section">
                <div class="nav-title">Analytiques</div>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-bar"></i>
                            <span class="nav-text">Statistiques</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <span class="nav-text">Rapports</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>

    <!-- Header -->
    <header class="app-header glass">
        <div class="header-left">
            <button class="toggle-sidebar" @click="sidebarCollapsed = !sidebarCollapsed">
                <i class="fas fa-bars"></i>
            </button>

            <h1 class="header-title"><?php echo $__env->yieldContent('page-title', 'Tableau de bord'); ?></h1>
        </div>

        <div class="header-right">
            <!-- Search -->
            <div class="header-action">
                <button class="header-btn" title="Recherche">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <!-- Notifications -->
            <div class="header-action">
                <button class="header-btn" title="Notifications">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
            </div>

            <!-- Dark Mode Toggle -->
            <div class="header-action">
                <label class="theme-switch">
                    <input type="checkbox" x-model="darkMode">
                    <span class="slider">
                        <span class="icon sun"><i class="fas fa-sun"></i></span>
                        <span class="icon moon"><i class="fas fa-moon"></i></span>
                    </span>
                </label>
            </div>

            <!-- User Menu -->
            <div class="user-menu">
                <button class="user-btn">
                    <img src="<?php echo e(asset('assets/img/image_new_admin.img')); ?>" alt="Admin" class="user-avatar">
                    <div class="user-info d-none d-md-block">
                        <div class="user-name"></div>
                        <div class="user-role">Administrateur</div>
                    </div>
                    <i class="fas fa-chevron-down ms-1"></i>
                </button>
                <div class="user-dropdown">
                    <a href="<?php echo e(route('profile.show')); ?>" class="dropdown-item">
                        <i class="dropdown-icon fas fa-user"></i>
                        <span>Mon profil</span>
                    </a>

                    <a href="<?php echo e(route('settings.index')); ?>" class="dropdown-item">
                        <i class="dropdown-icon fas fa-cog"></i>
                        <span>Paramètres</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="<?php echo e(route('help.index')); ?>" class="dropdown-item">
                        <i class="dropdown-icon fas fa-question-circle"></i>
                        <span>Aide & Support</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="dropdown-icon fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="app-main fade-in">
        <div class="content-container">
            <!-- Page Header (Bootstrap-like) -->
            <div class="app-content-header mb-4">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h3 class="mb-0 fw-bold text-gradient-primary"><?php echo $__env->yieldContent('page-title', 'Tableau de bord'); ?></h3>
                            <p class="mb-0 text-muted"><?php echo $__env->yieldContent('page-subtitle', 'Aperçu de vos performances'); ?></p>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex justify-content-sm-end gap-2">
                                <?php echo $__env->yieldContent('header-actions'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="app-content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer style="
        position: absolute;
        bottom: 0;
        left: var(--sidebar-width);
        right: 0;
        background: white;
        padding: 1rem;
        text-align: center;
        border-top: 1px solid #e5e7eb;
        z-index: 100;
    ">
        <div>
            <p style="margin: 0;">&copy; 2025 Culture Bénin. Tous droits réservés.</p>
            <p style="margin: 0.25rem 0 0 0; color: #6b7280; font-size: 0.9rem;">Version 2.0.0</p>
        </div>
    </footer>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Ajuster quand la sidebar change
    document.addEventListener('alpine:init', () => {
        Alpine.data('layout', () => ({
            sidebarCollapsed: false,
            updateFooter() {
                const footer = document.querySelector('footer');
                if (this.sidebarCollapsed) {
                    footer.style.left = 'var(--sidebar-collapsed)';
                } else {
                    footer.style.left = 'var(--sidebar-width)';
                }
            }
        }));
    });

    // Initialisation du dark mode
    document.addEventListener('DOMContentLoaded', function() {
        const darkMode = localStorage.getItem('darkMode') === 'true';

        // Applique le dark mode au chargement
        if (darkMode) {
            document.documentElement.classList.add('dark');
        }

        // Gestion du menu mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.app-sidebar');
            const mobileToggle = document.querySelector('.toggle-sidebar.d-md-none');

            if (mobileToggle && !sidebar.contains(event.target) && !mobileToggle.contains(event.target)) {
                Alpine.store('mobileMenuOpen', false);
            }
        });
    });
</script>

<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\culture\resources\views/layouts/layout.blade.php ENDPATH**/ ?>