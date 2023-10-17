<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{

    // GET SELECT BOX DATA QUERY
    public function clientType()
    {
        $type = DB::table('usertypes')->get();
        return view('AddNew', ['data' => $type]);
    }
}
