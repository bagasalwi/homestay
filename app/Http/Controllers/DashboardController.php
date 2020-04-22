<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
Use DB;
use App\User;
use App\Kamar;
use App\Transaction;

class DashboardController extends Controller
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
            $data['userCount'] = User::get()->count();

            // Kamar Count
            $data['kamarCount'] = Kamar::get()->count();
            $data['kamarKosongCount'] = Kamar::where('user_id', null)->count();

            // Transaction Count
            $data['transactionCount'] = Transaction::get()->count();
            $data['transactionLatest'] = Transaction::latest()->take(5)->get();
            $data['transactionSuccessCount'] = Transaction::where('transaction_status', 'A')->count();
            $data['transactionUnverifiedCount'] = Transaction::where('transaction_status', 'P')->count();
            $data['transactionRenewCount'] = Transaction::where('transaction_status', 'R')->count();
            $data['transactionVoidCount'] = Transaction::where('transaction_status', 'V')->count();

            // dd($userCount);
            
            return view('back.index', $data);
            
            
        }else if($request->user()->hasAnyRole(['user'])){
            $data['sidebar'] = DB::table('sidebar')->where('role_id', '1')->get(); 
            
            return redirect('transaction', $data);
        }

    }
}
