<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
use DB;
use Image;
use File;

class JenisKamarController extends Controller
{
    public $menu_id = 'Jenis Kamar';

    public function __construct()
    {
        $this->middleware(['auth','verified','CheckRole']);
    }

    public function index()
    {
        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get();
        
        $data['jeniskamar_array'] = DB::table('jeniskamars')->get();
        //url
        $data['url_create'] = 'jeniskamar/create';
        $data['url_update'] = 'jeniskamar/update';
        $data['url_delete'] = 'jeniskamar/delete';

        return view('back.jeniskamar.jeniskamar_list', $data);
    }

    public function create(){
        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 
        $data['state'] = 'create';

        $fields = [
            (object) [
                'id' => 0,
                'name' => '',
                'description' => '',
                'listrik' => '',                
                'kamar_mandi' => '',
                'thumbnail' => '',
            ]
        ];

        $data['fields'] = collect($fields);
        // dd($data['fields']);
        
        return view('back.jeniskamar.jeniskamar_form', $data);
    }

    public function update($id){
        //sidebar
        $data['title'] = $this->menu_id;
        $data['sidebar'] = DB::table('sidebar')->where('role_id', 2)->get(); 
        $data['state'] = 'update';

        $data['fields'] = DB::table('jeniskamars')->where('id', $id)->get();
        // dd($data['fields']);

        return view('back.jeniskamar.jeniskamar_form', $data);
    }

    public function save(Request $request){

        // dd($request);

        if($request->state == 'create'){

            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'listrik' => 'required',
                'kamar_mandi' => 'required',
                'thumbnail' => 'file|mimes:jpeg,png,jpg|max:3048|required'
            ]);

            if ($request->hasFile('thumbnail')) {
                $avatar = $request->file('thumbnail');
    
                $filename =  $request->name . '_' . time() . '.' . $avatar->getClientOriginalExtension();
    
                Image::make($avatar)->save(public_path('custom-images/jeniskamar/' . $filename));
            }
            
            DB::table('jeniskamars')->insert([
                'name' => $request->name,
                'description' => $request->description,
                'listrik' => $request->listrik,
                'kamar_mandi' => $request->kamar_mandi,
                'thumbnail' => $filename,
                'created_at' => Carbon::now(),
                'updated_at' => NULL,
            ]);

            return redirect('jeniskamar')->with('success', 'Jenis kamar baru berhasil dibuat!');

        }else if($request->state == 'update'){

            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'listrik' => $request->listrik,
                'kamar_mandi' => $request->kamar_mandi,
                'updated_at' => Carbon::now()
            ];

            if ($request->hasFile('thumbnail')) {

                $jeniskamar = DB::table('jeniskamars')->where('id', $request->id)->first();

                $usersImage = public_path("custom-images/jeniskamar/{$jeniskamar->thumbnail}"); // get previous image from folder
                if (File::exists($usersImage)) { // unlink or remove previous image from folder
                    unlink($usersImage);
                }

                $avatar = $request->file('thumbnail');
    
                $filename =  $request->name . '_' . time() . '.' . $avatar->getClientOriginalExtension();
    
                Image::make($avatar)->save(public_path('custom-images/jeniskamar/' . $filename));
                $data['thumbnail'] = $filename;
            }

            DB::table('jeniskamars')->where('id', $request->id)->update($data);

            return redirect('jeniskamar')->with('success', 'Jenis kamar Updated!');
        }
    }

    public function delete($id)
    {
        $jeniskamar = DB::table('jeniskamars')->where('id', $id)->first();

        $usersImage = public_path("custom-images/jeniskamar/{$jeniskamar->thumbnail}"); // get previous image from folder
        if (File::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        
        DB::table('jeniskamars')->where('id', $id)->delete();
    }

    
}
