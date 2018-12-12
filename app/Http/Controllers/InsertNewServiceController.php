<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsertNewServiceController extends Controller
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
    public function index(Request $request)
    {
        return view('insertNewService');
    }

    public function insertNewService(Request $request)
    {
        $res=DB::insert("INSERT INTO services(`company_id`, `name`, `type`, `renew_date`, `total_cost`, `balance`, `deposit`, `maintenance_cost`, `comments`, `client_id`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
        $request->input('companySelected'),   
        $request->input('serviceName'),
        $request->input('serviceType'),
        $request->input('renewDate'),
        $request->input('totalCost'),
        $request->input('balance'),
        $request->input('deposit'),
        $request->input('maintenanceCost'),
        $request->input('comments'),
        $request->input('clientSelected')]);

        if( $res == 1 ) {
            echo "New service was successfully added. You can go back now.";
            ?><form action="/home" method="get">
                <input type="submit" value="Go back" />
            </form><?php
        }else {
            echo "Oups, something went wrong when trying to insert a new service. Contact the administrator.";
        }
    }
}
