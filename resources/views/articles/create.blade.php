@extends('layouts.app')

@section('title', 'Nouvel article')

@section('content')
<div class="container mt-5">
    <div class="col-md-8 mx-auto">

        <div class="card shadow p-4">
            <h2 class="text-center mb-4" style="color:#0d6efd;">
                📝 Nouvel article
            </h2>

            {{-- FORMULAIRE --}}
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Image --}}
                <div class="mb-3">
                    <label class="form-label">Image de couverture (optionnel)</label>
                    <input type="file" name="image" class="form-control">
                </div>

                {{-- Titre --}}
                <div class="mb-3">
                    <label class="form-label">Titre</label>
                    <input type="text" name="title" class="form-control" placeholder="Entrez le titre" required>
                </div>

                {{-- Contenu --}}
                <div class="mb-3">
                    <label class="form-label">Contenu</label>
                    <textarea name="content" rows="7" class="form-control" placeholder="Rédigez ici votre article..." required></textarea>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    Publier
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
