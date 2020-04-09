<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Transaction;
use Carbon\Carbon;
use DB;

class DeleteTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteTransaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transaction Deleted after 24 hours';

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
        $transaction = DB::table('transactions')->where('created_at', '<=', Carbon::now()->subMinutes(1))->first();
        $kamar = DB::table('kamars')->where('user_id', $transaction->user_id)->first();
        $payment = DB::table('payments')->where('transaction_id', $transaction->id)->first();

        if($transaction){
            DB::table('transactions')->where('id', $transaction->id)->delete();
            DB::table('kamars')->where('id', $kamar->id)->update([
                'user_id' => NULL
            ]);

            if($payment){
                DB::table('payments')->where('id', $payment->id)->delete();
            }
            
            echo 'Success Deleted';
        }else{
            echo 'No Data Entry!';
        }
    }
}
