<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Leader;
use File;

class LeaderController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->except(['showSingleLeader']);
    }
    /**
     * show single project in frontend
     */
    public function showSingleLeader($uri){
        if (app()->getLocale() == 'en') {
            $Leader = Leader::select(['id','name','role', 'desc'])->where('name', $uri)->first();
        }else{
            $Leader = Leader::select(['id','name_ar as name', 'role_ar as role', 'desc_ar as desc'])->where('name_ar', $uri)->first();
        }
        return view('frontend.leader.leader', ['leader' => $Leader]);
    }
    /**
     * show adding leader form
     */
    public function showAddForm(){
        return view('backend.leader.leaderadd');
    }
    /**
     * Upload desc images
     */
    public function uploadDescImage(Request $request){
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
    
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
    
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
    
            //Upload File
            $request->file('upload')->move(public_path('images/leader/desc/'), $filenametostore);
    
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/leader/desc/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
    
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }        
    }
    /**
     * create new service
     */
    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            'role' => 'required',
            'role_ar' => 'required',
            'image' => 'image',
            'desc' => 'required',
            'desc_ar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $leader = new Leader();
            
            if ($request->hasFile('image')) {
                # code...
                $ext = $request->image->extension();
                $request->file('image')->move(public_path('images/leader/'), str_replace(' ', '-', $request->name).'.'.$ext);
                $file_path = 'images/leader/'.str_replace(' ', '-', $request->name).'.'.$ext;
                $leader->img_path = $file_path;
                $leader->img_url = asset($file_path);

            }
            $leader->name = $request->name;
            $leader->name_ar = $request->name;

            $leader->role = $request->role;
            $leader->role_ar = $request->role_ar;

            $leader->desc = $request->desc;
            $leader->desc_ar = $request->desc_ar;
            $leader->save();
            return response()->json(true);
        }
    }

    /**
     * show selected service
     */
    public function edit(Request $request, $id){
        $leader = Leader::find($id);
        return view('backend.leader.leaderedit', ['leader'=> $leader]);
    }

    /**
     * update a service
     */
    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            'role' => 'required',
            'role_ar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $leader = Leader::find($id);        
            if ($request->hasFile('image')) {
                # code...
                File::delete(public_path($leader->img_path));
                $ext = $request->image->extension();
                $request->file('image')->move(public_path('images/leader/'), str_replace(' ', '_', $request->name).'.'.$ext);
                $file_path = 'images/leader/'.str_replace(' ', '_', $request->name).'.'.$ext;
                $leader->img_path = $file_path;
                $leader->img_url = asset($file_path);

            }
            $leader->name = $request->name;
            $leader->name_ar = $request->name_ar;

            $leader->role = $request->role;
            $leader->role_ar = $request->role_ar;
            if($request->desc !=''){
                $leader->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $leader->desc_ar = $request->desc_ar;
            }
            $leader->save();
            return response()->json(true);
        }      
    }

    /**
     * show all services
     */
    public function show(){
        return view('backend.leader.leaderview' , ['leaders'=> Leader::all()]);
    }
    /**
     * destroy service
     */
    public function destroy($id){
        $leader = Leader::find($id);
        File::delete(public_path($leader->img_path));
        $leader->delete();
        return response()->json(true);
    }    
}
