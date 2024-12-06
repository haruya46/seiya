<?php

namespace App\Http\Controllers;
use App\Models\Access_controls;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function create(){
 
        return view('posts.create');
    }

    public function PostStatus($article_id)
    {
        // 指定された post_id のレコードを取得
        $access_controls = Access_controls::where('post_id', $article_id)->first();
    
        if ($access_controls === null) {
            // レコードが存在しない場合、新規作成
            $access_controls = new Access_controls;
            $access_controls->post_id = $article_id;
            $access_controls->status = 1; // 初期ステータスを 1 に設定
            $access_controls->save();
        } else {
            // レコードが存在する場合、ステータスをトグル
            if ($access_controls->status == 0) {
                $access_controls->status = 1;
            } else if ($access_controls->status == 1) {
                $access_controls->status = 0;
            }
            $access_controls->save();
        }
    
        return $access_controls->status;
    }
    
    public function image (Request $request){
        $result=$request->file('file')->isValid();
        if($result){
            $filename = $request->file->getClientOriginalName();
            $file=$request->file('file')->move('temp', $filename);
            echo '/temp/'.$filename;
        }
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
