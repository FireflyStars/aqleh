<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\ResetPassword;
use App\User;
use App\Project;
use App\Client;
use App\News;
use App\Contact;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->except(['login', 'doLogin', 'showRequestResetPasswordForm', 'sendRequestResetPassword', 
        'showPasswordReset', 'doPasswordReset']);
    }

    /**
     * show dashboard for admin
     */
    public function showDashboard(){
        $user = User::find(1);
        session()->put('user', $user);
        $project_counts = Project::count();
        $client_counts = Client::count();
        $news_counts = News::count();
        $contact_counts = Contact::count();
        return view('backend.dashboard', [
                        'user'=> $user,
                        'project_counts'=> $project_counts, 
                        'client_counts' =>$client_counts,
                        'news_counts' =>$news_counts,
                        'contact_counts' =>$contact_counts,
                        ]);
    }

    /**
     * Show Login Form
     */
    public function login(){
        return view('auth.login');
    }

    /**
     * check login credential and if it is valid login as admin
     */
    public function doLogin(Request $request){
        $validator = $this->getValidator($request->all());
        if ($validator->fails()) {
            return redirect()->route('show-login')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            $user = User::where('email', $request->email)->first();
            if($user->email == $request->email){
                if (Hash::check($request->password, $user->password)) {
                        session(['admin'=> true]);
                        return redirect()->route('dashboard');
                }else{
                    $validator->errors()->add('password_erro', 'Password is Invalid');
                    return redirect()->route('show-login')
                            ->withErrors($validator)
                            ->withInput();                    
                }
            }else{
                $validator->errors()->add('email_erro', 'Email does not exists');
                return redirect()->route('show-login')
                        ->withErrors($validator)
                        ->withInput();
            }
        }

        return redirect()->route('dashboard');
    }

    /**
     * Get Validator for login credintial
     */
    public function getValidator($data){
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required', 'string'],
        ]);
    }    
    /**
     * Logout
     */
    public function logout(){
        session()->forget('admin');
        return redirect()->route('home');
    }    

    /**
     * Send password reset request email
     */
    public function showRequestResetPasswordForm(){
        return view('auth.request_reset');
    }

    public function sendRequestResetPassword(Request $request){
        Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
        ])->validate();
        $token =  Str::str_randon(50);
        $token = Hash::make($token);
        Mail::to($request->email)->send(new ResetPassword($token));
        if (Mail::failures()){
            $request->session()->flash('failed', true);        
            return redirect()->back();
        }else{
            $request->session()->put('token', $token);        
            $request->session()->flash('success', true);        
            return redirect()->back();
       }           
    }

    /**
     *  Check token is valid or not.
     *  If the token is valid show reset form.
     *  Otherwise show resend request form for password reset.
     * */
    public function showPasswordReset(Request $request, $token){
        if($request->session()->has('token')){
            if( Hash::check($token, $request->session()->get('token'))){
                return view('auth.reset');
            }else{
                return view('auth.reset_invalid' ,['token_status', 1]);
            }
        }else{
            return view('auth.reset_invalid', ['token_status', 2]);
        }
    }
    /**
     * Password Reset as New password
     */
    public function doPasswordReset(Request $request){
        $request->validate([
            'password'=>'required|confirmed'
        ]);
        $new_pass = Hash::make($request->password);
        $user =  User::find(1);
        $user->password = $new_pass;
        $user->save();
        return view('auth.login');
    }
}
