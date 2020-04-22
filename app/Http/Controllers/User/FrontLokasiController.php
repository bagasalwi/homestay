<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
Use DB;


class FrontLokasiController extends Controller
{
    public function lokasi(){

        $data['title'] = 'Lokasi';
        $data['sub_title'] = 'Lokasi Kontrakan';
        $data['location'] = DB::table('locations')->where('status', 'A')->get();

        return view('front.lokasi', $data);
    }

    public function lokasi_detail($lokasi){
        $location = DB::table('locations')->where('name', $lokasi)->first();
        $data['location'] = DB::table('locations')->where('name', $lokasi)->get();

        $data['location_detail'] = DB::table('location_details')->where('location_id', $location->id)->get();
        // dd($data['location_detail'] );

        $data['title'] = 'Lokasi';
        $data['sub_title'] = 'Lokasi Kontrakan';

        return view('front.lokasi_detail', $data);
    }
}
