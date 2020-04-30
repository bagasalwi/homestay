<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
use DB;
use Image;
use File;

class KamarDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','CheckRole']);
    }

    public function createDetail(Request $request)
    {
        $this->validate($request, [
            'image' => 'file|image|mimes:jpeg,png,jpg|max:3048'
        ]);

        if ($request->hasFile('image')) {
            $avatar = $request->file('image');

            $filename =  $request->kamar . '_' . time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->save(public_path('custom-images/kamar_detail/' . $filename));
        }

        DB::table('kamar_details')->insert([
            'kamar_id' => $request->kamar_id,
            'image' => $filename,
            'status' => 'A',
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ]);

        return redirect('kamar/update/' . $request->kamar_id)->with('success', 'Gambar Kamar berhasil di upload!');
    }

    public function deleteDetail($id)
    {
        $kamar_detail = DB::table('kamar_details')->where('id', $id)->first();

        $usersImage = public_path("custom-images/kamar_detail/{$kamar_detail->image}"); // get previous image from folder
                if (File::exists($usersImage)) { // unlink or remove previous image from folder
                    unlink($usersImage);
                }
        
        DB::table('kamar_details')->where('id', $id)->delete();
    }
}
