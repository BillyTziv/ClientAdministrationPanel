<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsertNewCompanyController extends Controller
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
        return view('insertNewCompany');
    }

    public function insertNewCompany(Request $request)
    {
        $res=DB::insert("INSERT INTO companies(`client_id`, `name`, `type`, `phone`, `email`, `location`, `website`, `comments`)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?)", [
        $request->input('clientSelected'),
        $request->input('companyName'),
        $request->input('companyType'),
        $request->input('companyPhone'),
        $request->input('companyEmail'),
        $request->input('companyAddress'),
        $request->input('websiteURL'),
        $request->input('comments')]);

        if( $res == 1 ) {
            echo "New company successfully inserted! You can go back now.";
            ?>
            
            <form action="/home" method="get">
                <input type="submit" value="Go back" />
            </form>
            
            <?php
        }else {
            echo "Oups, something went wrong. Contact the administrator.";
        }
    }
}
