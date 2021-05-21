<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use Illuminate\Support\Facades\Auth;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Auth::id() == true ? $verified = 1 : $verified = 0;

        $image = new Images();
        $image->id_user = Auth::id();
        $image->real_name = $request->image->getClientOriginalName();
        $image->stored_name = $imageName;
        $image->title = $request->title;
        $image->description = $request->description;
        $image->verified = $verified;
        $image->save();

        return back()
            ->with('success','You have successfully uploaded image.')
            ->with('image',$imageName);
    }
}