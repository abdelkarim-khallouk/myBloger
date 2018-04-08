<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Comment;
use App\User;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles= Article::all();
        $authors= User::all();

        $ar = Array(
            'articles' => $articles,
            'authors' => $authors
            );

        return view('article.view', $ar);

        //return view('article.view');
    }

    /**
     * Show the form for adding a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        
        if ($request->isMethod('post')){
            $ar = new Article();
            $ar->title = $request->input('title');
            $ar->article_body = $request->input('body');
            $ar->user_id = Auth::user()->id;
            $ar->save();
            return redirect('articles');
        }
        return view('article.add');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        if ($request->isMethod('post')){
            $ar = new Comment();
            $ar->comment_body = $request->input('comment');
            $ar->article_id = $id;
            $ar->save();
            //return redirect('');
        }

        $article = Article::find($id);
        $ar = Array('article' => $article);

        return view('article.read', $ar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $article = Article::find($id);

        if ($request->isMethod('post')){

            $article->title = $request->input('title');
            $article->article_body = $request->input('body');
            $article->user_id = Auth::user()->id;
            $article->save();

            return redirect('articles');
        }
        else {

            $ar = Array('article' => $article);
            return view('article.edit', $ar);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('articles');
    }
}
