<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Transaction;
use App\Kamar;
use Carbon\Carbon;
use DB;

class DeleteRenewTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteRenewTransaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete transaction not renewed after 3 days end-date';

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
        $transaction1 = Transaction::where('transaction_status', 'R')->get();        

        if($transaction1 != null){
            foreach($transaction1 as $t){
                $id = $t->id;
                $user_id = $t->user_id;
                $array = Carbon::parse($t->book_enddate)->format('Y-m-d');
            }
            
            $to = Carbon::createFromFormat('Y-m-d', $array);
            $from = Carbon::createFromFormat('Y-m-d', $now);
            $diff_in_days = $to->diffInDays($from); // mendapatkan perbedaan jangka waktu dari enddate dan now
            
            // dd($diff_in_days);
            if($diff_in_days > 2){
                echo 'Transaksi void & kamar dikosongkan karena melewati 2 hari setelah enddate';

                $kamar = Kamar::where('user_id', $user_id)->first();

                // ubah status void kepada transaksi
                Transaction::where('id', $id)->update([
                    'transaction_status' => 'V',
                    'payment_status' => 'V',
                ]);

                // karena transaksi di voidkan, kamar dikosongkan dari user
                Kamar::where('id', $kamar->id)->update([
                    'user_id' => null,
                    'end_date' => null,
                    'start_date' => null,
                ]);

            }else{
                echo 'Belum waktunya void';
            }
        }else{
            echo 'no Transaction';
        }
    }
}
