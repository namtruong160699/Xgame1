<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserFavouriteController extends Controller
{
    public function addFavourite(Request $request, $id)
    {
        if ($request->ajax()) {
//            Kiểm tra tồn tại sản phẩm
            $product = Product::find($id);
            if (!$product) return response(['messages' => 'Không tồn tại sản phẩm']);
            $messages = 'Thêm yêu thích thành công';
            try
            {
                \DB::table('user_favourite')
                    ->insert([
                        'uf_product_id' => $id,
                        'uf_user_id' => \Auth::id()
                    ]);
            }catch (\Exception $e) {
                $messages = 'Sản phẩm này đã được yêu thích';
            }
            return response(['messages' => $messages]);
        }
    }
}
