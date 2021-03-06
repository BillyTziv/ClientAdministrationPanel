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
        $result=DB::update("UPDATE clients SET `clientId`=?, `clientFirstname`=?, `clientSurname`=?, `clientEmail`=?, `clientMobile`=?, `is_active`=? WHERE `clientId`='" . $request->input('selRowId') ."'", [
        $request->input('clientId'),
        $request->input('clientFirstname'),
        $request->input('clientSurname'),
        $request->input('clientEmail'),  
        $request->input('clientMobile'),
        $request->input('isActive')]);

        if($result == 1) {
            return view('home');
        }else {
            echo "Oups, something went wrong. Contact the administrator at email: vtzivaras[at]gmail[dot]com or tel: 6940361613. </br>";
            echo "Client Id: " . $request->input('clientId') . "</br>";
            echo "Client FirstName: " . $request->input('clientFirstname') . "</br>";
            echo "Client LastName: " . $request->input('clientSurname') . "</br>";
            echo "Client Email: " . $request->input('clientEmail') . "</br>";
            echo "Client Mobile: " . $request->input('clientMobile') . "</br>";
            echo "Client Active: " . $request->input('isActive') . "</br>";

            echo "Number of affected rows: " . $result . "</br>";
        }
    }
}
