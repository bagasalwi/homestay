<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
Use DB;

class UserController extends Controller
{
    public $menu_id = 'Sidebar';

    public function __construct()
    {
        $this->middleware(['auth','verified','CheckRole']);
    }
    
    public function index(){

        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->get(); 
                
        //url
        $data['url_update'] = 'user/update';
        $data['url_delete'] = 'user/delete';

        //database call
        $data['user'] = DB::table('user')->get(); 

        return view('back.user.user_list',$data);
    }

    

}
