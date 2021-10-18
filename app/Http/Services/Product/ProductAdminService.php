<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{
    public function getMenu(){
        return Menu::orderBy('id')->get();
    }
    public function insert($request){
        try {
            Product::create($request->all());
//            Product::create([
//                'name'=>(string) $request->input('danhmuc'),
//                'detail'=>(string) $request->input('detail'),
//                'price'=>(int) $request->input('price'),
//                'image'=>(string)$request->input('image'),
//                'idRestaurant'=>1,
//                'idCategory'=>$request->input('idCategory')
//            ]);

            Session::flash('success','Thêm sản phẩm thành công');
        }catch (\Exception $exception){
            Session::flash('error','Thêm sản phẩm lỗi');
            Log::info($exception->getMessage());
            return false;
        }
        return true;
    }

    public function getList(){
        return Product::with('category')->orderBy('id')->paginate(15);
    }

    public function update( $request, $product)
    {
        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success','Thành công');
        }catch (\Exception $exception){
            Session::flash('error','Có lỗi vui lòng thử lại');
            Log::info($exception->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $product = Product::where('id',$request->input('id'))->first();
        if ($product){
            $product->delete();
            return true;
        }
        return false;
    }
}
