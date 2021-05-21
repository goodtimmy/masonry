<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $array =  DB::table('images')
            ->leftJoin('users', 'images.id_user', '=', 'users.id')
            ->select('images.*', 'users.email')
            ->where('images.verified', '=' , '1')
            ->get();

        return view('main', ['images' =>  $array]);
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
