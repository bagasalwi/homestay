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
        // $now = "2020-06-01";
        
        $transaction = Transaction::where('transaction_status', 'R')->get();
        
        if($transaction){
            foreach($transaction as $t){
                $enddate = $t->book_enddate;

                $void_date = Carbon::parse($t->book_enddate)->addDays(2)->format('Y-m-d');

                echo $void_date . ' ';

                if($now == $void_date){
                    echo 'Transaksi void & kamar dikosongkan karena melewati 2 hari setelah enddate';
        
                        // ubah status void kepada transaksi
                        Transaction::where('id', $t->id)->update([
                            'transaction_status' => 'V',
                            'payment_status' => 'V',
                        ]);

                        $kamar = Kamar::where('transaction_id', $t->id)->get();
        
                        foreach($kamar as $k){
                            // karena transaksi di voidkan, kamar dikosongkan dari user
                            Kamar::where('id', $k->id)->update([
                                'user_id' => null,
                                'end_date' => null,
                                'start_date' => null,
                                'transaction_id' => null,
                            ]);
                        }
                }else{
                    echo '- Belum waktunya void ' ;
                }
            }
        }else{
            echo 'No Transaction';
        }
    }
}
