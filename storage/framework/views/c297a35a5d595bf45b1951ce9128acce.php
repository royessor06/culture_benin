<?php $__env->startSection('title', 'Dashboard Admin - Culture Bénin'); ?>
<?php $__env->startSection('page-title', 'Tableau de bord'); ?>
<?php $__env->startSection('page-subtitle', 'Aperçu des performances et activités'); ?>

<?php $__env->startSection('header-actions'); ?>
<button class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1" onclick="refreshDashboard()">
    <i class="fas fa-sync-alt"></i>
    <span>Actualiser</span>
</button>
<button class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-1" onclick="exportDashboard()">
    <i class="fas fa-download"></i>
    <span>Exporter rapport</span>
</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Stats Cards Row -->
<div class="row g-4 mb-4">
    <!-- Card 1: Utilisateurs Totaux -->
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="card stat-card border-0 shadow-sm hover-lift transition-all h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="text-uppercase text-muted mb-1 fw-semibold small">Utilisateurs</h6>
                        <h2 class="fw-bold mb-0"><?php echo e($stats['total_users'] ?? 0); ?></h2>
                    </div>
                    <div class="stat-icon-wrapper bg-primary bg-opacity-10 rounded-circle p-3">
                        <i class="fas fa-users text-primary fs-4"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <span class="badge bg-success bg-opacity-10 text-success fs-7 fw-semibold px-2 py-1 rounded">
                        <i class="fas fa-arrow-up"></i> <?php echo e($stats['user_growth'] ?? 0); ?>%
                    </span>
                    <span class="text-muted ms-2 small">ce mois</span>
                </div>
                <div class="progress mt-2" style="height: 4px;">
                    <div class="progress-bar bg-primary" style="width: <?php echo e($stats['user_growth'] ?? 0); ?>%"></div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top-0 pt-0">
                <a href="<?php echo e(route('administrateur.index')); ?>" class="text-decoration-none text-primary fw-semibold small d-flex align-items-center justify-content-between">
                    <span>Voir tous les utilisateurs</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Card 2: Contenus Publiés -->
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="card stat-card border-0 shadow-sm hover-lift transition-all h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="text-uppercase text-muted mb-1 fw-semibold small">Contenus</h6>
                        <h2 class="fw-bold mb-0"><?php echo e($stats['total_contents'] ?? 0); ?></h2>
                    </div>
                    <div class="stat-icon-wrapper bg-success bg-opacity-10 rounded-circle p-3">
                        <i class="fas fa-palette text-success fs-4"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <span class="badge bg-info bg-opacity-10 text-info fs-7 fw-semibold px-2 py-1 rounded">
                        <?php echo e($stats['published_contents'] ?? 0); ?> publiés
                    </span>
                    <span class="text-muted ms-2 small"><?php echo e($stats['pending_contents'] ?? 0); ?> en attente</span>
                </div>
                <div class="d-flex mt-2">
                    <div class="flex-fill me-1">
                        <small class="text-muted d-block">Publiés</small>
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-success" style="width: <?php echo e($stats['published_percentage'] ?? 0); ?>%"></div>
                        </div>
                    </div>
                    <div class="flex-fill ms-1">
                        <small class="text-muted d-block">En attente</small>
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-warning" style="width: <?php echo e($stats['pending_percentage'] ?? 0); ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top-0 pt-0">
                <a href="<?php echo e(route('contenu.index')); ?>" class="text-decoration-none text-primary fw-semibold small d-flex align-items-center justify-content-between">
                    <span>Gérer les contenus</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Card 3: Commentaires Récents -->
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="card stat-card border-0 shadow-sm hover-lift transition-all h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="text-uppercase text-muted mb-1 fw-semibold small">Commentaires</h6>
                        <h2 class="fw-bold mb-0"><?php echo e($stats['total_comments'] ?? 0); ?></h2>
                    </div>
                    <div class="stat-icon-wrapper bg-info bg-opacity-10 rounded-circle p-3">
                        <i class="fas fa-comments text-info fs-4"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <span class="badge bg-warning bg-opacity-10 text-warning fs-7 fw-semibold px-2 py-1 rounded">
                        <i class="fas fa-clock"></i> <?php echo e($stats['pending_comments'] ?? 0); ?> à modérer
                    </span>
                </div>
                <div class="mt-2">
                    <small class="text-muted">Dernier: <?php echo e($stats['last_comment_time'] ?? 'Aucun'); ?></small>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top-0 pt-0">
                <a href="#" class="text-decoration-none text-primary fw-semibold small d-flex align-items-center justify-content-between">
                    <span>Voir les commentaires</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Card 4: Revenus -->
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="card stat-card border-0 shadow-sm hover-lift transition-all h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="text-uppercase text-muted mb-1 fw-semibold small">Revenus</h6>
                        <h2 class="fw-bold mb-0"><?php echo e(number_format($stats['total_revenue'] ?? 0, 0, ',', ' ')); ?> FCFA</h2>
                    </div>
                    <div class="stat-icon-wrapper bg-warning bg-opacity-10 rounded-circle p-3">
                        <i class="fas fa-coins text-warning fs-4"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <span class="badge bg-success bg-opacity-10 text-success fs-7 fw-semibold px-2 py-1 rounded">
                        <i class="fas fa-arrow-up"></i> <?php echo e($stats['revenue_growth'] ?? 0); ?>%
                    </span>
                    <span class="text-muted ms-2 small">ce mois</span>
                </div>
                <div class="progress mt-2" style="height: 4px;">
                    <div class="progress-bar bg-warning" style="width: <?php echo e(min($stats['revenue_growth'] ?? 0, 100)); ?>%"></div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top-0 pt-0">
                <a href="#" class="text-decoration-none text-primary fw-semibold small d-flex align-items-center justify-content-between">
                    <span>Voir les transactions</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Charts & Analytics Row -->
