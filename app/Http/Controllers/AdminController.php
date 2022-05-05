<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user(){
        $users = User::all();
        return view('admin.users' , compact('users'));
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.all');
    }

    public function foodmenu(){
        $foods = Food::all();
        return view('admin.foodmenu' , compact('foods'));
    }
    public function uploadFood(Request $request){
        $data = new Food;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage' , $imagename);
        $data->image = $imagename;
        $data ->title = $request->title;
        $data ->price = $request->price;
        $data ->description = $request->des;
        $data->save();
        return redirect()->back();

    }

    public function deletFood($food_id){
        $food = Food::find($food_id);
        $food->delete();
        return redirect()->back();
    }

    public function updateFood($food_id){
        $food = Food::find($food_id);
        return view('admin.updateView' , compact('food'));
    }

    public function update(Request $request , $food_id){
        $food = Food::find($food_id);
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage' , $imagename);
        $food->image = $imagename;
        $food ->title = $request->title;
        $food ->price = $request->price;
        $food ->description = $request->des;
        $food->save();
        return redirect()->back();
    }
}
