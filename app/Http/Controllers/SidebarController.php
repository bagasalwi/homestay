<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
Use DB;

class SidebarController extends Controller
{
    public $menu_id = 'Sidebar';

    public function __construct()
    {
        $this->middleware(['auth','verified','CheckRole']);
    }
    
    public function index(){

        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 
        
        $data['sidebar_array'] = DB::table('sidebar')->get(); 
        //url
        $data['url_create'] = 'sidebar/create';
        $data['url_update'] = 'sidebar/update';
        $data['url_delete'] = 'sidebar/delete';

        return view('back.sidebar.sidebar_list',$data);
    }

    public function create(){
        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 
        $data['roles'] = DB::table('roles')->get();
        $data['state'] = 'create';

        $fields = [
            (object) [
                'IDX_Sidebar' => 0,
                'name' => '',
                'url' => '',
                'icon' => '',                
                'master' => '',
                'created_at' => '',
                'updated_at' => '',
            ]
        ];

        $data['fields'] = collect($fields);
        // dd($data['fields']);
        
        return view('back.sidebar.sidebar_form', $data);
    }

    public function update($id){
        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 
        $data['state'] = 'update';

        $data['roles'] = DB::table('roles')->get();
        $data['fields'] = DB::table('sidebar')->where('IDX_Sidebar', $id)->get();
        // dd($data['fields']);

        return view('back.sidebar.sidebar_form', $data);
    }

    public function save(Request $request){

        // dd($request);

        $this->validate($request, [
            'name' => 'required',
            'icon' => 'required',
            'url' => 'required',
        ]);

        if($request->state == 'create'){
            DB::table('sidebar')->insert([
                'name' => $request->name,
                'icon' => $request->icon,
                'url' => $request->url,
                'master' => 'Menu',
                'role_id' => $request->role_id,
                'created_at' => Carbon::now(),
                'updated_at' => NULL,
            ]);
        }else if($request->state == 'update'){
            DB::table('sidebar')->where('IDX_Sidebar', $request->IDX_Sidebar)->update([
                'name' => $request->name,
                'icon' => $request->icon,
                'url' => $request->url,
                'master' => $request->master,
                'role_id' => $request->role_id,
                'updated_at' => Carbon::now(),
            ]);
        }
        
        return redirect('sidebar');
    }

    public function delete($id){
        DB::table('sidebar')->where('IDX_Sidebar', $id)->delete();
    }

}
