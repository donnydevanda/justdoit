<?php

namespace App\Http\Controllers;

use Auth;
use App\Shoe;
use Illuminate\Http\Request;

class ShoeController extends Controller
{
    function index(Request $request){
        $auth = Auth::check();
        $role = 0;
        if($auth){
            $role = Auth::user()->role;
        }
        $shoes = Shoe::where('name', 'like', "%".$request->search."%")->paginate(6);
        return view('home', ['auth' => $auth, 'role' => $role, 'shoes' => $shoes]);
    }

    function detail(Request $request, $slug){
        $auth = Auth::check();
        $role = 0;
        if($auth){
            $role = Auth::user()->role;
        }
        $shoesDetail = Shoe::where('id', $slug) -> firstOrFail();
        return view('detail', ['auth' => $auth, 'role' => $role, 'shoesDetail' => $shoesDetail]);
    }

    function cart(Request $request, $slug){
        $shoesCart = Shoe::where('id', $slug) -> firstOrFail();
        return view('cart-add')->with('shoesCart', $shoesCart);
    }

    function insertView(){
        return view('shoes-add');
    }

    function insert(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price'=> 'required|numeric|min: 100',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png'
        ]);

        Shoe::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->file('image')->store('images', 'public')
        ]);

        return redirect()->back();
    }

    function updateView(Request $request, $slug){
        $update = Shoe::where('id', $slug) -> firstOrFail();
        return view('shoes-edit')->with('update', $update);
    }

    function update(Request $request){
        $this->validate($request, [
            'id' => 'required|exists:shoes,id',
            'name' => 'required',
            'price'=> 'required|numeric|min: 100',
            'description' => 'required',
        ]);

        if($request->image != NULL){
            Shoe::where('id', $request->id)->update([
                'name'=>$request->name,
                'price'=>$request->price,
                'description'=>$request->description,
                'image' => $request->file('image')->store('images', 'public')
            ]);
        } elseif($request->image == NULL){
            Shoe::where('id', $request->id)->update([
                'name'=>$request->name,
                'price'=>$request->price,
                'description'=>$request->description,
            ]);
        }

        return redirect()->back();
    }
}
