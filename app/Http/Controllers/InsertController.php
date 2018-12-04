<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsertController extends Controller
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
        return view('insert');
    }

    public function insertNewClient(Request $request)
    {
        $result=DB::insert("INSERT INTO clients(`clientId`, `clientFirstname`, `clientSurname`, `clientEmail`, `clientMobile`, `clientPhone`, `clientAdrress`, 
        `companyName`, `companyType`, `services`, `websiteURL`, `renewDate`, `totalPrice`, `deposit`, 
        `balance`, `serverPrice`, `comments`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
        $request->input('clientId'),
        $request->input('clientFirstname'),
        $request->input('clientSurname'),
        $request->input('clientEmail'),
        $request->input('clientMobile'),
        $request->input('clientPhone'),
        $request->input('clientAdrress'),
        $request->input('companyName'),
        $request->input('companyType'),
        $request->input('services'),
        $request->input('websiteURL'),
        $request->input('renewDate'),
        $request->input('totalPrice'),
        $request->input('deposit'),
        $request->input('balance'),
        $request->input('serverPrice'),
        $request->input('comments')]);

        if($result == 1) {
            echo "New client added to the database. You can go back now.";
            ?><form action="/home" method="get">
                <input type="submit" value="Go back" />
            </form><?php
        }else {
            echo "Oups, something went wrong. Contact the administrator.";
        }
    }
}
