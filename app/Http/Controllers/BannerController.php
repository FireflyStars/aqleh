<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Banner;
use File;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function __construt(){
        $this->middleware('admin');
    }

    /**
     * show adding Banner form
     */
    public function showAddForm(){
        return view('backend.banner.banneradd');
    }

    /**
     * create new service
     */
    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $banner = new Banner();
            if ($request->hasFile('image')) {
                //get filename with extension
                $filenamewithextension = $request->file('image')->getClientOriginalName();                
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $filename = str_replace(' ', '_', $filename);
                //get file extension
                $extension = $request->file('image')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.time().'.'.$extension;                

                $request->file('image')->move(public_path('images/banner/'), $filenametostore);
                $file_path = 'images/banner/'.$filenametostore;
                $banner->img_path = $file_path;
                $banner->img_url = asset($file_path);
            }
            $banner->save();
            return response()->json(true);
        }
    }

    /**
     * show selected service
     */
    public function edit(Request $request, $id){
        $banner = Banner::find($id);
        return view('backend.banner.banneredit', ['banner'=> $banner]);
    }

    /**
     * update a service
     */
    public function update(Request $request, $id){
        $banner = Banner::find($id);
        if ($request->hasFile('image')) {
            # code...
            // delte original file
            File::delete(public_path($banner->img_path));

            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();                
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();
    
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;                

            $request->file('image')->move(public_path('images/banner/'), $filenametostore);
            $file_path = 'images/banner/'.$filenametostore;
            $banner->img_path = $file_path;
            $banner->img_url = asset($file_path);
            $banner->save();
        }
        return response()->json(true);
    }

    /**
     * show all services
     */
    public function show(){
        return view('backend.banner.bannerview' , ['banners'=> Banner::paginate(16)]);
    }
    /**
     * destroy service
     */
    public function destroy($id){
        $banner = Banner::find($id);
        File::delete(public_path($banner->img_path));
        $banner->delete();
        return response()->json(true);
    }    
}
