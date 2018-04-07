<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Comment;

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
        $ar = Array('articles' => $articles);
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
    public function edit($id)
    {
        //
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
        //
    }
}
