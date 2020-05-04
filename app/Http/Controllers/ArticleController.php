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
        return view('article.index',compact('articles'));
    }
    public function getDetailArticle(Request $request)
    {
        $arrayUrl = (preg_split("/(-)/i",$request->segment(2)));
        $id = array_pop($arrayUrl);
        if ($id)
        {
            $articleDetail = Article::find($id);
            $articles = Article::paginate(10);
            $viewData = [
                'articleDetail' => $articleDetail,
                'articles' => $articles
            ];

            return view('article.detail',$viewData);
        }
        return redirect('/');
    }
}
