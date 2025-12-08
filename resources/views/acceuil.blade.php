<!DOCTYPE html>
<html lang="fr" x-data="{ openModal: false, activeCategory: 'tous' }" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez la culture du Bénin : art, histoire, gastronomie et musique.">
    <title>Culture Bénin – Portail Culturel</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        :root {
            --primary: #d4af37; /* Or royal */
            --primary-dark: #b8941f;
            --secondary: #008751; /* Vert béninois */
            --dark: #1a1a1a;
            --light: #f8f5f0;
            --text: #333333;
            --text-light: #666666;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --radius: 12px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--light);
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            line-height: 1.2;
        }

        /* Animations */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }

        /* Header & Hero */
        .hero {
            min-height: 100vh;
            background: linear-gradient(rgba(26, 26, 26, 0.7), rgba(26, 26, 26, 0.8)),
                        url('{{ asset("assets/img/hero-bg.jpg") }}') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 0 5%;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23d4af37' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .hero-content {
            max-width: 800px;
            z-index: 2;
            animation: fadeUp 1s ease-out;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #d4af37, #ffdb70);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1.2rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(26, 26, 26, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            transition: var(--transition);
        }

        .navbar.scrolled {
            padding: 0.8rem 5%;
            background: rgba(26, 26, 26, 0.98);
            box-shadow: var(--shadow);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.3rem;
        }

        .logo img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--primary);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            position: relative;
            transition: var(--transition);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .btn {
            padding: 0.8rem 1.8rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--dark);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.2);
        }

        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: var(--dark);
        }

        /* Categories Section */
        .section {
            padding: 5rem 5%;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--dark);
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary);
        }

        .categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .category-card {
            background: white;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
        }

        .category-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .category-card:hover .category-img {
            transform: scale(1.05);
        }

        .category-content {
            padding: 1.5rem;
        }

        .category-content h3 {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .category-content p {
            color: var(--text-light);
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }

        .category-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: var(--transition);
        }

        .category-link:hover {
            gap: 10px;
            color: var(--primary-dark);
        }

        /* Floating Action Button */
        .fab {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            text-decoration: none;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            z-index: 999;
            cursor: pointer;
            transition: var(--transition);
            animation: float 3s ease-in-out infinite;
        }

        .fab:hover {
            transform: scale(1.1) rotate(90deg);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            padding: 1rem;
        }

        .modal-content {
            background: white;
            border-radius: var(--radius);
            width: 100%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            animation: fadeUp 0.4s ease-out;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            font-size: 1.5rem;
            color: var(--dark);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-light);
            transition: var(--transition);
        }

        .modal-close:hover {
            color: var(--dark);
        }

        .modal-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 4rem 5% 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 1rem;
        }

        .footer-logo img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .footer-links h4 {
            font-size: 1.2rem;
            margin-bottom: 1.2rem;
            color: var(--primary);
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.7rem;
        }

        .footer-links a {
            color: #aaa;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--primary);
            padding-left: 5px;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #333;
            color: #888;
            font-size: 0.9rem;
        }

        .footer-bottom a {
            color: var(--primary);
            text-decoration: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.8rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .navbar {
                padding: 1rem 5%;
            }

            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .section {
                padding: 3rem 5%;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .categories {
                grid-template-columns: 1fr;
            }
        }

        /* Loading shimmer */
        .shimmer {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 1000px 100%;
            animation: shimmer 2s infinite linear;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar" :class="{ 'scrolled': window.scrollY > 50 }" x-data="{ scrolled: false }"
         @scroll.window="scrolled = window.scrollY > 50">
        <a href="#" class="logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/0a/Flag_of_Benin.svg" alt="Drapeau Bénin">
            <span>Culture Bénin</span>
        </a>

        <div class="nav-links">
            <a href="{{ route('acceuil') }}">Accueil</a>
            <a href="#categories">Catégories</a>
            <a href="#about">À propos</a>

            @auth
            <!-- Menu utilisateur avec Alpine.js -->
            <div class="user-menu" x-data="{ open: false }" style="position: relative;">
                <button class="user-btn"
                        x-on:mouseenter="open = true"
                        x-on:mouseleave="open = false"
                        style="
                            background: none;
                            border: none;
                            display: flex;
                            align-items: center;
                            gap: 10px;
                            color: white;
                            cursor: pointer;
                            padding: 8px 15px;
                            border-radius: 25px;
                            transition: var(--transition);
                        ">
                    @if(auth()->user()->photo)
                        <img src="{{ asset('storage/' . auth()->user()->photo) }}"
                            alt="{{ auth()->user()->prenom }}"
                            style="width: 35px; height: 35px; border-radius: 50%; border: 2px solid var(--primary);">
                    @else
                        <div style="
                            width: 35px;
                            height: 35px;
                            border-radius: 50%;
                            background: var(--primary);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: var(--dark);
                            font-weight: bold;
                        ">
                            {{ strtoupper(substr(auth()->user()->prenom, 0, 1)) }}
                        </div>
                    @endif
                    <span style="font-weight: 600;">{{ auth()->user()->prenom }}</span>
                    <i class="fas fa-chevron-down" style="font-size: 0.8rem;"></i>
                </button>

                <!-- Menu déroulant -->
                <div x-show="open"
                    x-transition
                    x-on:mouseenter="open = true"
                    x-on:mouseleave="open = false"
                    style="
                        position: absolute;
                        top: 100%;
                        right: 0;
                        background: white;
                        border-radius: 12px;
                        box-shadow: var(--shadow);
                        min-width: 200px;
                        z-index: 1000;
                        margin-top: 10px;
                        overflow: hidden;
                    ">

                    <div style="padding: 1rem; background: #f8f9fa; border-bottom: 1px solid #eee;">
                        <div style="font-weight: 600; color: var(--dark);">
                            {{ auth()->user()->prenom }} {{ auth()->user()->nom }}
                        </div>
                        <div style="font-size: 0.85rem; color: #666;">
                            {{ auth()->user()->email }}
                        </div>
                        <div style="margin-top: 5px;">
                            <span style="
                                background: {{ auth()->user()->role->nom == 'admin' ? '#dc3545' :
                                            (auth()->user()->role->nom == 'moderateur' ? '#198754' :
                                            (auth()->user()->role->nom == 'contributeur' ? '#0d6efd' : '#6c757d')) }};
                                color: white;
                                padding: 3px 8px;
                                border-radius: 12px;
                                font-size: 0.75rem;
                                font-weight: 600;
                            ">
                                {{ ucfirst(auth()->user()->role->nom) }}
                            </span>
                        </div>
                    </div>

                    <div style="padding: 0.5rem 0;">
                        <a href="{{ route('profile.show') }}"
                        style="
                            display: flex;
                            align-items: center;
                            gap: 10px;
                            padding: 0.75rem 1rem;
                            color: var(--dark);
                            text-decoration: none;
                            transition: var(--transition);
                            "
                        x-on:mouseenter="this.style.backgroundColor = '#f8f9fa'"
                        x-on:mouseleave="this.style.backgroundColor = 'transparent'">
                            <i class="fas fa-user" style="color: #666;"></i>
                            <span>Mon profil</span>
                        </a>

                        @if(auth()->user()->role->nom == 'admin' || auth()->user()->role->nom == 'moderateur')
                        <a href="{{ route('welcome') }}"
                        style="
                            display: flex;
                            align-items: center;
                            gap: 10px;
                            padding: 0.75rem 1rem;
                            color: var(--dark);
                            text-decoration: none;
                            transition: var(--transition);
                            "
                        x-on:mouseenter="this.style.backgroundColor = '#f8f9fa'"
                        x-on:mouseleave="this.style.backgroundColor = 'transparent'">
                            <i class="fas fa-tachometer-alt" style="color: #666;"></i>
                            <span>Tableau de bord</span>
                        </a>
                        @endif

                        <a href="{{ route('contenu.index') }}"
                        style="
                            display: flex;
                            align-items: center;
                            gap: 10px;
                            padding: 0.75rem 1rem;
                            color: var(--dark);
                            text-decoration: none;
                            transition: var(--transition);
                            "
                        x-on:mouseenter="this.style.backgroundColor = '#f8f9fa'"
                        x-on:mouseleave="this.style.backgroundColor = 'transparent'">
                            <i class="fas fa-palette" style="color: #666;"></i>
                            <span>Mes contenus</span>
                        </a>

                        <div style="border-top: 1px solid #eee; margin: 0.5rem 0;"></div>

                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        style="
                            display: flex;
                            align-items: center;
                            gap: 10px;
                            padding: 0.75rem 1rem;
                            color: #dc3545;
                            text-decoration: none;
                            transition: var(--transition);
                            "
                        x-on:mouseenter="this.style.backgroundColor = 'rgba(220, 53, 69, 0.1)'"
                        x-on:mouseleave="this.style.backgroundColor = 'transparent'">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Déconnexion</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            @else
            <!-- Si l'utilisateur n'est pas connecté -->
            <a href="{{ route('login') }}" class="btn-outline">
                <i class="fas fa-sign-in-alt"></i> Connexion
            </a>
            <a href="{{ route('register') }}" class="btn-primary">
                <i class="fas fa-user-plus"></i> S'inscrire
            </a>
            @endauth
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Culture du Bénin</h1>
            <p>Plongez au cœur d'un patrimoine riche et vivant, où chaque tradition raconte une histoire millénaire.</p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="#categories" class="btn btn-primary">
                    <i class="fas fa-compass"></i> Découvrir
                </a>
                <a href="#about" class="btn btn-outline">
                    <i class="fas fa-info-circle"></i> En savoir plus
                </a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="section">
        <div class="section-title">
            <h2>Explorer la Culture</h2>
            <p style="color: var(--text-light); margin-top: 1rem;">Découvrez les différents aspects de notre patrimoine</p>
        </div>

        <div class="categories">
            <!-- Art & Artisanat -->
            <div class="category-card">
                <img src="{{ asset('assets/img/art.jpg') }}" alt="Art & Artisanat" class="category-img">
                <div class="category-content">
                    <h3>Art & Artisanat</h3>
                    <p>Découvrez l'artisanat traditionnel, les sculptures en bois, les textiles et les œuvres d'art contemporaines.</p>
                    <a href="{{ route('contenus.type', ['nom'=>'article']) }}" class="category-link">
                        Explorer <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Histoire -->
            <div class="category-card">
                <img src="{{ asset('assets/img/histoire.jpg') }}" alt="Histoire" class="category-img">
                <div class="category-content">
                    <h3>Histoire & Traditions</h3>
                    <p>Retracez l'histoire fascinante du Bénin, des royaumes anciens aux traditions vivantes.</p>
                    <a href="{{ route('contenus.type', ['nom'=>'histoire']) }}" class="category-link">
                        Explorer <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Gastronomie -->
            <div class="category-card">
                <img src="{{ asset('assets/img/gastronomie.jpg') }}" alt="Gastronomie" class="category-img">
                <div class="category-content">
                    <h3>Gastronomie</h3>
                    <p>Savourez les délices culinaires béninois, des plats traditionnels aux recettes modernes.</p>
                    <a href="{{ route('contenus.type', ['nom'=>'recette']) }}" class="category-link">
                        Explorer <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Musique & Danse -->
            <div class="category-card">
                <img src="{{ asset('assets/img/danse.jpg') }}" alt="Musique & Danse" class="category-img">
                <div class="category-content">
                    <h3>Musique & Danse</h3>
                    <p>Explorez les rythmes entraînants et les danses traditionnelles qui célèbrent la vie.</p>
                    <a href="{{ route('contenus.type', ['nom'=>'musique']) }}" class="category-link">
                        Explorer <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section" style="background: #f9f7f3;">
        <div class="section-title">
            <h2>Notre Mission</h2>
        </div>
        <div style="max-width: 800px; margin: 0 auto; text-align: center;">
            <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light);">
                Nous nous engageons à préserver et à promouvoir le riche patrimoine culturel du Bénin.
                Notre plateforme est bien plus qu’un espace de rencontre : c’est un véritable carrefour
                où se rassemblent passionnés, experts et curieux, unis par la volonté de célébrer, partager
                et transmettre la diversité, la grandeur et la beauté de notre culture.
            </p>
            <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light);">
                Chaque initiative, chaque échange et chaque découverte contribue à renforcer l’identité
                béninoise, à valoriser nos savoirs et nos traditions, et à inscrire cet héritage dans le
                cœur des générations présentes et futures.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section style="padding: 0 5% 5rem;">
        @yield('content')
    </section>

    <!-- Floating Action Button -->
    <div class="fab" @click="openModal = true">
        <i class="fas fa-plus"></i>
    </div>

    <!-- Modal -->
    <!-- Modal -->
    <div x-show="openModal" x-transition class="modal-overlay" @click.self="openModal = false">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-pen-nib me-2"></i> Publier un contenu</h3>
                <button class="modal-close" @click="openModal = false">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                @auth
                <form action="{{ route('contenu.store') }}" method="POST" enctype="multipart/form-data" id="contentForm">
                    @csrf

                    <!-- Champ caché pour l'auteur -->
                    <input type="hidden" name="auteur_id" value="{{ auth()->id() }}">

                    <!-- Info de l'auteur -->
                    <div style="
                        background: #f8f9fa;
                        padding: 1rem;
                        border-radius: 8px;
                        margin-bottom: 1.5rem;
                        display: flex;
                        align-items: center;
                        gap: 12px;
                    ">
                        @if(auth()->user()->photo)
                        <img src="{{ asset('storage/' . auth()->user()->photo) }}"
                            alt="{{ auth()->user()->prenom }}"
                            style="width: 40px; height: 40px; border-radius: 50%;">
                        @else
                        <div style="
                            width: 40px;
                            height: 40px;
                            border-radius: 50%;
                            background: linear-gradient(135deg, var(--primary), var(--secondary));
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: white;
                            font-weight: bold;
                            font-size: 1.2rem;
                        ">
                            {{ strtoupper(substr(auth()->user()->prenom, 0, 1)) }}
                        </div>
                        @endif
                        <div>
                            <div style="font-weight: 600;">
                                {{ auth()->user()->prenom }} {{ auth()->user()->nom }}
                            </div>
                            <div style="font-size: 0.9rem; color: #666;">
                                Vous publiez en tant que {{ auth()->user()->role->nom }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Titre *</label>
                        <input type="text" name="titre" class="form-control" placeholder="Donnez un titre à votre contenu" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Description *</label>
                        <textarea name="texte" class="form-control" placeholder="Racontez votre histoire..." required></textarea>
                    </div>

                    <div class="grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div class="form-group">
                            <label class="form-label">Région *</label>
                            <select name="region_id" class="form-control" required>
                                <option value="">Sélectionnez une région</option>
                                @foreach($regions as $r)
                                    <option value="{{ $r->id }}">{{ $r->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Langue *</label>
                            <select name="langue_id" class="form-control" required>
                                <option value="">Sélectionnez une langue</option>
                                @foreach($langues as $l)
                                    <option value="{{ $l->id }}">{{ $l->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Type de contenu *</label>
                        <select name="type_contenu_id" class="form-control" required>
                            <option value="">Sélectionnez un type</option>
                            @foreach($types as $t)
                                <option value="{{ $t->id }}">{{ $t->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Images / Médias</label>
                        <input type="file" name="media[]" multiple class="form-control" accept="image/*,video/*">
                        <small style="color: var(--text-light); display: block; margin-top: 0.5rem;">
                            <i class="fas fa-info-circle"></i> Vous pouvez sélectionner plusieurs fichiers
                        </small>
                    </div>

                    <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                        <button type="submit" class="btn btn-primary" style="flex: 1;">
                            <i class="fas fa-paper-plane"></i> Publier
                        </button>
                        <button type="button" class="btn" style="flex: 1; background: #f0f0f0;" @click="openModal = false">
                            Annuler
                        </button>
                    </div>
                </form>
                @else
                <!-- Si l'utilisateur n'est pas connecté -->
                <div style="text-align: center; padding: 2rem;">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: #f8f9fa;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1.5rem;
                        color: var(--primary);
                        font-size: 2rem;
                    ">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h4 style="margin-bottom: 1rem;">Connexion requise</h4>
                    <p style="color: var(--text-light); margin-bottom: 2rem;">
                        Vous devez être connecté pour publier du contenu.
                    </p>
                    <div style="display: flex; gap: 1rem; justify-content: center;">
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt"></i> Se connecter
                        </a>
                        <a href="{{ route('register') }}" class="btn" style="background: #f0f0f0;">
                            <i class="fas fa-user-plus"></i> S'inscrire
                        </a>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div>
                <div class="footer-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/0a/Flag_of_Benin.svg" alt="Bénin">
                    <span style="font-weight: 600; font-size: 1.2rem;">Culture Bénin</span>
                </div>
                <p style="color: #aaa; margin-top: 1rem;">
                    Préservons et célébrons ensemble le patrimoine culturel du Bénin.
                </p>
            </div>

            <div class="footer-links">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="#categories">Catégories</a></li>
                    <li><a href="#about">À propos</a></li>
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                    <li><a href="{{ route('register') }}">Inscription</a></li>
                </ul>
            </div>

            <div class="footer-links">
                <h4>Catégories</h4>
                <ul>
                    <li><a href="{{ route('contenus.type', ['nom'=>'article']) }}">Art & Artisanat</a></li>
                    <li><a href="{{ route('contenus.type', ['nom'=>'histoire']) }}">Histoire</a></li>
                    <li><a href="{{ route('contenus.type', ['nom'=>'recette']) }}">Gastronomie</a></li>
                    <li><a href="{{ route('contenus.type', ['nom'=>'musique']) }}">Musique & Danse</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 Culture Bénin. Tous droits réservés.</p>
            <p style="margin-top: 0.5rem;">
                <a href="#">Espace administrateur</a> |
                <a href="#">Mentions légales</a> |
                <a href="#">Contact</a>
            </p>
        </div>
    </footer>

    <script>

        function toggleUserMenu() {
            const dropdown = document.getElementById('userDropdown');
            if (dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            } else {
                dropdown.style.display = 'block';
            }
        }

        // Fermer le menu en cliquant ailleurs
        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('userMenu');
            const dropdown = document.getElementById('userDropdown');

            if (!userMenu.contains(event.target)) {
                dropdown.style.display = 'none';
            }
        });
        
        // Initialiser Alpine.js pour le menu utilisateur
        document.addEventListener('alpine:init', () => {
            Alpine.data('userMenu', () => ({
                showUserMenu: false,

                init() {
                    // Initialiser le menu utilisateur
                    console.log('Menu utilisateur initialisé');
                }
            }));
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Vérifier si l'utilisateur est connecté et afficher un message
        @auth
        document.addEventListener('DOMContentLoaded', function() {
            // Afficher un toast de bienvenue
            showWelcomeToast();

            // Vérifier si c'est la première connexion
            const isFirstVisit = localStorage.getItem('firstVisit_' + {{ auth()->id() }}) === null;
            if (isFirstVisit) {
                showFirstVisitMessage();
                localStorage.setItem('firstVisit_' + {{ auth()->id() }}, 'true');
            }
        });

        function showWelcomeToast() {
            const toast = document.createElement('div');
            toast.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: linear-gradient(135deg, var(--primary), var(--secondary));
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 12px;
                box-shadow: var(--shadow);
                z-index: 9999;
                display: flex;
                align-items: center;
                gap: 12px;
                animation: slideInRight 0.5s ease-out;
            `;

            toast.innerHTML = `
                <i class="fas fa-check-circle" style="font-size: 1.2rem;"></i>
                <div>
                    <div style="font-weight: 600;">Bienvenue, {{ auth()->user()->prenom }} !</div>
                    <div style="font-size: 0.9rem; opacity: 0.9;">Vous êtes maintenant connecté.</div>
                </div>
                <button onclick="this.parentElement.remove()"
                        style="background: none; border: none; color: white; cursor: pointer; margin-left: 10px;">
                    <i class="fas fa-times"></i>
                </button>
            `;

            document.body.appendChild(toast);

            // Supprimer automatiquement après 5 secondes
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.remove();
                }
            }, 5000);
        }

        function showFirstVisitMessage() {
            const modal = document.createElement('div');
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.7);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                animation: fadeIn 0.3s ease;
            `;

            modal.innerHTML = `
                <div style="
                    background: white;
                    border-radius: 20px;
                    padding: 2rem;
                    max-width: 500px;
                    width: 90%;
                    text-align: center;
                    animation: slideUp 0.4s ease-out;
                ">
                    <div style="
                        width: 80px;
                        height: 80px;
                        background: linear-gradient(135deg, var(--primary), var(--secondary));
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 1.5rem;
                        color: white;
                        font-size: 2rem;
                    ">
                        <i class="fas fa-heart"></i>
                    </div>

                    <h3 style="margin-bottom: 1rem; color: var(--dark);">
                        Bienvenue dans la communauté !
                    </h3>

                    <p style="color: var(--text-light); line-height: 1.6; margin-bottom: 2rem;">
                        Merci de rejoindre Culture Bénin. Vous pouvez maintenant :<br>
                        • Publier du contenu culturel<br>
                        • Commenter et liker<br>
                        • Suivre vos catégories préférées<br>
                        • Participer aux discussions
                    </p>

                    <div style="display: flex; gap: 1rem; justify-content: center;">
                        <button onclick="this.closest('div[style*=\\'position: fixed\\']').remove()"
                                style="
                                    background: var(--primary);
                                    color: var(--dark);
                                    border: none;
                                    padding: 0.8rem 1.5rem;
                                    border-radius: 50px;
                                    font-weight: 600;
                                    cursor: pointer;
                                    transition: var(--transition);
                                "
                                onmouseover="this.style.transform='translateY(-2px)'"
                                onmouseout="this.style.transform='translateY(0)'">
                            Commencer l'exploration
                        </button>
                    </div>
                </div>
            `;

            document.body.appendChild(modal);

            // Fermer en cliquant en dehors
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.remove();
                }
            });
        }
        @endauth

        // Gestion du formulaire de contenu
        const contentForm = document.getElementById('contentForm');
        if (contentForm) {
            contentForm.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;

                // Afficher un spinner
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Publication en cours...';
                submitBtn.disabled = true;

                // Simuler un délai
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;

                    // Fermer le modal
                    openModal = false;

                    // Afficher un message de succès
                    showSuccessMessage('Votre contenu a été publié avec succès !');
                }, 2000);
            });
        }

        function showSuccessMessage(message) {
            const toast = document.createElement('div');
            toast.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: #198754;
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 12px;
                box-shadow: var(--shadow);
                z-index: 9999;
                display: flex;
                align-items: center;
                gap: 12px;
                animation: slideInRight 0.5s ease-out;
            `;

            toast.innerHTML = `
                <i class="fas fa-check-circle" style="font-size: 1.2rem;"></i>
                <div>
                    <div style="font-weight: 600;">Succès !</div>
                    <div style="font-size: 0.9rem; opacity: 0.9;">${message}</div>
                </div>
                <button onclick="this.parentElement.remove()"
                        style="background: none; border: none; color: white; cursor: pointer; margin-left: 10px;">
                    <i class="fas fa-times"></i>
                </button>
            `;

            document.body.appendChild(toast);

            // Supprimer automatiquement après 5 secondes
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.remove();
                }
            }, 5000);
        }
    </script>

    <style>
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

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .user-btn:hover {
            background: rgba(255, 255, 255, 0.1) !important;
        }
    </style>
</body>
</html>
