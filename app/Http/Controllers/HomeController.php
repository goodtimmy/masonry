<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $images = Images::all()->take(10);
        $images = Images::paginate(20);

        return view('main', ['images' => $images]);
    }

    public function getList()
    {
        return Images::get();
    }
//    public function getBusyRooms(Request $request)
//    {
//        $inputs = $request->all();
//        return Images::getRoomsWithBusyBaths($inputs['date']);
//    }
}
