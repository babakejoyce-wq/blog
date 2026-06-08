<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Liste paginée
    public function index()
    {
        $articles = Article::latest()->paginate(6);
        return view('articles.index', compact('articles'));
    }

    // Formulaire création
    public function create()
    {
        return view('articles.create');
    }

    // Stockage d'un nouvel article
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        // Générer slug unique
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $i = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $i++;
        }
        $validated['slug'] = $slug;

        // Gérer l'upload d'image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('articles', 'public');
        }

        // Créer l'article
        $validated['user_id'] = auth()->id(); //auteur connecté
        Article::create($validated);

        return redirect()->route('articles.index')->with('success', 'Article créé avec succès.');
    }

    // Afficher un article (route-model binding)
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // Formulaire d'édition
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    // Mise à jour
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        // Nouveau slug si titre changé
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $i = 1;
        while (Article::where('slug', $slug)->where('id', '!=', $article->id)->exists()) {
            $slug = $originalSlug . '-' . $i++;
        }
        $validated['slug'] = $slug;

        // Si nouvelle image : supprimer ancienne puis stocker la nouvelle
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $validated['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($validated);

        return redirect()->route('articles.show', $article)->with('success', 'Article mis à jour.');
    }

    // Suppression
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé.');
    }
}
