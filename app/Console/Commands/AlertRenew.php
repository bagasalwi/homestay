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
        // $now = '2020-05-26';
        
        // echo $transaction;
        $transaction = Transaction::where('transaction_status', 'A')->get();       
        
        if($transaction != null){
            foreach($transaction as $t){
                $enddate = $t->book_enddate;
                
                $to = Carbon::createFromFormat('Y-m-d', Carbon::parse($enddate)->format('Y-m-d'));
                $from = Carbon::createFromFormat('Y-m-d', $now);
                $diff_in_days = $to->diffInDays($from); // mendapatkan perbedaan jangka waktu dari enddate dan now
                
                echo $diff_in_days . ' ';

                if($diff_in_days < 5){
                    echo 'perpanjang ';
                    Transaction::where('id', $t->id)->update([
                        'transaction_status' => 'R',
                        'payment_status' => 'R',
                    ]);
                }else{
                    echo 'belum saatnya ';
                }
            }
        }
    }
}
