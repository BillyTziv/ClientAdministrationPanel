<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateServiceController extends Controller
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
        echo "No row was selected!";

        //return view('update');
    }

    public function update(Request $request) {
        // Fetch model results based on id
        $serID = $request->serviceID;
        //echo $selId;
        $data = DB::select("SELECT * FROM services WHERE `id`='" . $serID . "'");
        $data[0]->sel = $serID;
        //print_r ((array)$data[0]);
        return view('updateService')->with((array)$data[0]);
    }

    public function updateServiceData(Request $request) {
        // Prepare the sql statement and execute the update query.
        $serResult=DB::update("UPDATE services SET `company_id`=?, `name`=?, `type`=?, `renew_date`=?, `total_cost`=?, `balance`=?, `deposit`=?, `maintenance_cost`=?, `comments`=?, `client_id`=?, `is_paid`=? WHERE `id`='" . $request->input('sel') ."'", [
        $request->input('company_id'),
        $request->input('name'),
        $request->input('type'),
        $request->input('renew_date'),
        $request->input('total_cost'),
        $request->input('balance'),
        $request->input('deposit'),
        $request->input('maintenance_cost'),
        $request->input('comments'),
        $request->input('client_id'),
        $request->input('services')]);

        if($serResult == 1) {
            return view('home');
        }else {
            echo "Oups, something went wrong while trying to execute the update. Contact the administrator via email at vtzivaras[at]gmail[dot]com or if its urgent via tel at +30 6940361613. Have in mind that it will help, if you mention all the steps you did.";
        }
    }
}
