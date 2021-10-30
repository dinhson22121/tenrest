<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Service\UI\UIService;
use App\Models\c;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.login',[
            'title' =>'Đăng nhập hệ thống'
        ]);
    }

    protected $uiservice;
    public function __construct(UIService $uiservice)
    {
        $this->uiservice = $uiservice;
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' =>'required'
            ]);

        if (Auth::attempt([
                'email'=> $request->input('email'),
                'password' => $request->input('password'),
                'Is_admin' =>'1',
            ],$request->input('remember')))
        {
            Session::put('email', $request->input('email'));
            Session::put('Is_admin', $request->input('Is_admin'));
            return  redirect('/admin');
        }

        else if (Auth::attempt([
                'email'=> $request->input('email'),
                'password' => $request->input('password'),
                'Is_admin' =>'0',
            ],$request->input('remember')))
        {
            Session::put('email', $request->input('email'));
            Session::put('Is_admin', $request->input('Is_admin'));
                 return redirect("/user/main");
        }
        else {
            Session::flash('error', 'Tên đăng nhập hoặc Mật khẩu không đúng');
            return redirect()->back();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
}
