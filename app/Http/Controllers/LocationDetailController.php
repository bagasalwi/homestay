<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;
use DB;
use Image;
use File;


class LocationDetailController extends Controller
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

            $filename =  $request->location . '_' . time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->save(public_path('front/myimages/location-image/' . $filename));
        }

        DB::table('location_detail')->insert([
            'location_id' => $request->location_id,
            'image' => $filename,
            'status' => 'A',
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ]);

        return redirect('location/update/' . $request->location_id)->with('success', 'You have successfully upload image.');
    }

    public function deleteDetail($id)
    {
        $location_detail = DB::table('location_detail')->where('id', $id)->first();

        $usersImage = public_path("front/myimages/location-image/{$location_detail->image}"); // get previous image from folder
                if (File::exists($usersImage)) { // unlink or remove previous image from folder
                    unlink($usersImage);
                }
        
        DB::table('location_detail')->where('id', $id)->delete();
    }
}
