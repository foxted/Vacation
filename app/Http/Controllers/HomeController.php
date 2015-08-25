<?php

namespace WiderFunnel\Http\Controllers;

use Illuminate\Http\Request;

use WiderFunnel\Http\Requests;
use WiderFunnel\Http\Controllers\Controller;

/**
 * Class HomeController
 * @package WiderFunnel\Http\Controllers
 */
class HomeController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }
    
}
