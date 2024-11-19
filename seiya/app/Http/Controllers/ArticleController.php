<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function create(){
 
        return view('posts.create');
    }
 
    public function store(Request $request){
        $article=new Article();
        $article->fill([
            'title'=>request('title'),
            'body'=>request('body'),
            'description' =>request('description')
        ]);
        if (request('image')){
            $name = request()->file('image')->getClientOriginalName();
            request()->file('image')->move('storage/images', $name);
            $article->image = $name;
        }
        $article->save();
        return redirect()->route('posts.index', $article);
    }
    public function index(){
        $article=Article::all();
        return view('posts.index',compact('article'));
    
    }

    public function show(Article $article)
    {
        return view('posts.show', compact('article'));
    }



    public function edit(Article $article)
    {
        return view('posts.edit', compact('article'));
    }


     public function update(Request $request,Article $article){
        $article->fill([
            'title'=>request('title'),
            'body'=>request('body'),
            'description' =>request('description')
        ]);
        if (request('image')){
            $name = request()->file('image')->getClientOriginalName();
            request()->file('image')->move('storage/images', $name);
            $article->image = $name;
        }
        $article->save();
        return redirect()->route('posts.index', $article);
    }


    public function destroy(Article $article)
    {        
        $article->delete();
        return redirect()->route('posts.index');
    }
}
