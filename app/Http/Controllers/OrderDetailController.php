<?php

namespace App\Http\Controllers;

use App\Models\Orderdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderDetailController extends Controller
{
    public function rejectFood($id)
    {
        $changeStatus = Orderdetail::find($id);
        $changeStatus->status = 2;
        $changeStatus->save();
        $req = "gcanjit741@gmail.com";
        $body = "Your order has been rejected!!";
        Mail::send('backend.OrderResponseEmail',['body'=>$body],function ($message) use ($req){
            $message->from($req,'Anjit');
            $message->to($req,'timi');
            $message->subject('Order Rejected');

        });
        return back();
    }
    public function prepareFood($id)
    {
        $changeStatus = Orderdetail::find($id);
        $changeStatus->status = 3;
        $changeStatus->save();
        return back();
    }
    public function deliverFood($id)
    {
        $changeStatus = Orderdetail::find($id);
        $changeStatus->status = 1;
        $changeStatus->save();
        return back();
    }
}
