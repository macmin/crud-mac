<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //

    public function index() {
        
        return Article::all();

    }

    public function show(Article $article) {

        return $article;
    }

    public function store(Request $request) {

        //Realizamos una validacion de variable requeridas

        $validator = \Validator::make($request->all(), [
            'id_user' => 'numeric|required',
            'title' => 'required',
            'body_article' => 'required',
            'url_foto' => 'required'
        ]);
  
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        
         $article = Article::create($request->all() );

        return response()->json($article, 201);

    }

    public function update(Request $request, Article $article ) {
        
        $validator = \Validator::make($request->all(), [
            'id_user' => 'numeric|required',
            'title' => 'required',
            'body_article' => 'required',
            'url_foto' => 'required'
        ]);
  
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $article->update($request->all() );

        return response()->json($article, 200);
    }

    public function delete(Article $article ) {
        
        $article->delete();

        return response()->json(null, 204);

    }

    public function comments($article) {

        $datos = DB::table('articles as ar')
             ->join('comments as com', 'ar.id_article', '=', 'com.id_article')
             ->select('com.id_comment', 'com.id_user' , 'com.body_comment', 'com.created_at')
             ->where('com.id_article', $article)->get();

        return $datos;
    }
}
