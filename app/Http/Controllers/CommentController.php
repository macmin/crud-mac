<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
   


    public function store(Request $request) {

        //Realizamos validacion de variable requeridas 
        $validator = \Validator::make($request->all(), [
            'id_user' => 'numeric|required',
            'id_article' => 'numeric|required',
            'body_comment' => 'required',
        ]);
  
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        $comment = Comment::create($request->all() );

        return response()->json($comment, 201);

    }

    public function update(Request $request, Comment $comment ) {
        
        $validator = \Validator::make($request->all(), [
            'id_user' => 'numeric|required',
            'id_article' => 'numeric|required',
            'body_comment' => 'required',
        ]);
  
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        $comment->update($request->all() );

        return response()->json($comment, 200);
    }

    public function delete(Comment $comment ) {
        $comment->delete();

        return response()->json(null, 204);

    }

    
}
