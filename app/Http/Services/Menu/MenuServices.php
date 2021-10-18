<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use http\Env\Request;
use Illuminate\Support\Facades\Session;

class MenuServices
{
    public function get(){
        return Menu::orderBy('id')->get();
    }


    public function create($request){
        try {
            Menu::create([
                'name'=>(string) $request->input('danhmuc'),
                'detail'=>(string) $request->input('detail'),
                'is_deleted'=>'1'
            ]);
            Session::flash('success','Thêm thành công');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request){
        $id = (int) $request->input('id');
        $menu = Menu::where('id',$id)->first();

        if ($menu){
            return Menu::where('id',$id)->delete();
        }
        return false;
    }

    public function update($request,$menu):bool{
        $menu->name =(string) $request->input('danhmuc');
        $menu->detail =(string) $request->input('detail');
        $menu->save();
        Session::flash('success','Cập nhật thành công');
        return true;
    }

}
