<?php $__env->startSection('content'); ?>
<section class="detail-page" style="padding: 60px 8%;">

    <div class="section-title">
        <h2><?php echo e(ucfirst($type->nom)); ?> du Bénin</h2>
    </div>

    <?php $__currentLoopData = $contenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <article class="contenu-item" style="background:white; padding:25px; border-radius:15px; box-shadow:0 3px 12px rgba(0,0,0,0.1); margin-bottom:40px; position:relative;">

        <h3 style="font-size:1.6rem; margin-bottom:10px; color: #2d3748;">
            <?php echo e($contenu->titre); ?>

        </h3>

        <div class="contenu-preview" id="preview-<?php echo e($contenu->id); ?>">
            <!-- Texte tronqué -->
            <p style="font-size:1rem; color:#444; line-height:1.7; margin-bottom:15px;">
                <?php if(strlen($contenu->texte) > 200): ?>
                    <?php echo e(Str::limit($contenu->texte, 200)); ?>...
                <?php else: ?>
                    <?php echo e($contenu->texte); ?>

                <?php endif; ?>
            </p>

            <!-- Images limitées (max 1) -->
            <div class="media-preview" style="margin-top:15px;">
                <?php if($contenu->medias->count() > 0): ?>
                    <?php ($firstMedia = $contenu->medias->first()); ?>
                    <img src="<?php echo e(asset('storage/' . $firstMedia->chemin)); ?>"
                         alt="<?php echo e($contenu->titre); ?>"
                         style="width:100%; max-width:300px; border-radius:12px; margin-bottom:10px; cursor:pointer;"
                         onclick="openPopup(<?php echo e($contenu->id); ?>)">
                    <?php if($contenu->medias->count() > 1): ?>
                        <p style="font-size:0.9rem; color:#666;">
                            + <?php echo e($contenu->medias->count() - 1); ?> autre(s) image(s)
                        </p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- Bouton Voir Plus -->
            <?php if(strlen($contenu->texte) > 200 || $contenu->medias->count() > 1): ?>
            <div style="margin-top:15px;">
                <button class="voir-plus-btn" onclick="openPopup(<?php echo e($contenu->id); ?>)"
                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                               color: white;
                               border: none;
                               padding: 10px 25px;
                               border-radius: 25px;
                               font-weight: 600;
                               cursor: pointer;
                               transition: all 0.3s ease;
                               box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);">
                    <i class="fas fa-eye" style="margin-right: 8px;"></i>
                    Voir plus de détails
                </button>
            </div>
            <?php endif; ?>
        </div>

        <!-- Bouton commentaire -->
        <div class="comment-section" style="margin-top:20px; border-top: 1px solid #e2e8f0; padding-top:15px;">
            <button class="comment-btn"
                    style="background: #f7fafc;
                           border: 1px solid #cbd5e0;
                           color: #4a5568;
                           padding: 8px 20px;
                           border-radius: 20px;
                           cursor: pointer;
                           transition: all 0.2s ease;">
                <i class="fas fa-comment" style="margin-right: 8px;"></i>
                Commenter
            </button>
        </div>
    </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>

