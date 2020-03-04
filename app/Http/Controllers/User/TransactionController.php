<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
use DB;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function dashboard()
    {

        // //sidebar
        $data['title'] = 'My Dashboard';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();

        // //url
        // $data['url_create'] = 'sidebar/create';
        // $data['url_update'] = 'sidebar/update';
        // $data['url_delete'] = 'sidebar/delete';

        return view('front.user.index', $data);
    }

    public function StatusKamar()
    {
        // //sidebar
        $data['title'] = 'Status Kamar';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();

        return view('front.user.statuskamar', $data);
    }

    public function jeniskamar()
    {
        // //sidebar
        $data['title'] = 'Kamar';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();

        return view('front.user.jeniskamar', $data);
    }

    public function detailkamar($id)
    {
        // //sidebar
        $data['title'] = 'Kamar';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();
        
        $data['location'] = DB::table('location')->where('status', 'A')->get();
        
        if($id == 'AC'){
            $data['kamar'] = DB::table('kamar')->where('type', $id)->get();
        }else if($id == 'NONAC'){
            $data['kamar'] = DB::table('kamar')->where('type', $id)->get();
        }else if($id == 'SUITES'){
            $data['kamar'] = DB::table('kamar')->where('type', $id)->get();
        }

        return view('front.user.list_jeniskamar', $data);
    }

    public function pesankamar()
    {
        // //sidebar
        $data['title'] = 'Status Kamar';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();
    }
}
