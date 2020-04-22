<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
Use DB;

class FrontController extends Controller
{    
    public function index(){
        $data['location_detail'] = DB::table('location_details')->get();
        $data['location'] = DB::table('locations')->get();

        return view('front.new-index', $data);
    }

    public function tentangkamar(){
        $data['location_detail'] = DB::table('location_details')->get();
        $data['location'] = DB::table('locations')->get();

        return view('front.tentang', $data);
    }
    
}