<div class="row g-4">
    <!-- Chart: Contenus par Type -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pb-2">
                <div>
                    <h5 class="card-title mb-1 fw-bold">Activité des contenus</h5>
                    <p class="text-muted small mb-0">Publications par type sur 30 jours</p>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-calendar-alt me-1"></i> 30 jours
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="changeChartPeriod('7d')">7 jours</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeChartPeriod('30d')">30 jours</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeChartPeriod('90d')">3 mois</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeChartPeriod('1y')">1 an</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container" style="height: 300px;">
                    <canvas id="contentActivityChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats & Actions -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-transparent border-0">
                <h5 class="card-title mb-1 fw-bold">Activité récente</h5>
                <p class="text-muted small mb-0">Dernières actions sur la plateforme</p>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <?php $__empty_1 = true; $__currentLoopData = $recent_activities ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="list-group-item border-0 py-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="avatar-sm rounded-circle bg-light d-flex align-items-center justify-content-center">
                                    <i class="fas fa-<?php echo e($activity['icon'] ?? 'bell'); ?> text-<?php echo e($activity['color'] ?? 'primary'); ?>"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0"><?php echo e($activity['title']); ?></h6>
                                <p class="text-muted small mb-0"><?php echo e($activity['description']); ?></p>
                                <small class="text-muted"><?php echo e($activity['time']); ?></small>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="list-group-item border-0 py-4 text-center">
                        <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                        <p class="text-muted mb-0">Aucune activité récente</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top-0">
                <a href="#" class="btn btn-outline-primary btn-sm w-100">
                    <i class="fas fa-history me-1"></i> Voir toute l'activité
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Row -->
<div class="row g-4 mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent border-0">
                <h5 class="card-title mb-1 fw-bold">Actions rapides</h5>
                <p class="text-muted small mb-0">Accédez rapidement aux fonctionnalités principales</p>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3 col-6">
                        <a href="<?php echo e(route('contenu.create')); ?>" class="card action-card text-decoration-none">
                            <div class="card-body text-center p-4">
                                <div class="action-icon mb-3">
                                    <i class="fas fa-plus-circle fa-2x text-primary"></i>
                                </div>
                                <h6 class="mb-0">Nouveau contenu</h6>
                                <p class="text-muted small mb-0">Ajouter un article</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="<?php echo e(route('moderateur.index')); ?>" class="card action-card text-decoration-none">
                            <div class="card-body text-center p-4">
                                <div class="action-icon mb-3">
                                    <i class="fas fa-user-shield fa-2x text-success"></i>
                                </div>
                                <h6 class="mb-0">Modérateurs</h6>
                                <p class="text-muted small mb-0">Gérer les modérateurs</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="<?php echo e(route('langue.index')); ?>" class="card action-card text-decoration-none">
                            <div class="card-body text-center p-4">
                                <div class="action-icon mb-3">
                                    <i class="fas fa-language fa-2x text-info"></i>
                                </div>
                                <h6 class="mb-0">Langues</h6>
                                <p class="text-muted small mb-0">Gérer les langues</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="<?php echo e(route('region.index')); ?>" class="card action-card text-decoration-none">
                            <div class="card-body text-center p-4">
                                <div class="action-icon mb-3">
                                    <i class="fas fa-map-marker-alt fa-2x text-warning"></i>
                                </div>
                                <h6 class="mb-0">Régions</h6>
                                <p class="text-muted small mb-0">Gérer les régions</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Contents -->
