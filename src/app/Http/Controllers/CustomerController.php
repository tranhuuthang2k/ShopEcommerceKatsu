<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index()
    {
        
        // echo '</pre>';
        

        
    }
    public function checkout(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gmail' => 'required',
        ]
    );
  
    
         $customer =  new customer();
        $customer->name = $request->name;
        $customer->address=  $request->address;
        $customer->phone= $request->phone; 
        $customer->gmail =  $request->gmail;
        $customer->productOrders = $request->productOrders;
        $customer->save();
       return response([
            'status' => 'success',
        ]); 
    }
    public function DeleteCustomerOrder(request $request)
    {
        $user =  customer::findOrFail($request->id);
        $user->delete();
        $notification = array(
            'message' => 'Đã Xóa Đơn Hàng',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }
}
