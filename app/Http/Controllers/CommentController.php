<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'contenu' => 'required',
        'article_id' => 'required|exists:articles,id'
    ]);

    Comment::create([
        'contenu' => $request->contenu,
        'article_id' => $request->article_id,
        'user_id' => auth()->id()
    ]);

    return back()->with('success','commentaire ajouté avec succès');
}

}
