<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Professionnel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background: #0d0d0d;
            color: white;
            overflow-x: hidden;
        }

        /* SECTION HERO */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1515378791036-0648a3ef77b2') center/cover no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            animation: fadeInDown 1.5s;
        }

        .hero p {
            font-size: 1.4rem;
            opacity: 0.85;
            margin-bottom: 20px;
            animation: fadeInUp 2s;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .btn-start {
            margin-top: 20px;
            padding: 14px 35px;
            background: #ff6b6b;
            border: none;
            border-radius: 30px;
            font-size: 1.3rem;
            color: white;
            transition: 0.3s;
            animation: fadeInUp 2.2s;
        }

        .btn-start:hover {
            background: #ff4b4b;
            transform: scale(1.08);
        }

        /* IMAGES FLOTTANTES */
        .floating-images {
            display: flex;
            gap: 30px;
            overflow-x: auto;
            padding: 40px 20px;
            scrollbar-width: none;
        }

        .floating-images img {
            width: 350px;
            height: 220px;
            border-radius: 20px;
            object-fit: cover;
            transition: 0.4s;
        }

        .floating-images img:hover {
            transform: scale(1.05);
        }

        /* SECTION VIDEO */
        .video-section {
            padding: 50px 10%;
        }

        .video-container {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            align-items: center;
            justify-content: center;
        }

        .video-box video {
            width: 100%;
            max-width: 500px;
            border-radius: 20px;
        }

        .inspire-text {
            max-width: 450px;
            font-size: 1.2rem;
            line-height: 1.7;
            opacity: 0.85;
        }

        /* FOOTER */ */
        footer {
            margin-top: 50px;
            padding: 30px;
            background: #111;
            text-align: center;
            font-size: 1rem;
            opacity: 0.7;
        }
    </style>
</head>
<body>

    <!-- SECTION HERO -->
    <section class="hero">
        <h1>Bienvenue dans l'univers du Blog</h1>
        <p>Un espace d'inspiration, d'idées et de créativité infinie.</p>
        <a href="{{route('register')}}" class="btn-start">Commençons l'aventure ensemble</a>
    </section>

    <!-- SECTION VIDEO + TEXTE INSPIRANT -->
    <section class="video-section">
        <div class="video-container">
            <div class="video-box">
                <video src="video.mp4" autoplay muted loop></video>
            </div>

            <div class="inspire-text">
                <h2 class="mb-3">Laisse-toi Inspirer</h2>
                <p>
                    Chaque idée commence par une étincelle. Chaque rêve naît d’un simple pas.
                    Ton histoire mérite d’être racontée, partagée, vécue pleinement.
                </p>
                <p>
                    À travers les mots, les images et les émotions, explore un univers où la créativité
                    devient un voyage. Inspire-toi, exprime-toi, et construis ton propre chemin.
                </p>
                <a href="{{route('register')}}" class="btn btn-start mt-3">Commençons l'aventure ensemble</a>
            </div>
        </div>
    </section>

    <!-- IMAGES FLOTTANTES -->
    <section id="explore" class="floating-images">
        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e" alt="image 1">
        <img src="https://images.unsplash.com/photo-1492725764893-90b379c2b6e7" alt="image 2">
        <img src="https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d" alt="image 3">
        <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2" alt="image 4">
    </section>

    <!-- SECTION VIDEO AUTO-PLAY -->
    <section class="video-section">
        <h2 style="margin-bottom:20px; font-weight:700;">Découvrez l'essence de notre univers</h2>
        <video autoplay muted loop>
            <source src="{{ asset('videos/blog.mp4') }}" type="video/mp4">
        </video>
    </section>

    <!-- FOOTER -->
    <footer>
        © 2025 - Mon Blog Professionnel. Créé avec passion.
    </footer>

<script>
    // AUTO-SCROLL DES IMAGES FLOTTANTES
    const slider = document.querySelector('.floating-images');
    let scrollAmount = 0;

    function autoScroll() {
        scrollAmount += 1;
        slider.scrollTo({ left: scrollAmount, behavior: 'smooth' });
        if (scrollAmount >= slider.scrollWidth - slider.clientWidth) {
            scrollAmount = 0;
        }
    }

    setInterval(autoScroll, 40);
</script>

</body>
</html>