<!-- POPUP MODERNE -->
<div id="contenu-popup" class="popup-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); z-index:9999; align-items:center; justify-content:center; padding:20px;">
    <div class="popup-content"
         style="background: white;
                border-radius: 20px;
                width: 100%;
                max-width: 800px;
                max-height: 90vh;
                overflow-y: auto;
                position: relative;
                box-shadow: 0 20px 60px rgba(0,0,0,0.3);">

        <!-- En-tête du popup -->
        <div class="popup-header"
             style="padding: 25px 30px 15px;
                    border-bottom: 1px solid #e2e8f0;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;">
            <h3 id="popup-title" style="margin:0; color:#2d3748; font-size:1.8rem;"></h3>
            <button onclick="closePopup()"
                    style="background:none;
                           border:none;
                           font-size:1.5rem;
                           color:#a0aec0;
                           cursor:pointer;
                           padding:5px 10px;
                           border-radius:50%;
                           transition:all 0.2s ease;">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Contenu du popup -->
        <div class="popup-body" style="padding: 25px 30px;">
            <p id="popup-text" style="font-size:1.1rem; line-height:1.8; color:#4a5568; margin-bottom:25px;"></p>

            <!-- Galerie d'images -->
            <div id="popup-gallery" style="margin-top:25px;">
                <div class="gallery-grid" style="display:grid; grid-template-columns:repeat(auto-fill, minmax(200px, 1fr)); gap:15px;"></div>
            </div>

            <!-- Métadonnées -->
            <div class="popup-meta" style="margin-top:30px; padding-top:20px; border-top:1px solid #e2e8f0;">
                <div style="display:flex; gap:20px; flex-wrap:wrap;">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <i class="fas fa-user-circle" style="color:#667eea;"></i>
                        <span id="popup-author" style="color:#718096;"></span>
                    </div>
                    <div style="display:flex; align-items:center; gap:8px;">
                        <i class="fas fa-calendar-alt" style="color:#667eea;"></i>
                        <span id="popup-date" style="color:#718096;"></span>
                    </div>
                </div>
            </div>

            <!-- SECTION PREMIUM FEDAPAY -->
            <div id="premium-section" style="margin-top: 30px; padding: 20px; background: linear-gradient(135deg, #f6d365 0%, #fda085 100%); border-radius: 15px;">
                <h4 style="margin: 0 0 15px 0; color: #2d3748;">
                    <i class="fas fa-crown" style="margin-right: 10px; color: #f59e0b;"></i>
                    Contenu Premium
                </h4>

                <p style="color: #4a5568; margin-bottom: 20px;">
                    Accédez à la version complète de cet article et à toutes les ressources exclusives.
                </p>

                <!-- Options de paiement -->
                <div class="payment-options" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px; margin-bottom: 20px;">
                    <div class="payment-option" onclick="selectAmount(500)" style="background: white; padding: 15px; border-radius: 10px; text-align: center; cursor: pointer; transition: all 0.3s ease; border: 2px solid #e2e8f0;">
                        <div style="font-size: 1.2rem; font-weight: bold; color: #2d3748;">500 FCFA</div>
                        <div style="font-size: 0.9rem; color: #718096;">Accès standard</div>
                    </div>

                    <div class="payment-option" onclick="selectAmount(1000)" style="background: white; padding: 15px; border-radius: 10px; text-align: center; cursor: pointer; transition: all 0.3s ease; border: 2px solid #e2e8f0;">
                        <div style="font-size: 1.2rem; font-weight: bold; color: #2d3748;">1 000 FCFA</div>
                        <div style="font-size: 0.9rem; color: #718096;">Accès + PDF</div>
                    </div>

                    <div class="payment-option" onclick="selectAmount(2000)" style="background: white; padding: 15px; border-radius: 10px; text-align: center; cursor: pointer; transition: all 0.3s ease; border: 2px solid #e2e8f0;">
                        <div style="font-size: 1.2rem; font-weight: bold; color: #2d3748;">2 000 FCFA</div>
                        <div style="font-size: 0.9rem; color: #718096;">Accès complet</div>
                    </div>
                </div>

                <!-- Bouton de paiement -->
                <button id="pay-button" onclick="initiatePayment()"
                        style="width: 100%;
                               background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                               color: white;
                               border: none;
                               padding: 15px;
                               border-radius: 25px;
                               font-weight: bold;
                               font-size: 1.1rem;
                               cursor: pointer;
                               transition: all 0.3s ease;
                               box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);">
                    <i class="fas fa-lock" style="margin-right: 10px;"></i>
                    <span id="pay-button-text">Payer maintenant</span>
                    <span id="selected-amount" style="margin-left: 10px;">500 FCFA</span>
                </button>

                <!-- Méthodes de paiement -->
                <div style="margin-top: 15px; text-align: center;">
                    <img src="https://fedapay.com/images/logo.png" alt="FedaPay" style="height: 30px; margin: 0 5px;">
                    <span style="color: #718096; font-size: 0.9rem;">Paiements sécurisés par FedaPay</span>
                </div>
            </div>
        </div>

        <!-- Footer du popup -->
        <div class="popup-footer"
             style="padding: 20px 30px;
                    border-top: 1px solid #e2e8f0;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;">
            <div class="social-share" style="display:flex; gap:10px;">
                <button class="share-btn" onclick="shareContent('facebook')"
                        style="background:#1877f2; color:white; border:none; width:36px; height:36px; border-radius:50%; cursor:pointer;">
                    <i class="fab fa-facebook-f"></i>
                </button>
                <button class="share-btn" onclick="shareContent('twitter')"
                        style="background:#1da1f2; color:white; border:none; width:36px; height:36px; border-radius:50%; cursor:pointer;">
                    <i class="fab fa-twitter"></i>
                </button>
                <button class="share-btn" onclick="shareContent('whatsapp')"
                        style="background:#25d366; color:white; border:none; width:36px; height:36px; border-radius:50%; cursor:pointer;">
                    <i class="fab fa-whatsapp"></i>
                </button>
            </div>
            <button class="close-popup-btn" onclick="closePopup()"
                    style="background:linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                           color:white;
                           border:none;
                           padding:10px 25px;
                           border-radius:25px;
                           font-weight:600;
                           cursor:pointer;
                           transition:all 0.3s ease;">
                Fermer
            </button>
        </div>
    </div>
