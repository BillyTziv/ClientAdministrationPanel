<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
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
        //echo $selId;
        $data = DB::select("SELECT * FROM clients WHERE `id`='" . $selId . "'");
        $data[0]->selRow = $selId;
        //print_r ((array)$data[0]);
        return view('profile')->with((array)$data[0]);
    }

    
}
