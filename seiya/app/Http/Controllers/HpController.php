<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('foam');
    }
    public function site()
    {
        return view('site');
    }
    public function question()
    {
        return view('question');
    }
    public function Board()
    {
        return view('Board');
    }
    public function blogindex(){
        $article=Article::all();
        return view('index',compact('article'));
    }
    public function show(Article $article)
    {
        return view('show', compact('article'));
    }
}
