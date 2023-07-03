<?php

namespace Modules\Blog\src\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Modules\Blog\Services\Facades\DemoFacade;

class IndexController
{
    public function index()
    {
        DemoFacade::setFoo(4);
        echo DemoFacade::getFooBar() . "<br>";
        DemoFacade::setBar(6);
        echo DemoFacade::getFooBar() . "<br>";


        return view('Blog::index');
    }
}
