<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function hello()
    {
        echo "HELLO WORLD!";
    }
}
