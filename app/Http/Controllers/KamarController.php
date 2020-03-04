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
        
        $data['kamar_array'] = DB::table('kamar')->get(); 
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
        $data['location'] = DB::table('location')->where('status', 'A')->get();
        $data['state'] = 'create';

        $fields = [
            (object) [
                'id' => 0,
                'user_id' => '',
                'name' => '',
                'description' => '',
                'number' => '',                
                'floor' => '',
                'type' => '',
                'location' => '',
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

        $data['location'] = DB::table('location')->where('status', 'A')->get();
        $data['fields'] = DB::table('kamar')->where('id', $id)->get();
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
            'type' => 'required',
            'location' => 'required',
        ]);

        if($request->state == 'create'){
            DB::table('kamar')->insert([
                'name' => $request->name,
                'description' => $request->description,
                'number' => $request->number,
                'floor' => $request->floor,
                'type' => $request->type,
                'location' => $request->location,
                'status' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => NULL,
            ]);
        }else if($request->state == 'update'){
            DB::table('kamar')->where('id', $request->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'number' => $request->number,
                'floor' => $request->floor,
                'type' => $request->type,
                'location' => $request->location,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);
        }
        
        return redirect('kamar');
    }

    public function delete($id){
        DB::table('kamar')->where('id', $id)->delete();
    }

    public function approve($id){
        DB::table('kamar')->where('id', $id)->update([
            'status' => 'R',
        ]);
    }
}
