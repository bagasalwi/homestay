<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use DB;
use App\Transaction;
use App\Payment;

class AlertRenew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AlertRenew';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = Carbon::now()->format('Y-m-d');
        
        // echo $transaction;
        $transaction1 = Transaction::where('transaction_status', 'A')->get();        

        if($transaction1 != null){
            foreach($transaction1 as $t){
                $id = $t->id;
                $array = Carbon::parse($t->book_enddate)->format('Y-m-d');
            }
    
            
            $to = Carbon::createFromFormat('Y-m-d', $array);
            $from = Carbon::createFromFormat('Y-m-d', $now);
            $diff_in_days = $to->diffInDays($from); // mendapatkan perbedaan jangka waktu dari enddate dan now
            
            echo $diff_in_days;
            if($diff_in_days < 5){
                echo 'perpanjang';
                Transaction::where('id', $id)->update([
                    'transaction_status' => 'R',
                    'payment_status' => 'R',
                ]);
            }else{
                echo 'belum saatnya';
            }
        }else{
            echo 'no Transaction';
        }
        // $diff = Carbon::now()->subDay($diff_in_days);
        
        // $transaction2 = DB::table('transactions')->where('book_enddate', '<=', $diff)->get();
        
    }
}
