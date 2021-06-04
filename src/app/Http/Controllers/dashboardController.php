<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\customer;
use  App\User;
class dashboardController extends Controller
{
    //
    public function dashboard(Request $request)
    {
        //
        $customerOrders =   customer::paginate(5);
        $count_customerOrders =0;
        foreach($customerOrders as $customerOrder)
        {
           $count_customerOrders =  $count_customerOrders  +1;

           
        }   

        $products = Product::all(); 
        $count_products =0;
        foreach($products as $product)
        {
            $count_products = $count_products +1;

           
        }      
  
        $categories = Category::all(); 
        $count_Categories =0;
        foreach($categories as $category)
        {
            $count_Categories = $count_Categories +1;
           
        }    

        $users = User::all();
        $count_Users =0;
        foreach($users as $user)
        {
            $count_Users = $count_Users +1;
           
        }    
        return view('auth.admin.dashboard',[
            'countProducts'=>$count_products,
             'count_Categories'=>$count_Categories,
             'count_Users'=>$count_Users,
             'customerOrders' => $customerOrders, 
             'count_customerOrders' => $count_customerOrders        
        ]);

    }
}
