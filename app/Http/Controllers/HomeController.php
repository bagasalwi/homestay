<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
Use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public $menu_id = 'Dashboard';

    public function index(Request $request){

        $request->user()->authorizeRoles(['user', 'admin']);
        
        //sidebar
        $data['title'] = $this->menu_id;
        
        if($request->user()->hasAnyRole(['admin'])){
            $data['sidebar'] = DB::table('sidebar')->where('role_id', '2')->get(); 
            
            return view('back.index', $data);
            
            
        }else if($request->user()->hasAnyRole(['user'])){
            $data['sidebar'] = DB::table('sidebar')->where('role_id', '1')->get(); 
            
            return redirect('transaction', $data);
        }

        // return view('front.index', $data);
    }
}
