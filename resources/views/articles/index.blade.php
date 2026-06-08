@extends('layouts.app')

@section('title', 'Tous les articles')

@section('content')
<!-- Bandeau d'accueil -->
<div class="text-center mb-5 p-5 rounded-3" style="background: linear-gradient(135deg, #6f42c1, #0d6efd); color: white;">
    <h1 class="fw-bold">Bienvenue sur Mon Blog ✨</h1>
    <p class="lead">Partagez vos pensées, vos découvertes et vos histoires avec le monde 🌍</p>
    <a href="{{ route('articles.create') }}" class="btn btn-light mt-3 shadow">
        <i class="bi bi-pencil"></i> Rédiger un nouvel article
    </a>
</div>

<!-- Liste des articles -->
<div class="row">
    @forelse ($articles as $article)
        <div class="col-md-4 mb-4">
            <div class="card p-3 h-100">

                <h5 class="fw-bold text-dark">{{ $article->title }}</h5>

                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" 
                         class="img-fluid rounded mb-2" 
                         style="height: 150px; object-fit: cover;">
                @endif

                <!-- AUTEUR -->
                <p class="text-muted mb-2">
                    Auteur : {{ $article->user ? $article->user->prenom . ' ' . $article->user->nom : 'Système' }}
                </p>

                

                <!-- APERÇU DU CONTENU -->
                <p class="text-muted mt-3">{{ Str::limit($article->content, 100) }}</p>

                <div class="mt-auto">
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-primary btn-sm">
                        Lire plus
                    </a>
                </div>
                <!-- COMMENTAIRES AVEC LE BON STYLE -->
                <h6 class="fw-bold">Commentaires</h6>

                @forelse($article->comments->take(2) as $comment)
                    <div class="p-3 mb-2 border rounded bg-light">
                        <strong>
                            {{ $comment->user ? $comment->user->prenom . ' ' . $comment->user->nom : 'Utilisateur' }}
                        </strong>
                        <span class="text-muted" style="font-size: 13px;">
                            • {{ $comment->created_at->diffForHumans() }}
                        </span>
                        <p class="mt-2 mb-0">{{ $comment->contenu }}</p>
                    </div>
                @empty
                    <p class="text-muted mb-2">Aucun commentaire.</p>
                @endforelse

                @if($article->comments->count() > 2)
                    <a href="{{ route('articles.show', $article->id) }}" style="font-size: 13px;">
                        Voir tous les commentaires →
                    </a>
                @endif
            </div>
        </div>
    @empty
        <p class="text-center text-muted">Aucun article pour le moment 😢</p>
    @endforelse
</div>
@endsection
