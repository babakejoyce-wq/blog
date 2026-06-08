@extends('layouts.app')

@section('title', 'Modifier un article')

@section('content')
<div class="card p-4 mx-auto shadow-sm" style="max-width: 700px;">
    <h2 class="mb-4 text-center text-warning">📝 Modifier l’article</h2>

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $article->title }}">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenu</label>
            <textarea name="content" id="content" rows="5" class="form-control">{{ $article->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning w-100">Mettre à jour</button>
    </form>
</div>
@endsection
