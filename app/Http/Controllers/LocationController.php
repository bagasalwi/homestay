<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
Use DB;
Use App\Location;
Use App\Location_detail;
Use File;

class LocationController extends Controller
{
    public $menu_id = 'Lokasi';

    public function __construct()
    {
        $this->middleware(['auth','verified','CheckRole']);
    }

    public function index(){

        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 
        
        $data['location_array'] = DB::table('locations')->get(); 
        //url
        $data['url_create'] = 'location/create';
        $data['url_update'] = 'location/update';
        $data['url_delete'] = 'location/delete';

        return view('back.location.location_list',$data);
    }

    public function create(){
        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 
        $data['location'] = DB::table('locations')->where('status', 'A')->get();
        $data['state'] = 'create';

        $fields = [
            (object) [
                'id' => 0,
                'name' => '',
                'description' => '',
                'status' => '',
            ]
        ];

        $data['fields'] = collect($fields);
        // dd($data['fields']);
        
        return view('back.location.location_form', $data);
    }

    public function update($id){
        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 
        $data['state'] = 'update';

        $data['fields'] = DB::table('locations')->where('id', $id)->get();
        $data['detail'] = DB::table('location_details')->where('location_id', $id)->get();
        // dd($data['fields']);

        return view('back.location.location_form', $data);
    }

    public function save(Request $request){

        // dd($request);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        if($request->state == 'create'){
            DB::table('locations')->insert([
                'name' => $request->name,
                'description' => $request->description,
                'status' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => NULL,
            ]);
        }else if($request->state == 'update'){
            DB::table('locations')->where('id', $request->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);
        }
        
        return redirect('location');
    }

    public function delete($id){
        $location_detail = Location_detail::where('location_id', $id)->get();

        foreach($location_detail as $detail){
            $path = public_path("custom-images/location/{$detail->image}");
        
            if (File::exists($path))
            {
                File::delete($path);
            }
        }
        Location_detail::where('location_id', $id)->delete();
        Location::where('id', $id)->delete();
    }

    public function approve($id){
        DB::table('locations')->where('id', $id)->update([
            'status' => 'A',
        ]);
    }

}
