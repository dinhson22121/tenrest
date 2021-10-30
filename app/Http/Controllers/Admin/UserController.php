<?php

namespace App\Http\Controllers\Admin;

use App\Http\Service\UI\UIService;

class UserController
{
    protected $uiservice;
    public function __construct(UIService $uiservice)
    {
        $this->uiservice = $uiservice;
    }
    public function index(){
        return view('user.UI',[
            'title'=>'User page',
            'users'=>$this->uiservice->get(),
        ]);
    }
}
