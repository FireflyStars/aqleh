<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Service;
use App\RequestManager;
use File;

class ServiceController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->except(['showSingleService']);
    }

    /**
     * show single service in frontend
     */
    public function showSingleService($uri){
        if (app()->getLocale() == 'en') {
            $service = Service::select(['id','name', 'img_alt', 'img_url', 'desc', 'meta_title', 'meta_keys', 'meta_desc'])
                                ->where('page_url', $uri)->first();
            $manager = RequestManager::select(['id', 'title', 'role', 'email', 'img_url'])->where('type', 'service')->where('assigned_id', $service->id)->first();

        }else{
            $service = Service::select(['id','name_ar as name', 'img_alt_ar as img_alt', 'img_url', 'desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->where('page_url', $uri)->first();
            $manager = RequestManager::select(['id', 'title_ar as title', 'role_ar as role', 'email', 'img_url'])->where('type', 'service')->where('assigned_id', $service->id)->first();            
        }
        return view('frontend.service.service',['service'=> $service, 'manager'=> $manager]);
    }


    /**
     * show adding news form
     */
    public function showAddForm(){
        return view('backend.service.serviceadd');
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
            $request->file('upload')->move(public_path('images/service/desc/'), $filenametostore);
    
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/service/desc/'.$filenametostore); 
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
            'page_url' => 'required',
            'page_url_ar' => 'required',
            'image' => 'image',
            // 'img_alt' => 'required',
            // 'img_alt_ar' => 'required',
            'status' => 'required',
            'desc' => 'required',
            'desc_ar' => 'required',
            // 'meta_title' => 'required',
            // 'meta_keys' => 'required',
            // 'meta_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $service = new Service();
            $service->meta_title = $request->meta_title;
            $service->meta_keys = $request->meta_keys;
            $service->meta_desc = $request->meta_desc;
            
            $service->page_url = $request->page_url;
            $service->page_url_ar = $request->page_url_ar;
            
            $service->status = $request->status;
            if ($request->hasFile('image')) {
                # code...
                $ext = $request->image->extension();
                $request->file('image')->move(public_path('images/service/'), $request->page_url.'.'.$ext);
                $file_path = 'images/service/'.$request->page_url.'.'.$ext;
                $service->img_path = $file_path;
                $service->img_url = asset($file_path);

            }
            $service->img_alt = $request->img_alt;
            $service->img_alt_ar = $request->img_alt_ar;

            $service->name = $request->name;
            $service->name_ar = $request->name_ar;

            $service->desc = $request->desc;
            $service->desc_ar = $request->desc_ar;
            $service->save();
            return response()->json(true);
        }
    }

    /**
     * show selected service
     */
    public function edit(Request $request, $id){
        $service = Service::find($id);
        return view('backend.service.serviceedit', ['service'=> $service]);
    }

    /**
     * update a service
     */
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            'page_url' => 'required',
            'page_url_ar' => 'required',
            'status' => 'required',
            'desc' => 'required',
            'desc_ar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $service = Service::find($id);
            $service->meta_title = $request->meta_title;
            $service->meta_keys = $request->meta_keys;
            $service->meta_desc = $request->meta_desc;

            $service->name = $request->name;
            $service->name_ar = $request->name_ar;
            if($request->desc !=''){
                $service->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $service->desc_ar = $request->desc_ar;        
            }

            $service->page_url = $request->page_url;
            $service->page_url_ar = $request->page_url_ar;
            $service->status = $request->status;

            if ($request->hasFile('image')) {
                # code...
                // delte original file
                File::delete(public_path($service->img_path));

                //get image extension
                $ext = $request->image->extension();
                $request->file('image')->move(public_path('images/service/'), $request->page_url.'.'.$ext);
                $file_path = 'images/service/'.$request->page_url.'.'.$ext;
                
                $service->img_path = $file_path;
                $service->img_url = asset($file_path);
            }

            $service->img_alt = $request->img_alt;
            $service->img_alt_ar = $request->img_alt_ar;

            $service->save();
            return response()->json(true);
        }        
    }

    /**
     * show all services
     */
    public function show(){
        return view('backend.service.serviceview' , ['services'=> Service::all()]);
    }
    /**
     * destroy service
     */
    public function destroy($id){
        $service = Service::find($id);
        File::delete(public_path($service->img_path));
        $service->delete();
        return response()->json(true);
    }    
}
