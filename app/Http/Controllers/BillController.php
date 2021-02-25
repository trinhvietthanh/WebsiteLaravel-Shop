<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Session;
use App\Models\BillDetail;
session_start();

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::paginate(10);
        return view('admin.Bill.bills', \compact('bills'));
    }
    public function order()
    {
        $bills = Bill::where('da_thanh_toan', 0)->paginate(10);
        return view('admin.Bill.bills', \compact('bills'));
    }
    public function order_done()
    {
        $bills = Bill::where('da_thanh_toan', '<>', 0 )->paginate(10);
        return view('admin.Bill.bills', \compact('bills'));
    }
    public function bill_chot($id)
    {
        $bill = BillDetail::find($id);
        $bill->status = '1';
        $bill->update();
        Session::put('message','Chốt đơn mã'. $bill->id .' thành công');
        return \redirect('admin/bills');

    }
    public function bill_thanh_toan($id)
    {
        $bill_detail = BillDetail::find($id);
        $bill_detail->status = '2';
        $bill_detail->update();
        $bill = Bill::find($id);
        $bill->da_thanh_toan = 100;
        $bill->update();
        Session::put('message','Đơn hàng mã'. $bill->id .' đã giao thành công');
        return \redirect('admin/bills');   
    }
    public function delete($id)
    {   dd($Id);
        Category::delete($id);
        Session::put('message','Hủy hóa đơn thành công');
        return Redirect::to('admin/bills');
    }
    public function detail($id)
    {
        $bill = Bill::findOrFail($id);
        return view('admin.Bill.detail_bill', \compact('bill'));
    }
}
