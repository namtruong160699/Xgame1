<?php

namespace Modules\Admin\Http\Controllers;

use App\Exports\TransactionExport;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::whereRaw(1);

        if($request->id) $transactions->where('id',$request->id);

        if ($request->phone) $transactions->where('tr_phone', 'like', '%' . $request->phone . '%');

        if ($status = $request->status)
        {
            $transactions->where('tr_status',$status);
        }

        $transactions = $transactions->with('user:id,name')->orderByDesc('id')->paginate(10);

        if ($request->export)
        {
//            Gọi tới export excel
            return \Excel::download(new TransactionExport($transactions), 'don-hang.xlsx');
        }

        $viewdata = [
            'transactions' => $transactions,
            'query'        => $request->query(),
        ];

        return view('admin::transaction.index',$viewdata);
    }

    public function viewOrder(Request $request,$id)
    {
        if ($request->ajax())
        {
            $orders = Order::with('product')
                ->where('or_transaction_id',$id)->get();
            $html = view('admin::components.order',compact('orders'))->render();
            return \response()->json($html);
        }
    }

    /**
     * Xử lý trạng thái đơn hàng
     */
    public function actionTransaction($id)
    {
        $transactions = Transaction::find($id);
        $orders = Order::where('or_transaction_id',$id)->get();
        if ($orders)
        {
            //Trừ đi số lượng của sản phẩm
            //Tăng biến pay sản phẩm
            foreach ($orders as $order)
            {
                $product = Product::find($order->or_product_id);
                $product->pro_number = $product->pro_number - $product->or_qty;
                $product->pro_pay ++;
                $product->save();
            }
        }
        //Cập nhật lại trạng thái của đơn hàng
        \DB::table('users')->where('id',$transactions->tr_user_id)
            ->increment('user_total_pay');
        $transactions->tr_status = Transaction::STATUS_DONE;
        $transactions->save();

        return redirect()->back()->with('success','Xứ lý đơn hàng thành công!');
    }

    public function delete($id)
    {
        $transaction = Transaction::find($id);
        if ($transaction)
        {
            $transaction->delete();
            \DB::table('orders')->where('or_transaction_id',$id)->delete();
        }
        return redirect()->back();
    }

    public function deleteOrderItem(Request $request,$id)
    {
        if ($request->ajax())
        {
            $order = Order::find($id);
            if ($order)
            {
                $money = $order->or_qty * $order->or_price;
                \DB::table('transactions')
                    ->where('id',$order->or_transaction_id)
                    ->decrement('tr_total',$money);
                $order->delete();
            }
            return \response(['code' => 200]);
        }
    }
}
