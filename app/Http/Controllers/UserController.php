<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
Use DB;
use App\User;

class UserController extends Controller
{
    public $menu_id = 'Kelola User';

    public function __construct()
    {
        $this->middleware(['auth','verified','CheckRole']);
    }
    
    public function index(){

        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 
                
        //url
        $data['url_show'] = 'user/show';
        $data['url_delete'] = 'user/delete';

        //database call
        $data['user'] = User::all(); 

        return view('back.user.user_list',$data);
    }

    public function show($id){
        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 

        // database call
        $data['user'] = User::where('id', $id)->first();

        if($data['user']->nik){
            $data['user']->identity1 = 'NIK';
            $data['user']->identity2 = $data['user']->nik;
        }else if($data['user']->paspor){
            $data['user']->identity1 = 'Paspor';
            $data['user']->identity2 = $data['user']->paspor;
        }

        return view('back.user.user_form', $data);
    }

    

}
