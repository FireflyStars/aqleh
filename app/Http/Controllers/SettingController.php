<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Setting;
use App\History;
use File;

class SettingController extends Controller
{
    public function __construtor(){
        $this->middleware('admin');
    }

    public function showSettingPage(){
        $setting = Setting::find(1);
        $user = User::find(1);
        session()->put('user', $user);        
        return view('backend.setting.setting', ['setting'=>$setting]);
    }

    public function showHistoryPage(){
        $history = History::find(1);
        return view('backend.setting.history', ['history'=>$history]);
    }

    /**
    *   update password
    */
    public function updateHistory(Request $request){
        $history = History::find(1);
        $history->project = $request->project;
        $history->client = $request->client;
        $history->hour = $request->hour;
        $history->experience = $request->experience;
        $history->save();
        return response()->json(true);
    }
    /**
    *   update password
    */
    public function updatePassword(Request $request){
        $Validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'confirmed'],
            'old_password' => ['required', 'string'],
        ]);
        if ($Validator->fails()) {
            return response()->json(false);
        }else{
            $user = User::find(1);
            if(Hash::check($request->old_password, $user->password)){
                $user->password = Hash::make($request->password);
                $user->save();
                return response()->json(true);
            }else{
                return response()->json(false);
            }
        }
    }

    /**
    *   update avatar
    */
    public function updateAvatar(Request $request){
        $user = User::find(1);
        if ($request->hasFile('avatar')) {
            # code...
            // delte original file
            File::delete(public_path($user->img_path));

            //get image extension
            $name = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('assets/img/backend/user'), $name);
            $file_path = 'assets/img/backend/user/'.$name;
            
            $user->img_path = $file_path;
            $user->img_url = asset($file_path);
        }
        $user->save();
        return response()->json($name);
    }

    /**
    *   update Logo
    */
    public function updateLogo(Request $request){
        $setting = Setting::find(1);
        if ($request->hasFile('logo')) {
            # code...
            // delte original file
            File::delete(public_path($setting->logo_path));

            //get image extension
            $ext = $request->logo->extension();
            $request->file('logo')->move(public_path('assets/img/'), 'logo.'.$ext);
            $file_path = 'assets/img/'.'logo.'.$ext;
            
            $setting->logo_path = $file_path;
            $setting->logo_url = asset($file_path);
        }
        $setting->logo_title = $request->logo_title;
        $setting->logo_title_ar = $request->logo_title_ar;
        $setting->save();
        return response()->json(true);
    }
    /**
    *   update Cursor Effect
    */
    public function updateCursor(Request $request){
        $setting = Setting::find(1);
        $setting->cursor_effect = $request->cursor_effect;
        $setting->save();
        return response()->json(true);
    }

    /**
    *   update otherinformation
    */
    public function updateOtherInfo(Request $request){
        $setting = Setting::find(1);
        $setting->email = $request->email;
        $setting->address = $request->address;
        $setting->office_tel = $request->office_tel;
        $setting->fax = $request->fax;
        $setting->facebook = $request->facebook;
        $setting->linkedin = $request->linkedin;
        $setting->tweeter = $request->tweeter;
        $setting->instagram = $request->instagram;
        $setting->google_ga_code = $request->google_ga_code;
        $setting->google_web_master_code = $request->google_web_master_code;
        $setting->save();
        return response()->json(true);
    }

    /**
    *   update otherinformation
    */
    public function updateMetaInfo(Request $request){
        $setting = Setting::find(1);
        $setting->landing_meta_title = $request->meta_title;
        $setting->landing_meta_keys = $request->meta_keys;
        $setting->landing_meta_desc = $request->meta_desc;
        $setting->save();        
        return response()->json(true);
    }

}
