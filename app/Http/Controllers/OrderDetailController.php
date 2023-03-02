<?php

namespace App\Http\Controllers;

use App\Models\Orderdetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function rejectFood($id)
    {
        $changeStatus = Orderdetail::find($id);
        $changeStatus->status = 2;
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
