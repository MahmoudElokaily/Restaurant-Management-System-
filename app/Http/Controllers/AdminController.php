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
        return view('admin.foodmenu');
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
}
