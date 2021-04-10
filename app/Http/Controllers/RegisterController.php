<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;

class RegisterController extends Controller
{
    public function newRegister(){
        return view('new-register');
    }

    public function storeRegistrations(Request $request){
        $name = $request->name;
        $surname = $request->surname;
        $email = $request->email;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $register = new Register();
        $register->name = $name;
        $register->surname = $surname;
        $register->email = $email;
        $register->profilephoto = $imageName;
        $register->save();
        return back()->with('register_done', 'Registration record has been inserted');
    }

    public function registers(){
        $registers = Register::all();
        return view('all-registers',compact('registers'));
    }
}
