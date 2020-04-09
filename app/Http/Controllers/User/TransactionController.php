<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
use DB;
use Image;
use File;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','CheckProfile']);
    }
    
    public function dashboard()
    {
        // //sidebar
        $data['title'] = 'My Dashboard';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();

        return view('front.user.index', $data);
    }

    public function PesanKamar(Request $request)
    {
        $user = Auth::user();

        $kamar = DB::table('kamars')->where('id', $request->kamar_id)->first();
        
        if ($kamar->user_id) {
            return redirect()->back();
        } else {
            DB::table('kamars')->where('id', $request->kamar_id)->update([
                'user_id' => $user->id,
            ]);

            $transaction = Transaction::create([
                'user_id' => $user->id,
                'kamar_id' => $request->kamar_id,
                'transaction_date' => Carbon::now(),
                'transaction_price' => $kamar->harga,
                'transaction_status' => 'N', //Not Yet completed
                'payment_status' => 'N'
            ]);

            $payment = Payment::create([
                'transaction_id' => $transaction->id,
                'payment_status' => 'N'
            ]);
            
            return redirect('list-transaksi/'. $transaction->id);
        }
    }

    public function TransaksiList()
    {
        $data['title'] = 'List Transaksi';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();
        
        $data['transaction'] = Transaction::get();

        $data['url_create'] = 'sidebar/create';
        $data['url_edit'] = 'list-transaksi';
        $data['url_delete'] = 'sidebar/delete';

        return view('front.user.transaksi_list', $data);
    }

    public function TransaksiListDetail($id)
    {
        // //sidebar
        $data['title'] = 'List Transaksi';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();

        $user = Auth::user();

        // $data['transaction'] = Transaction::get()->where('user_id', $user->id);

        $data['transaction'] = DB::table('transactions')
            ->join('kamars', 'transactions.kamar_id', '=', 'kamars.id')
            ->join('locations', 'kamars.location_id', '=', 'locations.id')
            ->join('jeniskamars', 'kamars.jeniskamar_id', '=', 'jeniskamars.id')
            ->select(
                'transactions.*',
                'kamars.name as kamarname',
                'kamars.description as kamardesc',
                'locations.name as locationname',
                'locations.description as locationdesc',
                'jeniskamars.name as jeniskamar',
                'jeniskamars.listrik',
                'jeniskamars.kamar_mandi'
            )
            ->where('transactions.id', $id)
            ->get();

        // dd($data['transaction']);

        $data['url_bayar'] = '';
        $data['url_cancel'] = 'cancelkamar';
        $data['url_bayar'] = '';

        return view('front.user.transaksi_detail', $data);
    }

    public function TentukanTanggal(Request $request)
    {
        $now = Carbon::yesterday()->setTime(0, 0, 0);
        $this->validate($request, [
            'tanggal' => 'required|after:'.$now,
        ]);

        Transaction::where('id', $request->transaction_id)
            ->update([
                'book_startdate' => $request->tanggal,
                'book_enddate' => Carbon::parse($request->tanggal)->addDays(30),
                'transaction_status' => 'C',
                'payment_status' => 'C',
            ]);
        Payment::where('transaction_id', $request->transaction_id)
            ->update([
                'payment_status' => 'C'
            ]);

        return redirect('list-transaksi/' . $request->transaction_id)->with('success', 'Tanggal Kamar di konfirmasi!');
    }

    public function CancelKamar($id)
    {
        $transaction = DB::table('transactions')->where('id', $id)->first();
        $kamar = DB::table('kamars')->where('id', $transaction->kamar_id)->first();
        $payment = DB::table('payments')->where('transaction_id', $transaction->id)->first();

        if ($payment) {
            DB::table('payments')->where('id', $payment->id)->delete();
        }
        DB::table('kamars')->where('id', $kamar->id)->update([
            'user_id' => null,
        ]);

        DB::table('transactions')->where('id', $transaction->id)->delete();
    }

    public function BayarKamar($id)
    {
        $data['title'] = 'Status Kamar';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();
        
        $transaction = Transaction::with('payment.transaction')->find($id);
        $data['transaction'] = $transaction->first();
        $data['payment'] = $transaction->payment->first();
        $data['kamar'] = $transaction->kamar;
        $data['user'] = $transaction->user; //This will return the user model that the kamar belongs to.

        // $payment = Payment::where('transaction_id', 7)->first();
        // dd($payment->bukti_transfer);
        return view('front.user.bayarkamar', $data);
    }

    public function KonfirmasiPembayaran(Request $request)
    {
        $this->validate($request, [
            'bukti_transfer' => 'required|file|image|mimes:jpeg,png,jpg|max:3048'
        ]);
        // dd($request);
        $payment = Payment::where('transaction_id', $request->transaction_id)->first();
        $user = Auth::user();

        Transaction::where('id', $request->transaction_id)
            ->update([
                'transaction_status' => 'P',
                'payment_status' => 'P',
            ]);
        
        if ($request->hasFile('bukti_transfer')) {
            $avatar = $request->file('bukti_transfer');

            $filename = 'BuktiTransfer' . '_' . $user->name . '_' . $user->nik . '.' . $avatar->getClientOriginalExtension();

            // Delete current image before uploading new image
            if ($payment->bukti_transfer !== null) {
                $usersImage = public_path("bukti-transfer/{$user->attachment}"); // get previous image from folder
                if (File::exists($usersImage)) { // unlink or remove previous image from folder
                    unlink($usersImage);
                }
            }

            Image::make($avatar)->save(public_path('bukti-transfer/' . $filename));
            // $user->attachment = $filename;
        }

        Payment::where('transaction_id', $request->transaction_id)
            ->update([
                'nama_transfer' => $request->nama_transfer,
                'bank_transfer' => $request->bank_transfer,
                'rekening_transfer' => $request->rekening_transfer,
                'bukti_transfer' => $filename,
                'payment_status' => 'P'
            ]);

        return redirect('bayarkamar/' . $request->transaction_id)->with('success', 'Bukti transfer berhasil!');
    }

    public function StatusKamar()
    {
        $data['title'] = 'Status Kamar';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();
        
        $data['transaction'] = Transaction::where('transaction_status', 'R')
                                ->orWhere('transaction_status', 'A')
                                ->latest('updated_at')->get();

        // dd($data['transaction']);
        $data['url_create'] = 'sidebar/create';
        $data['url_edit'] = 'list-transaksi';
        $data['url_delete'] = 'sidebar/delete';

        return view('front.user.statuskamar', $data);
    }

    public function PerpanjangKamar($id)
    {
        $data['title'] = 'Status Kamar';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();

        $trans_latest = Transaction::where('id', $id)->first();
        
        $transaction = Transaction::create([
            'user_id' => $trans_latest->user_id,
            'kamar_id' => $trans_latest->kamar_id,
            'book_startdate' => $trans_latest->book_enddate,
            'book_enddate' => Carbon::parse($trans_latest->book_enddate)->addDays(30),
            'transaction_date' => Carbon::now(),
            'transaction_price' => $trans_latest->transaction_price,
            'transaction_status' => 'C', //Not Yet completed
            'payment_status' => 'C'
        ]);

        Payment::create([
            'transaction_id' => $transaction->id,
            'payment_status' => 'C'
        ]);

        return redirect('list-transaksi/' . $transaction->id);
    }
}
