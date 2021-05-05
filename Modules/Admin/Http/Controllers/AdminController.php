<?php

namespace Modules\Admin\Http\Controllers;

use App\HelpersClass\Date;
use App\Models\Contact;
use App\Models\Rating;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
//    public function index()
//    {
//        $ratings = Rating::with('user:id,name','product:id,pro_name')->limit(10)->get();
//        $contacts = Contact::limit(10)->get();
//
////        Doanh thu ngày
//        $moneyDay = Transaction::whereDay('updated_at',date('d'))
//            ->where('tr_status',Transaction::STATUS_DONE)
//            ->sum('tr_total');
////        Doanh thu tháng
//        $moneyMonth = Transaction::whereMonth('updated_at',date('m'))
//            ->where('tr_status',Transaction::STATUS_DONE)
//            ->sum('tr_total');
//
//        $dataMoney = [
//            [
//                "name" => "Doanh thu ngày",
//                "y" => (int)$moneyDay
//            ],
//            [
//                "name" => "Doanh thu tháng",
//                "y" => (int)$moneyMonth
//            ]
//
//        ];
//
//        $transactionsNews = Transaction::with('user:id,name')
//            ->limit(5)->orderByDesc('id')->get();
//
//        $viewData = [
//            'ratings'    => $ratings,
//            'contacts'   => $contacts,
//            'moneyDay'   => $moneyDay,
//            'moneyMonth' => $moneyMonth,
//            'dataMoney' => json_encode($dataMoney),
//            'transactionsNews' => $transactionsNews
//        ];
//
//        return view('admin::index',$viewData);
//    }

    public function index()
    {
        //Tổng đơn hàng
        $totalTransaction = \DB::table('transactions')->select('id')->count();
        //Tổng thành viên
        $totalUser = \DB::table('users')->select('id')->count();
        //Tổng sản phẩm
        $totalProduct = \DB::table('products')->select('id')->count();
        //Tổng đánh giá
        $totalRating = \DB::table('ratings')->select('id')->count();
        //Thống kê trạng thái đơn hàng
        $transactionDefault = Transaction::where('tr_status',1)->select('id')->count();
        $transactionSuccess = Transaction::where('tr_status',2)->select('id')->count();
        $statusTransaction = [
            [
                'Chờ xử lý', $transactionDefault, false
            ],
            [
                'Đã xử lý', $transactionSuccess, false
            ]
        ];
        //Lấy ra tất cả các ngày trong tháng
        $listDay = Date::getListDayInMonth();

        //Doanh thu theo tháng ứng với trạng thái đã xử lý
        $revenueTransactionMonth = Transaction::where('tr_status',2)
            ->whereMonth('created_at',\date('m'))
            ->select(\DB::raw('sum(tr_total) as totalMoney'), \DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();
        //Doanh thu theo tháng ứng với trạng thái chờ xác nhận
        $revenueTransactionMonthDefault = Transaction::where('tr_status',1)
            ->whereMonth('created_at',\date('m'))
            ->select(\DB::raw('sum(tr_total) as totalMoney'), \DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();

        $arrRevenueTransactionMonth = [];
        $arrRevenueTransactionMonthDefault = [];
        foreach ($listDay as $day)
        {
            $total = 0;
            foreach ($revenueTransactionMonth as $key => $revenue)
            {
                if ($revenue['day'] == $day)
                {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrRevenueTransactionMonth[] = (int)$total;

            $total = 0;
            foreach ($revenueTransactionMonthDefault as $key => $revenue)
            {
                if ($revenue['day'] == $day)
                {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrRevenueTransactionMonthDefault[] = (int)$total;
        }

        $viewData = [
            'totalTransaction'           => $totalTransaction,
            'totalUser'                  => $totalUser,
            'totalProduct'               => $totalProduct,
            'totalRating'                => $totalRating,
            'statusTransaction'          => json_encode($statusTransaction),
            'listDay'                    => json_encode($listDay),
            'arrRevenueTransactionMonth' => json_encode($arrRevenueTransactionMonth),
            'arrRevenueTransactionMonthDefault' => json_encode($arrRevenueTransactionMonthDefault)
        ];
        return view('admin::index',$viewData);
    }
}
