<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
Use DB;
use App\Transaction;
use App\Payment;
use App\Kamar;

class PesananController extends Controller
{
    public $menu_id = 'Pesanan';

    public function __construct()
    {
        $this->middleware(['auth','verified','CheckRole']);
    }

    public function index(){

        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 
        
        $data['transaction'] = Transaction::get();

        //url
        $data['url_edit'] = 'pesanan/edit';
        $data['url_void'] = 'pesanan/void';

        return view('back.pesanan.pesanan_list',$data);
    }

    public function edit($id){
        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 

        $data['transaction'] = Transaction::with('payment.transaction')->find($id);

        $data['url_approve'] = 'pesanan/approve';

        return view('back.pesanan.pesanan_form', $data);
    }

    public function approve($id){

        $user = Auth::user();

        $data = Transaction::where('id', $id)->first();

        Transaction::where('id', $id)
            ->update([
                'transaction_status' => 'A',
                'payment_status' => 'A',
                'approved_by' => $user->name,
                'approved_date' => Carbon::now(),
            ]);

        Payment::where('transaction_id', $id)
            ->update([
                'payment_status' => 'A',
                'approved_by' => $user->name,
                'approved_date' => Carbon::now(),
            ]);

        Kamar::where('user_id', $data->user_id)->update([
            'start_date' => $data->book_startdate,
            'end_date' => $data->book_enddate,
            'transaction_id' => $data->id,
        ]);
    }
}
