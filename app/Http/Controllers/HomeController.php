<?php

namespace WiderFunnel\Http\Controllers;

use Illuminate\Http\Request;

use WiderFunnel\Http\Requests;
use WiderFunnel\Http\Controllers\Controller;
use WiderFunnel\VacationRequest;

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
        $vacationRequests = VacationRequest::forCurrentUser()->paginate(10);

        return view('welcome', compact('vacationRequests'));
    }
    
}
