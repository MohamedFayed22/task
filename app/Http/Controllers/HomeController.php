<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Device;
use App\Driver;
use App\Group;
use App\Ticket;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Response;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }



}



