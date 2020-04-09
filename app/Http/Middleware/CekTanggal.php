<?php

namespace App\Http\Middleware;

use Closure;
use App\Transaction;
use Carbon\Carbon;
use DB;

class CekTanggal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $transaction = Transaction::first();
        if($transaction->book_startdate == NULL) { 
            return redirect(url('statuskamar'))
                    ->with(['warning' => 'Tentukan tanggal masuk terlebih dahulu!']);
          }

          return $next($request);
        
    }
}
