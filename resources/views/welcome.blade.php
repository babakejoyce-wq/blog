<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur Mon Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .hero {
            background: url("https://images.unsplash.com/photo-1507525428034-b723cf961d3e") center/cover no-repeat;
            height: 100vh;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }
        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #ff6b6b;
            border: none;
            padding: 10px 25px;
            font-size: 1.2rem;
            border-radius: 25px;
            color: white;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #ff4757;
            transform: scale(1.05);
        }
        .auth-buttons a {
            margin: 10px;
        }
    </style>
</head>
<body>

    <section class="hero">
        <h1>Bienvenue sur Mon Blog</h1>
        <p>Découvrez mes articles, mes idées et mes inspirations</p>

        <div class="auth-buttons">
            @guest
                <a href="{{ route('login') }}" class="btn btn-light">Se connecter</a>
                <a href="{{ route('register') }}" class="btn btn-warning">Créer un compte</a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-success">Accéder au tableau de bord</a>
            @endauth
        </div>

        <a href="{{ route('articles.index') }}" class="btn btn-custom">Voir les articles</a>
    </section>

</body>
</html>
