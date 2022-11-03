<?php

namespace App\Http\Controllers\seller;
session_start();

use App\Http\Controllers\Controller;
use App\Models\FoodType;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{




    public function store(Request $request)
    {
        $request->validate([
           'phone'=>'required|unique:restaurants',
           'address'=>'required',
        ]);

        $data['name'] = $_POST['name'];
        $data['phone'] = $_POST['phone'];
        $data['address'] = $_POST['address'];
        $data['restaurant_type'] = $_POST['restaurant_type'];
        $data['location'] = $_POST['location'];


//
        $restaurant = new Restaurant();
        $restaurant->name = $data['name'];
        $restaurant->phone = $data['phone'];
        $restaurant->address = $data['address'];
        $restaurant->restaurant_type_id = $data['restaurant_type'];
        $restaurant->latlng = $data['location'];
        $restaurant->user_id = Auth::id();
        $_SESSION['user_id'] = Auth::id();
        $restaurant->save();
    }

    public function setting($slug)
    {
        $user = Auth::user();
        $foods = DB::table('food')->where('restaurant_id',$slug)->get();
        return view('seller.showFoods',compact('foods','user'));
    }
}



//       $request->validate([
//           'name'=>'required',
//           'phone'=>'required',
//           'address'=>'required',
//        ]);
//        return $request->errors()->all();
//        return response()->json([]);
