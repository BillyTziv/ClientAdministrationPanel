<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateCompanyController extends Controller
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
        $comID = $request->companyID;
        //echo $selId;
        $data = DB::select("SELECT * FROM companies WHERE `id`='" . $comID . "'");
        $data[0]->sel = $comID;
        //print_r ((array)$data[0]);
        return view('updateCompany')->with((array)$data[0]);
    }

    public function updateCompanyData(Request $request) {
        // Prepare the sql statement and execute the update query.
        $comResult=DB::update("UPDATE companies SET `id`=?, `client_id`=?, `name`=?, `type`=?, `phone`=?, `email`=?, `location`=?, `website`=?, `comments`=? WHERE `id`='" . $request->input('sel') ."'", [
        $request->input('companyId'),
        $request->input('clientId'),
        $request->input('name'),
        $request->input('type'),
        $request->input('mobile'),
        $request->input('mail'),
        $request->input('address'),
        $request->input('web'),
        $request->input('comments')]);

        // If the query succeeded and everything went OK, return the home view page else display an error with the appropriate details.
        if($comResult == 1) {
            return view('home');
        }else {
            echo "Oups, something went wrong while trying to execute the update. Contact the administrator via email at vtzivaras[at]gmail[dot]com or if its urgent via tel at +30 6940361613. Have in mind that it will help, if you mention all the steps you did.";
        }
    }
}
