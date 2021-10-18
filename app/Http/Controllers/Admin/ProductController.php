<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductAdminService;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $productService;
    public function __construct(ProductAdminService $productService)
    {
        $this->productService=$productService;
    }
    public function index()
    {
      return view('admin.product.list',[
          'title' =>'Danh sách món ăn',
          'products' => $this->productService->getList()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.product.add',[
            'title'=>'Thêm món ăn',
            'menus'=>$this->productService->getMenu()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->productService->insert($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param
     * @return
     */
    public function show(Product $product)
    {
        return view('admin.product.edit',[
            'title' =>'Chỉnh sửa thông tin món ăn',
            'product' =>$product,
            'menus'=>$this->productService->getMenu()
        ]);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param
     * @param
     * @return
     */
    public function update(Request $request, Product $product)
    {
      $result =  $this->productService->update($request,$product);
      if ($result){
          return redirect('/admin/product/list');
      }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Request $request)
    {
          $this->productService->delete($request);
        if ($request){
            return response()->json([
                'error'=>false,
                'messages'=>'Xoá thành công'
            ]);
        }
        return response()->json([
            'error'=>true
        ]);
    }
}
