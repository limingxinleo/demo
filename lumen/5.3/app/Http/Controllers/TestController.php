<?php
// +----------------------------------------------------------------------
// | Demo [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lmx0536.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <http://www.lmx0536.cn>
// +----------------------------------------------------------------------
// | Date: 2017/1/17 Time: 下午1:17
// +----------------------------------------------------------------------
namespace App\Http\Controllers;

class TestController extends Controller
{
    use \App\Http\Traits\Response;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return response()->json(['name' => 'Abigail', 'state' => 'CA']);
    }

    public function view()
    {
        return view('index');
    }

    public function json()
    {
        return self::success(['id' => 1]);
    }
}