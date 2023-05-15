<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    
    public function index(){
        return view('admin.pages.cabinet');
    }

    public function user_profile(){
        $id = auth()->id();
        $user =  User::findOrFail($id);
        return view('admin.pages.profile',compact('user'));
    }

    public function user_elan(){
        return view('admin.pages.elan');
    }

    public function logout()
    {
        Auth::logout();
        toastr()->info('Successfully Logout');
        return redirect()->route('index');
    }
    public function user_delete()
    {
        $id = auth()->id();
        User::findOrFail($id)->delete();
        toastr()->info('User has been deleted successfully');
        return redirect()->route('index');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            toastr()->success('Successfully Signed In');
            return redirect("user");
        }
        toastr()->error('Have A Problem, Please Check Again');
        return redirect()->back();
    }

    public function update_profile(Request $request){

        $id = auth()->id();
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone1 = $request->phone1;
        $data->password = Hash::make($request->password);
        $data->save();
        toastr()->success('Inform Changed successfullt');
        return redirect()->back();

    }

//    email gonderilen yerin functionlari
  
    public function update_password(Request $request){

        $request->validate([
            'email' => 'required',
            'password'=>'required',
            'confirm_password'=>'required',
            ]);

            $check_token = \DB::table('password_resets')->where([
                'email'=>$request->email,
                'token'=>$request->token,
            ])->first();
     
            if(!$check_token){
             toastr()->error('Something went wrong');

            return redirect()->route('index');
            }
            else{
             User::where('email',$request->email)->update([
                    'password'=>\Hash::make($request->password)
            ]);

                \DB::table('password_resets')->where([
                    'email'=>$request->email
                ])->delete();

            toastr()->success('Your password has been changed successfully');
                return redirect()->route('index')->with('verifiedEmail',$request->email);
            }
    }

    public function forgot_password(Request $request){
        
        $request->validate([
            'email'=>'required'
        ]);
        $token=\Str::random(64);
        \DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);
        $action_link = route('user.reset.password.form',['token'=>$token,'email'=>$request->email]);
        $body = 'We have received to reset the password '.$request->email.' it was you';

        \Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body],function($message) use ($request){
            $message->from('firengizsariyeva77@gmail.com');
            $message->to($request->email,'Rent Al')->subject('Reset Password');
        });
        toastr()->success('We have send your email to reset password');
        return redirect()->back();
    }
    public function showresetform(Request $request,$token = null){
        return view('admin.pages.password')->with(['token'=>$token,'email'=>$request->email]);
    }




}
