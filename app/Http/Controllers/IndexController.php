<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\DemoInterface;

class IndexController extends Controller
{
    protected $id;
    public function __construct()
    {
    }
    public function index()
    {
        echo "CC";
    }
}
