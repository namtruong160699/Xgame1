<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends FontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $productHot = Product::where([
            'pro_hot' => Product::HOT_ON,
            'pro_active' => Product::STATUS_PUBLIC
        ])->orderBy('id','DESC')->limit(5)->get();

        $articleNews = Article::orderBy('id','DESC')->limit(6)->get();

        $categoriesHome = Category::with('products')
            ->where('c_home',Category::HOME)
            ->limit(3)
            ->get();
//        Kiểm tra người dùng đăng nhập
        $productSuggest = [];
        if (get_data_user('web'))
        {
            $transactions = Transaction::where([
                'tr_user_id' => get_data_user('web'),
                'tr_status' => Transaction::STATUS_DONE
            ])->pluck('id');
            if (!empty($transactions))
            {
                $listId = Order::whereIn('or_transaction_id',$transactions)->distinct()->pluck('or_product_id');
                if (!empty($listId))
                {
                    $listIdCategory = Product::whereIn('id',$listId)->distinct()->pluck('pro_category_id');
                    if ($listIdCategory)
                    {
                        $productSuggest = Product::whereIn('pro_category_id',$listIdCategory)->limit(4)->get();
                    }
                }
            }
        }

        $viewData = [
            'productHot' => $productHot,
            'articleNews' => $articleNews,
            'categoriesHome' => $categoriesHome,
            'productSuggest' => $productSuggest
        ];
        return view('home.index',$viewData);
    }

    public function renderProductView(Request $request)
    {
        if ($request->ajax())
        {
            $listID = $request->id;
            $productView = Product::whereIn('id',$listID)->get();
            $html = view('components.product_view',compact('productView'))->render();
            return response()->json(['data' => $html]);
        }
    }
}
