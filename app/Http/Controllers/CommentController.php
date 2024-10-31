<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Vape;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Vape $vape)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id;
        $comment->vape_id = $vape->id;
        $comment->save();

        return redirect()->route('vapes.show', $vape)->with('success', 'Comentario añadido correctamente.');
    }
}
