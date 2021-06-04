<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\User;
use Auth;
use Carbon\Carbon;
use Cache;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if (Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(2);

            Cache::put('user-is-online' . Auth::user()->id, true, $expiresAt);
        }

        $user = User::all();
        $key = $request->search;
        $product = Product::where('name', 'like', '%' . $key . '%')->paginate(
            3
        );

        return view(
            'auth.admin.product.ListProduct',
            ['products' => $product],
            ['users' => $user]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = Category::all();
        $role = Auth::User();

        return view(
            'auth.admin.product.create',
            ['categories' => $category],
            ['roles' => $role]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, product $product)
    {
        $request->validate([
            'name' => 'required|min:5',
            'price' => 'required|min:5',
            'descripsion' => 'required|min:10',
        ]);

        if (
            Auth::user()->role->name == 'admin' &&
            isset($_POST['show_on_home'])
        ) {
            $product->show_on_home = $request->show_on_home;
        }

        if ($request->hasFile('image')) {
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis') . rand(1, 9999) . '.' . $ext;
            $request->image->storeAs('/public/products', $file);
        } else {
            $file = '';
        }
        $product->user_id = Auth::user()->id;
        $product->category_id = $request->category_id;
        $product->image = $file;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->descripsion = $request->descripsion;
        $product->save();
        $notification = [
            'message' => 'Đã Tạo sản phẩm',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('product.index')
            ->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(request $request, $id)
    {
        //
        // $product = Product::find($id);
        // print_r ($product->category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $product = product::findOrFail($id);
        $category = Category::all();
        $role = Auth::User();

        if (
            Auth::user()->role->name == 'admin' ||
            $product->user_id == Auth::user()->id
        ) {
            return view('auth.admin.product.edit', [
                'product' => $product,
                'categories' => $category,
                'roles' => $role,
            ]);
        } else {
            $notification = [
                'message' =>
                    'Bạn không phải là admin hoặc người đăng sản phẩm này nên không có quyền sửa',
                'alert-type' => 'error',
            ];
            return back()->with($notification);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'name' => 'required|min:5',
            'price' => 'required|min:5',
            'descripsion' => 'required|min:10',
        ]);

        if (
            Auth::user()->role->name == 'admin' &&
            isset($_POST['show_on_home'])
        ) {
            $product->show_on_home = $request->show_on_home;
        } else {
            $product->show_on_home = 0;
        }
        if (
            isset($request->image) &&
            $request->image->getClientOriginalName()
        ) {
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis') . rand(1, 9999) . '.' . $ext;
            $request->image->storeAs('public/products', $file);
        } else {
            if (!$product->image) {
                $file = '';
            } else {
                $file = $product->image;
            }
        }
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $file;
        $product->descripsion = $request->descripsion;
        $product->save();
        $notification = [
            'message' => 'cập nhật sản phẩm thành công',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('product.index')
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = product::findOrFail($id);
        if (
            Auth::user()->role->name == 'admin' ||
            $product->user_id == Auth::user()->id
        ) {
            Product::destroy($id);
            return redirect()->route('product.index');
        } else {
            $notification = [
                'message' =>
                    'Bạn không phải là admin hoặc người đăng sản phẩm này nên không có quyền xóa',
                'alert-type' => 'error',
            ];
            return back()->with($notification);
        }
    }
    public function hotProduct(Request $request)
    {
        return response()->json(
            Product::where('show_on_home', true)
                ->limit(10)
                ->get()
        );
    }
    public function Product(Request $request)
    {
        return response()->json(
            Product::get()
        );
    }
    public function showcategories(Request $request)
    {
        return response()->json(Category::get());
    }
    public function show_product_category($id)
    {
        return response()->json(Product::where('category_id', $id)->get());
    }
    public function ProductDetail($id)
    {
        return response()->json(Product::find($id));
    }
}
