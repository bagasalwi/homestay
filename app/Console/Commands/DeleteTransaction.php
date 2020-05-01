<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Transaction;
use App\Kamar;
use App\Payment;
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
        $transaction = Transaction::where('transaction_status', '!=', 'P')
            ->Where('transaction_status', '!=', 'A')                
            ->Where('transaction_status', '!=', 'R')
            ->Where('created_at', '<', Carbon::now()->subMinutes(5))->get();

        if($transaction){
            foreach($transaction as $t){
                echo $t->created_at . ' deleted after ' . Carbon::now()->subHours(5)->toDateTimeString() . '|';

                Transaction::where('user_id', $t->user_id)->delete();

                Kamar::where('transaction_id', $t->id)->update([
                    'user_id' => NULL,
                    'transaction_id' => NULL,
                    'end_date' => null,
                    'start_date' => null,
                ]);

                Payment::where('transaction_id', $t->id)->delete();
            }
        }else{
            echo 'No Data Entry';
        }
    }
}
