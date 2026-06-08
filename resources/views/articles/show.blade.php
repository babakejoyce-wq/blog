@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="card p-5 shadow-sm mx-auto" style="max-width: 800px;">
    <h1 class="fw-bold text-primary">{{ $article->title }}</h1>
    @if($article->image)
    <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded mb-4" alt="Image de couverture">
    @endif
    <p>Auteur: {{ $article->user ? $article->user->prenom . ' ' . $article->user->nom : 'Système' }}
</p>
<p>{{ $article->content }}</p>
    <p class="text-muted mb-4">Publié le {{ $article->created_at->format('d/m/Y') }}</p>
    @if(auth()->check())
<form action="{{ route('comments.store', $article->id) }}" method="POST">
    @csrf
    <input type="hidden" name="article_id" value="{{ $article->id }}">

    <textarea name="contenu" class="form-control" required></textarea>

    

 <button type="submit" class="btn btn-primary mt-2">
        Ajouter un commentaire
    </button>
</form>
<h3 class="mt-4">Commentaires</h3>

@forelse($article->comments as $comment)
    <div class="p-3 mb-3 border rounded bg-light">
        <strong>{{ $comment->user ? $comment->user->prenom . ' ' . $comment->user->nom : 'Utilisateur' }}</strong>
        <span class="text-muted" style="font-size: 13px;">
            • {{ $comment->created_at->diffForHumans() }}
        </span>
        <p class="mt-2 mb-0">{{ $comment->contenu }}</p>
    </div>
@empty
    <p class="text-muted">Aucun commentaire pour le moment.</p>
@endforelse
@endif
    <div class="mt-4 d-flex justify-content-between">
        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Modifier</a>
        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Supprimer cet article ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>
@endsection
