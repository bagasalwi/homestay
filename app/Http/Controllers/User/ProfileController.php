<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Rules\PassConfirm;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
Use DB;
use Image;
use File;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index(){

        //sidebar
        $data['title'] = 'My Profile';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();

        // data
        $data['fields'] = Auth::user();
        $data['state'] = 'update';

        if(Auth::user()->nik){
            $data['fields']->identity1 = 'NIK';
            $data['fields']->identity2 = Auth::user()->nik;
        }else if(Auth::user()->paspor){
            $data['fields']->identity1 = 'Paspor';
            $data['fields']->identity2 = Auth::user()->paspor;
        }

        //url
        $data['url_update'] = 'myprofile/update';

        return view('front.user.myprofile', $data);
    }

    public function update(){

        //sidebar
        $data['title'] = 'My Profile';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();

        // data
        $data['fields'] = Auth::user();
        if(Auth::user()->nik){
            $data['fields']->identity2 = Auth::user()->nik;
        }else if(Auth::user()->paspor){
            $data['fields']->identity2 = Auth::user()->paspor;
        }

        // dd($data['fields']->identity2);
        $data['state'] = 'update';

        return view('front.user.myprofile_form', $data);
    }

    public function save(Request $request){
        // dd($request->attachment);
        $this->validate($request, [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'telepon' => 'required|min:6',
            'identity1' => 'in:nik,paspor',
            'identity2' => 'required|numeric|min:8',
            'national' => 'required',
            'gender' => 'required',
            'attachment' => 'file|mimes:jpeg,png,jpg',
            'password' => ['required','confirmed', new PassConfirm()]
        ]);

        // dd($request);

        $nik = '';
        $paspor = '';

        if($request->identity1 == 'nik'){
            $nik = $request->identity2;
            $paspor = '';
        }else if($request->identity1 == 'paspor'){
            $paspor = $request->identity2;
            $nik = '';
        }

        $id = Auth::user()->id;
        $user = User::find($id);

        if($request->hasFile('attachment')){
            $avatar = $request->file('attachment');
            $user = Auth::user();

            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            // Delete current image before uploading new image
            if ($user->attachment !== null) {

                $usersImage = public_path('user-attachment/' . $user->attachment); // get previous image from folder
                if (File::exists($usersImage)) { // unlink or remove previous image from folder
                    unlink($usersImage);
                }

            }

            Image::make($avatar)->save( public_path('user-attachment/' . $filename));
            $user->attachment = $filename;
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->nik = $nik;
        $user->paspor = $paspor;
        $user->telepon = $request->telepon;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->national = $request->national;
        $user->tempat_kerja = $request->tempat_kerja;
        $user->nama_kerabat = $request->nama_kerabat;
        $user->no_kerabat = $request->no_kerabat;
        $user->save();
        
        return redirect('myprofile')->with(['success' => 'Your information data successfully updated!']);
    }

    /* Update Image & Save Image Update */
    public function updateimage(){
        //sidebar
        $data['title'] = 'My Profile';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();

        //url
        $data['url_update'] = 'myprofile/update';

        return view('front.user.myprofile_image', $data);
    }

    public function saveupdateimage(Request $request){
        //sidebar
        $data['title'] = 'My Profile';
        $data['navbar'] = DB::table('sidebar')->where('role_id', 1)->get();

        $this->validate($request, [
            'profile_pic' => 'required|file|mimes:jpeg,png,jpg'
        ]);

        if($request->hasFile('profile_pic')){
            $avatar = $request->file('profile_pic');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            $user = Auth::user();

            // Delete current image before uploading new image
            if ($user->profile_pic !== 'default.png') {

                $usersImage = public_path("user-images/{$user->profile_pic}"); // get previous image from folder
                if (File::exists($usersImage)) { // unlink or remove previous image from folder
                    unlink($usersImage);
                }

            }

            Image::make($avatar)->resize(600, 600)->save( public_path('user-images/' . $filename));
            $user->profile_pic = $filename;
            $user->save();
        }

        return redirect('myprofile')->with(['success' => 'Image updated!']);
    }

}
