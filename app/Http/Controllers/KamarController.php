<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
Use DB;

class KamarController extends Controller
{
    public $menu_id = 'Kamar';

    public function __construct()
    {
        $this->middleware(['auth','verified','CheckRole']);
    }

    public function index(){

        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 
        
        $data['location'] = DB::table('locations')->where('status', 'A')->get();
        $data['kamar_array'] = DB::table('kamars')
            ->join('locations', 'kamars.location_id', '=', 'locations.id')
            ->join('jeniskamars', 'kamars.jeniskamar_id', '=', 'jeniskamars.id')
            ->select('kamars.*', 'locations.name as locationname', 'locations.description as locationdesc',
                    'jeniskamars.name as jeniskamar', 'jeniskamars.listrik' , 'jeniskamars.kamar_mandi')
            ->get(); 

        // dd($data['kamar_array']);

        //url
        $data['url_create'] = 'kamar/create';
        $data['url_update'] = 'kamar/update';
        $data['url_delete'] = 'kamar/delete';

        return view('back.kamar.kamar_list',$data);
    }

    public function create(){
        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 
        $data['location'] = DB::table('locations')->where('status', 'A')->get();
        $data['jeniskamar'] = DB::table('jeniskamars')->get();
        $data['state'] = 'create';

        $fields = [
            (object) [
                'id' => 0,
                'user_id' => '',
                'jeniskamar_id' => '',
                'location_id' => '',
                'name' => '',
                'description' => '',
                'number' => '',                
                'floor' => '',
                'harga' => '',
                'start_date' => '',
                'end_date' => '',
                'status' => '',
            ]
        ];

        $data['fields'] = collect($fields);
        // dd($data['fields']);
        
        return view('back.kamar.kamar_form', $data);
    }

    public function update($id){
        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 
        $data['state'] = 'update';

        $data['location'] = DB::table('locations')->where('status', 'A')->get();
        $data['jeniskamar'] = DB::table('jeniskamars')->get();

        $data['fields'] = DB::table('kamars')->where('id', $id)->get();
        $data['detail'] = DB::table('kamar_details')->where('kamar_id', $id)->get();
        // dd($data['fields']);

        return view('back.kamar.kamar_form', $data);
    }

    public function save(Request $request){

        // dd($request);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'number' => 'required',
            'floor' => 'required',
            'jeniskamar_id' => 'required',
            'location_id' => 'required',
            'harga' => 'required',
        ]);

        if($request->state == 'create'){
            DB::table('kamars')->insert([
                'jeniskamar_id' => $request->jeniskamar_id,
                'location_id' => $request->location_id,
                'name' => $request->name,
                'description' => $request->description,
                'number' => $request->number,
                'floor' => $request->floor,
                'harga' => $request->harga,
                'status' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => NULL,
            ]);
        }else if($request->state == 'update'){
            DB::table('kamars')->where('id', $request->id)->update([
                'jeniskamar_id' => $request->jeniskamar_id,
                'location_id' => $request->location_id,
                'name' => $request->name,
                'description' => $request->description,
                'number' => $request->number,
                'floor' => $request->floor,
                'harga' => $request->harga,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);
        }
        
        return redirect('kamar');
    }

    public function delete($id){
        DB::table('kamars')->where('id', $id)->delete();
    }

    public function approve($id){
        DB::table('kamars')->where('id', $id)->update([
            'status' => 'R',
        ]);
    }
}