</div>

<!-- Popup FedaPay -->
<div id="fedapay-popup" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:10000; align-items:center; justify-content:center;">
    <div style="background:white; border-radius:20px; width:90%; max-width:500px; padding:30px; position:relative;">
        <button onclick="closeFedapayPopup()" style="position:absolute; top:15px; right:15px; background:none; border:none; font-size:1.5rem; color:#a0aec0; cursor:pointer;">×</button>

        <div style="text-align:center; margin-bottom:25px;">
            <img src="https://fedapay.com/images/logo.png" alt="FedaPay" style="height:50px; margin-bottom:15px;">
            <h3 style="margin:0; color:#2d3748;">Paiement en cours</h3>
            <p style="color:#718096; margin-top:10px;">Vous allez être redirigé vers FedaPay</p>
        </div>

        <div id="payment-loader" style="text-align:center;">
            <div class="spinner" style="width:60px; height:60px; border:5px solid #f3f3f3; border-top:5px solid #667eea; border-radius:50%; margin:0 auto 20px; animation:spin 1s linear infinite;"></div>
            <p style="color:#4a5568;">Initialisation du paiement...</p>
        </div>

        <div id="payment-iframe" style="display:none;"></div>
    </div>
</div>

<style>
    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
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
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .popup-overlay {
        animation: fadeIn 0.3s ease;
    }

    .popup-content {
        animation: slideUp 0.4s cubic-bezier(0.18, 0.89, 0.32, 1.28);
    }

    /* Styles des boutons */
    .voir-plus-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    .comment-btn:hover {
        background: #edf2f7;
        border-color: #a0aec0;
    }

    .payment-option:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-color: #667eea !important;
    }

    .payment-option.selected {
        border-color: #667eea !important;
        background: #f0f4ff !important;
    }

    #pay-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    /* Galerie images */
    .gallery-item {
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .gallery-item:hover {
        transform: scale(1.03);
    }

    .gallery-item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        display: block;
        cursor: pointer;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .popup-content {
            max-width: 95%;
            max-height: 85vh;
        }

        .popup-header, .popup-body, .popup-footer {
            padding: 20px;
        }

        .popup-footer {
            flex-direction: column;
            gap: 15px;
        }

        .payment-options {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    // Données des contenus
    const contenusData = {
        <?php $__currentLoopData = $contenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($contenu->id); ?>: {
            id: <?php echo e($contenu->id); ?>,
            titre: "<?php echo e(addslashes($contenu->titre)); ?>",
            texte: `<?php echo str_replace('`', '\\`', $contenu->texte); ?>`,
            medias: [
                <?php $__currentLoopData = $contenu->medias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                {
                    id: <?php echo e($media->id); ?>,
                    chemin: "<?php echo e(asset('storage/' . $media->chemin)); ?>",
                    type: "<?php echo e($media->type); ?>"
                },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            auteur: "<?php echo e($contenu->auteur->prenom ?? 'Anonyme'); ?> <?php echo e($contenu->auteur->nom ?? ''); ?>",
            date: "<?php echo e($contenu->created_at->format('d/m/Y')); ?>",
            type: "<?php echo e($contenu->type->nom ?? ''); ?>"
        },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    };

    // Variables globales
    let selectedAmount = 500;
    let currentContenuId = null;

    function openPopup(contenuId) {
        currentContenuId = contenuId;
        const contenu = contenusData[contenuId];
        if (!contenu) return;

        // Mettre à jour le titre
        document.getElementById('popup-title').textContent = contenu.titre;

        // Mettre à jour le texte
        document.getElementById('popup-text').textContent = contenu.texte;

        // Mettre à jour les métadonnées
        document.getElementById('popup-author').textContent = contenu.auteur;
        document.getElementById('popup-date').textContent = contenu.date;

        // Mettre à jour la galerie
        const galleryGrid = document.querySelector('.gallery-grid');
        galleryGrid.innerHTML = '';

        if (contenu.medias && contenu.medias.length > 0) {
            contenu.medias.forEach(media => {
                const galleryItem = document.createElement('div');
                galleryItem.className = 'gallery-item';
                galleryItem.innerHTML = `
                    <img src="${media.chemin}"
                         alt="${contenu.titre}"
                         onclick="openFullImage('${media.chemin}')">
                `;
                galleryGrid.appendChild(galleryItem);
            });
        } else {
            galleryGrid.innerHTML = '<p style="color:#a0aec0; text-align:center;">Aucune image disponible</p>';
        }

        // Afficher le popup
        document.getElementById('contenu-popup').style.display = 'flex';
        document.body.style.overflow = 'hidden';

        // Fermer avec la touche Escape
        document.addEventListener('keydown', handleEscape);
    }

    function closePopup() {
        document.getElementById('contenu-popup').style.display = 'none';
        document.body.style.overflow = 'auto';
        document.removeEventListener('keydown', handleEscape);
    }

    function selectAmount(amount) {
        selectedAmount = amount;

        // Mettre à jour l'affichage
        document.getElementById('selected-amount').textContent = amount.toLocaleString() + ' FCFA';

        // Mettre en surbrillance l'option sélectionnée
        document.querySelectorAll('.payment-option').forEach(option => {
            option.classList.remove('selected');
        });
        event.currentTarget.classList.add('selected');
    }

    function initiatePayment() {
        if (!currentContenuId) {
            alert('Veuillez sélectionner un contenu');
            return;
        }

        // Afficher le popup FedaPay
        document.getElementById('fedapay-popup').style.display = 'flex';
        document.body.style.overflow = 'hidden';

        // Envoyer la requête au serveur
        fetch('/payment/initiate', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                contenu_id: currentContenuId,
                amount: selectedAmount
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Rediriger vers FedaPay
                window.location.href = data.payment_url;
            } else {
                alert('Erreur: ' + data.message);
                closeFedapayPopup();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Une erreur est survenue lors de l\'initialisation du paiement');
            closeFedapayPopup();
        });
    }

    function closeFedapayPopup() {
        document.getElementById('fedapay-popup').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    function handleEscape(event) {
        if (event.key === 'Escape') {
            closePopup();
        }
    }

    function openFullImage(imageSrc) {
        const fullscreenOverlay = document.createElement('div');
        fullscreenOverlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
        `;

        fullscreenOverlay.innerHTML = `
            <img src="${imageSrc}"
                 style="max-width: 90%; max-height: 90%; object-fit: contain;">
            <button onclick="this.parentElement.remove()"
                    style="position: absolute; top: 20px; right: 20px; background: none; border: none; color: white; font-size: 2rem; cursor: pointer;">
                <i class="fas fa-times"></i>
            </button>
        `;

        document.body.appendChild(fullscreenOverlay);

        fullscreenOverlay.addEventListener('click', function(e) {
            if (e.target === this) {
                this.remove();
            }
        });
    }

    function shareContent(platform) {
        const url = window.location.href;
        const title = document.getElementById('popup-title').textContent;

        let shareUrl = '';
        switch(platform) {
            case 'facebook':
                shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                break;
            case 'twitter':
                shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(title)}&url=${encodeURIComponent(url)}`;
                break;
            case 'whatsapp':
                shareUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(title + ' ' + url)}`;
                break;
        }

        window.open(shareUrl, '_blank', 'width=600,height=400');
    }

    // Fermer le popup en cliquant en dehors
    document.getElementById('contenu-popup').addEventListener('click', function(e) {
        if (e.target === this) {
            closePopup();
        }
    });

    // Initialiser la sélection par défaut
    document.addEventListener('DOMContentLoaded', function() {
        // Sélectionner le premier montant par défaut
        selectAmount(500);
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('acceuil', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\culture\resources\views\pages\contenus.blade.php ENDPATH**/ ?>