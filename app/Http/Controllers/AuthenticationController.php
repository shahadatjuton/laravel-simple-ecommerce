<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Nexmo\Laravel\Facade\Nexmo;

class AuthenticationController extends Controller
{
    public function registrationForm(){
        return view('register');
    }

    public function registrationProcess(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'image'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg',
//            'email'=>'required|email|unique:users' ,
            'password'=>'required|min:6|max:20',
        ]);
        $user = new User();

        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if (isset($image)){
            $current_date = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$current_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            directory check and create
            if (!Storage::disk('public')->exists('profile')){
                Storage::disk('public')->makeDirectory('profile');
            }
//            image resize
            $image = Image::make($image)->resize(84,84)->save($image->getClientOriginalExtension());
//            Image save
            Storage::disk('public')->put('profile/'.$image_name,$image);
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->image = $image_name;
        $user->save();
//       ======================
        $response = Nexmo::message()->send([
            'to'   => '+880'.(int)$request->phone,
            'from' => 'Simple Ecommere',
            'text' => 'Your Registration completed successfully!'
        ]);
//        =====================
        Toastr::success('User Registration Successful','Sucess!!');
        return redirect()->route('login');
    }
    public function loginForm(){
        return view('login');
    }
    public function loginProcess(Request $request){
        $this->validate($request,[
           'email'=>'required|email' ,
            'password'=>'required|min:6|max:20',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::check() && Auth::user()->role->id==1){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('customer.dashboard');
            }
        }

        // authentication failed...
        Toastr::error('The Credential does not match');
        return  redirect()->back();


    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function home(){
        return view('welcome');
    }

}
