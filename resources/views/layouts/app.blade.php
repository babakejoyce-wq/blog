<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mon Blog' }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background-color: #f4f6f9;
        font-family: 'Poppins', sans-serif;
    }

    /* NAVBAR – gradient animé + apparition */
    nav.navbar {
        background: linear-gradient(90deg, #6f42c1, #0d6efd, #6f42c1);
        background-size: 300% 300%;
        animation: gradientMove 8s ease infinite, navbarFade 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(-20px);
    }

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes navbarFade {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    nav.navbar a.navbar-brand,
    nav.navbar .nav-link {
        color: white !important;
        font-weight: 500;
        position: relative;
        transition: color 0.3s ease;
    }

    /* Hover underline animé */
    nav.navbar .nav-link::after {
        content: "";
        position: absolute;
        width: 0%;
        height: 2px;
        background: white;
        bottom: -4px;
        left: 0;
        transition: width 0.3s ease;
    }

    nav.navbar .nav-link:hover::after {
        width: 100%;
    }

    .main-container {
        margin-top: 40px;
        opacity: 0;
        animation: fadeInContent 0.8s ease-out 0.4s forwards;
    }

    /* Animation apparition du contenu */
    @keyframes fadeInContent {
        to {
            opacity: 1;
        }
    }

    .card-custom {
    border-radius: 15px;
    border: none;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInCard 0.6s ease-out forwards;
}

.card-custom:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

@keyframes fadeInCard {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.card-custom img {
    transition: transform 0.4s ease;
    border-radius: 10px;
}

.card-custom:hover img {
    transform: scale(1.05);
}


    footer {
        margin-top: 60px;
        text-align: center;
        color: #777;
        padding-bottom: 20px;
        opacity: 0;
        animation: fadeInContent 0.8s ease-out 0.6s forwards;
    }
</style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg px-4">
        <a class="navbar-brand" href="{{ route('home') }}">Mon Blog</a>

        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles.index') }}">Articles</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}">Profil</a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-sm btn-light ms-2">Déconnexion</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-sm btn-light ms-2" href="{{ route('register') }}">Inscription</a>
                    </li>
                @endauth

            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container main-container">
        @yield('content')
    <footer>
        © 2025 – Mon Blog. Tous droits réservés.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
