<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends FontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getListArticle()
    {
        $articles = Article::simplePaginate(5);

        $articleHot = Article::where('a_hot',Article::HOT)->get();

        return view('article.index',compact('articles','articleHot'));
    }
    public function getDetailArticle(Request $request)
    {
        $arrayUrl = (preg_split("/(-)/i",$request->segment(2)));
        $id = array_pop($arrayUrl);
        if ($id)
        {
            $articleDetail = Article::find($id);
            $articles = Article::paginate(10);
            $articleHot = Article::where('a_hot',Article::HOT)->get();
            $viewData = [
                'articleDetail' => $articleDetail,
                'articles' => $articles,
                'articleHot' => $articleHot
            ];

            return view('article.detail',$viewData);
        }
        return redirect('/');
    }
}
