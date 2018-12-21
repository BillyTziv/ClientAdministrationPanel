<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
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
        $selId = $request->rowId;
        echo $selId;
        $data = DB::select("SELECT * FROM clients WHERE `clientId`='" . $selId . "'");
        $data[0]->selRow = $selId;
        //print_r ((array)$data[0]);
        return view('update')->with((array)$data[0]);
    }

    public function updateClient(Request $request) {
        $newDate = $request->input('renewDate');
        
        //echo "START: " . $newDate;

        // Transform date to the proper format
        $repDate = str_replace('/', '-', $newDate);
        $transDate = date('Y-m-d', strtotime($repDate));
        //echo "END: " . $transDate;


        $result=DB::update("UPDATE clients SET `clientId`=?, `clientFirstname`=?, `clientSurname`=?, `clientEmail`=?, `clientMobile`=? WHERE `id`='" . $request->input('selRowId') ."'", [
        $request->input('clientId'),
        $request->input('clientFirstname'),
        $request->input('clientSurname'),
        $request->input('clientEmail'),
        $request->input('clientMobile')]);

        if($result == 1) {
            return view('home');
        }else {
            echo "Oups, something went wrong. Contact the administrator at email: vtzivaras[at]gmail[dot]com or tel: 6940361613.";
        }
    }
}
