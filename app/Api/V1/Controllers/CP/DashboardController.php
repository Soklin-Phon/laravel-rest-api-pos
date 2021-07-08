<?php

namespace App\Api\V1\Controllers\CP;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Dingo\Api\Routing\Helpers;
use JWTAuth;

use App\Api\V1\Controllers\ApiController;
use App\Model\Expense\Expense; 
use App\Model\Order\Order; 

class DashboardController extends ApiController
{
    use Helpers;
   
    function getInfo(){
       
        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');

        $totalOrder             = Order::sum('total_price'); 
        $totalOrderToday        = Order::whereBetween('paid_at', [$from, $to])->sum('total_price'); 
        $expenseOrderToday      = Expense::whereBetween('created_at', [$from, $to])->sum('total'); 

        $data = [
            'total_order'           => $totalOrder, 
            'total_order_today'     => $totalOrderToday, 
            'expense_today'         => $expenseOrderToday
        ];
        
        return $data; 
    }

}
