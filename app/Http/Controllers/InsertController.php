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

        // Insert new client
        $result=DB::insert("INSERT INTO clients(`clientId`, `clientFirstname`, `clientSurname`, `clientEmail`, `clientMobile`) VALUES(?, ?, ?, ?, ?)", [
        $request->input('clientId'),
        $request->input('clientFirstname'),
        $request->input('clientSurname'),
        $request->input('clientEmail'),
        $request->input('clientMobile')]);

        // Insert new company
        $resultCompanies=DB::insert("INSERT INTO companies(`client_id`, `name`, `type`, `phone`, `email`, `location`, `website`, `comments`) VALUES(?, ?, ?, ?, ?, ?, ?, ?)", [
        $request->input('clientId'),       
        $request->input('companyName'),
        $request->input('companyType'),
        $request->input('clientPhone'),
        $request->input('companyEmail'),
        $request->input('clientAdrress'),
        $request->input('websiteURL'),
        $request->input('comments')]);

        // Find the laster company ID and increase by one
        $latestID = DB::select('select id from companies order by id DESC');
        $newCompanyId = (int)$latestID[0]->id;

        $resultServices=DB::insert("INSERT INTO services(`company_id`, `name`, `type`, `renew_date`, `total_cost`, `balance`, `deposit`, `maintenance_cost`, `comments`, `client_id`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
        $newCompanyId,       
        $request->input('serviceName'),
        $request->input('services'),
        $request->input('renewDate'),
        $request->input('totalPrice'),
        $request->input('balance'),
        $request->input('deposit'),
        $request->input('serverPrice'),
        $request->input('comments'),
        $request->input('clientId')]);

        if( ($result == 1) && ($resultCompanies == 1) && ($resultServices == 1) ) {
            echo "New client added to the database. You can go back now.";
            ?><form action="/home" method="get">
                <input type="submit" value="Go back" />
            </form><?php
        }else {
            echo "Oups, something went wrong. Contact the administrator.";
        }
    }
}
