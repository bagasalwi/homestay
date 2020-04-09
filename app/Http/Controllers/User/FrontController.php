<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
Use DB;

class FrontController extends Controller
{    
    public function index(){
        $data['location_detail'] = DB::table('location_details')->get();
        $data['location'] = DB::table('locations')->get();

        return view('front.new-index', $data);
    }

    public function tentangkamar(){
        $data['location_detail'] = DB::table('location_details')->get();
        $data['location'] = DB::table('locations')->get();

        return view('front.tentang', $data);
    }

    public function pilihjenis(){
        $data['title'] = 'Kontrakan';
        $data['sub_title'] = 'Jenis Kamar';
        $data['jeniskamar'] = DB::table('jeniskamars')->get();

        return view('front.pilih-jenis', $data);
    }

    public function pilihkamar($id){
        $data['title'] = 'Kontrakan';
        $data['sub_title'] = 'Jenis Kamar';
        $jeniskamar = DB::table('jeniskamars')->where('id', $id)->first();

        $data['kamar'] = DB::table('kamars')->where('jeniskamar_id', $jeniskamar->id)->get();

        return view('front.pilih-kamar', $data);
    }

    public function kamar_detail($id){
        $data['title'] = 'Kamar Detail';
        $data['sub_title'] = 'Kamar Detail';

        // $data['jenis_kamar'] = DB::table('jeniskamars')->where('id', $kamar->id)->get();
        $data['kamar'] = DB::table('kamars')
            ->join('locations', 'kamars.location_id', '=', 'locations.id')
            ->join('jeniskamars', 'kamars.jeniskamar_id', '=', 'jeniskamars.id')
            ->select('kamars.*', 'locations.name as locationname', 'locations.description as locationdesc',
                    'jeniskamars.name as jeniskamar', 'jeniskamars.listrik' , 'jeniskamars.kamar_mandi')
            ->where('kamars.id', $id)->get();
            
        $data['kamar_detail'] = DB::table('kamar_details')->where('kamar_id', $id)->get();

        return view('front.kamar-detail', $data);
    }

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