<div class="row g-4 mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title mb-1 fw-bold">Derniers contenus</h5>
                    <p class="text-muted small mb-0">Contenus récemment ajoutés</p>
                </div>
                <a href="<?php echo e(route('contenu.index')); ?>" class="btn btn-outline-primary btn-sm">
                    Voir tout <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Type</th>
                                <th>Auteur</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $recent_contents ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <?php if($content->medias->count() > 0): ?>
                                        <img src="<?php echo e(asset('storage/' . $content->medias->first()->chemin)); ?>"
                                             alt="<?php echo e($content->titre); ?>"
                                             class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                        <?php endif; ?>
                                        <div>
                                            <h6 class="mb-0"><?php echo e(Str::limit($content->titre, 40)); ?></h6>
                                            <small class="text-muted"><?php echo e(Str::limit($content->texte, 50)); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark"><?php echo e($content->typeContenu->nom ?? 'Non défini'); ?></span>
                                </td>
                                <td><?php echo e($content->auteur->prenom ?? ''); ?> <?php echo e($content->auteur->nom ?? ''); ?></td>
                                <td><?php echo e($content->created_at->format('d/m/Y')); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo e($content->statut === 'Publié' ? 'success' : ($content->statut === 'Brouillon' ? 'warning' : 'secondary')); ?>">
                                        <?php echo e($content->statut); ?>

                                    </span>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo e(route('contenu.show', $content->id)); ?>" class="btn btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('contenu.edit', $content->id)); ?>" class="btn btn-outline-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                    <p class="text-muted mb-0">Aucun contenu récent</p>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Initialiser le graphique
    let contentChart;

    document.addEventListener('DOMContentLoaded', function() {
        initializeChart();
    });

    function initializeChart() {
        const ctx = document.getElementById('contentActivityChart').getContext('2d');

        contentChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                    label: 'Contenus publiés',
                    data: [12, 19, 8, 15, 22, 18, 25, 20, 17, 23, 19, 26],
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Commentaires',
                    data: [5, 8, 6, 10, 12, 9, 14, 11, 8, 13, 10, 15],
                    borderColor: '#f59e0b',
                    backgroundColor: 'rgba(245, 158, 11, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    function changeChartPeriod(period) {
        // Simuler le changement de période
        const periods = {
            '7d': ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            '30d': ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4'],
            '90d': ['Mois 1', 'Mois 2', 'Mois 3'],
            '1y': ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc']
        };

        contentChart.data.labels = periods[period] || periods['30d'];
        contentChart.update();

        // Mettre à jour le texte du bouton
        const periodText = {
            '7d': '7 jours',
            '30d': '30 jours',
            '90d': '3 mois',
            '1y': '1 an'
        };
        document.querySelector('.dropdown-toggle').innerHTML =
            `<i class="fas fa-calendar-alt me-1"></i> ${periodText[period]}`;
    }

    function refreshDashboard() {
        // Simuler le rafraîchissement
        const btn = document.querySelector('[onclick="refreshDashboard()"]');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Actualisation...';
        btn.disabled = true;

        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.disabled = false;

            // Afficher une notification
            showToast('success', 'Tableau de bord actualisé', 'Les données ont été mises à jour.');
        }, 1500);
    }

    function exportDashboard() {
        // Simuler l'export
        showToast('info', 'Export en cours', 'Génération du rapport PDF...');

        setTimeout(() => {
            showToast('success', 'Export terminé', 'Le rapport a été téléchargé.');

            // Simuler le téléchargement
            const link = document.createElement('a');
            link.href = '#';
            link.download = 'rapport-culture-benin-' + new Date().toISOString().split('T')[0] + '.pdf';
            link.click();
        }, 2000);
    }

    function showToast(type, title, message) {
        // Créer une notification toast
        const toastId = 'toast-' + Date.now();
        const toastHtml = `
            <div id="${toastId}" class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
                <div class="toast show" role="alert">
                    <div class="toast-header bg-${type} text-white">
                        <strong class="me-auto">${title}</strong>
                        <button type="button" class="btn-close btn-close-white" onclick="document.getElementById('${toastId}').remove()"></button>
                    </div>
                    <div class="toast-body">
                        ${message}
                    </div>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML('beforeend', toastHtml);

        // Supprimer automatiquement après 5 secondes
        setTimeout(() => {
            const toast = document.getElementById(toastId);
            if (toast) toast.remove();
        }, 5000);
    }

    // CSS supplémentaire
    const style = document.createElement('style');
    style.textContent = `
        .stat-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: 1px solid rgba(0,0,0,0.05);
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
        }
        .stat-icon-wrapper {
            transition: all 0.3s ease;
        }
        .stat-card:hover .stat-icon-wrapper {
            transform: scale(1.1);
        }
        .action-card {
            transition: all 0.2s ease;
            border: 1px solid rgba(0,0,0,0.05);
        }
        .action-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-color: #667eea;
        }
        .action-icon {
            transition: transform 0.3s ease;
        }
        .action-card:hover .action-icon {
            transform: scale(1.1);
        }
        .avatar-sm {
            width: 40px;
            height: 40px;
        }
        .toast {
            animation: slideInRight 0.3s ease;
        }
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    `;
    document.head.appendChild(style);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views\welcome.blade.php ENDPATH**/ ?>