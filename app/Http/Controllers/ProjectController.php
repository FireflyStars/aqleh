<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Project;
use App\ProjectImage;
use App\RequestManager;
use File;
class ProjectController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->except(['index', 'showSingleProject']);
    }
    /**
     * show all projects in frontend
     */
    public function index(){
        if (app()->getLocale() == 'en') {
            $projects = Project::select(['id','name', 'page_url', 'img_alt', 'status', 'desc', 'meta_title', 'meta_keys', 'meta_desc'])->paginate(12);
            $manager = RequestManager::select(['id', 'title', 'role', 'email', 'img_url'])->where('assigned_id', -2)->first();
        }else{
            $projects = Project::select(['id','name_ar as name', 'page_url', 'img_alt_ar as img_alt', 'status', 'desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->paginate(12);
            $manager = RequestManager::select(['id', 'title_ar as title', 'role_ar as role', 'email', 'img_url'])->where('assigned_id', -2)->first();            
        }
        foreach ($projects as $key => $project) {
            # code...
            $project->image = $project->images->first();
        }        
        return view('frontend.project.allproject', ['projects'=> $projects, 'manager'=> $manager]);
    }

    /**
     * show single project in frontend
     */
    public function showSingleProject($uri){
        if (app()->getLocale() == 'en') {
            $project = Project::select(['id','name', 'page_url', 'img_alt', 'status', 'desc', 'meta_title', 'meta_keys', 'meta_desc'])->where('page_url', $uri)->first();
            $manager = RequestManager::select(['id', 'title', 'role', 'email', 'img_url'])->where('assigned_id', -2)->first();

        }else{
            $project = Project::select(['id','name_ar as name', 'page_url', 'img_alt_ar as img_alt', 'status', 'desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->where('page_url', $uri)->first();
            $manager = RequestManager::select(['id', 'title_ar as title', 'role_ar as role', 'email', 'img_url'])->where('assigned_id', -2)->first();            
        }
        $project->images = $project->images;
        return view('frontend.project.singleproject', ['project' => $project, 'manager'=> $manager]);
    }


    /**
     * show adding news form
     */
    public function showAddForm(){
        return view('backend.project.projectadd');
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
            $request->file('upload')->move(public_path('images/project/desc/'), $filenametostore);
    
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/project/desc/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }        
    }
    /**
     * create new project
     */
    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            'page_url' => 'required',
            'page_url_ar' => 'required',
            // 'image' => 'image',
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
            $project = new Project();
            $project->meta_title = $request->meta_title;
            $project->meta_keys = $request->meta_keys;
            $project->meta_desc = $request->meta_desc;
            
            $project->page_url = $request->page_url;
            $project->page_url_ar = $request->page_url_ar;

            $project->img_alt = $request->img_alt;
            $project->img_alt_ar = $request->img_alt_ar;

            $project->name = $request->name;
            $project->name_ar = $request->name;

            if($request->desc !=''){
                $project->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $project->desc_ar = $request->desc_ar;
            }

            $project->status = $request->status;
            
            $project->save();
                        
            if ($request->hasFile('image_1')) {
                # code...
                $ext = $request->image_1->extension();
                $name = $request->file('image_1')->getClientOriginalName();
                $request->file('image_1')->move(public_path('images/project/'.$project->id.'/'), $name.'.'.$ext);
                $file_path = 'images/project/'.$project->id.'/'.$name.'.'.$ext;

                $image = new ProjectImage();
                $image->project_id = $project->id;
                $image->img_path = $file_path;
                $image->img_url = asset($file_path);
                $image->save();
            }

            if ($request->hasFile('image_2')) {
                # code...
                $ext = $request->image_2->extension();
                $name = $request->file('image_2')->getClientOriginalName();
                $request->file('image_2')->move(public_path('images/project/'.$project->id.'/'), $name.'.'.$ext);
                $file_path = 'images/project/'.$project->id.'/'.$name.'.'.$ext;

                $image = new ProjectImage();
                $image->project_id = $project->id;
                $image->img_path = $file_path;
                $image->img_url = asset($file_path);
                $image->save();
            }

            if ($request->hasFile('image_3')) {
                # code...
                $ext = $request->image_3->extension();
                $name = $request->file('image_3')->getClientOriginalName();
                $request->file('image_3')->move(public_path('images/project/'.$project->id.'/'), $name.'.'.$ext);
                $file_path = 'images/project/'.$project->id.'/'.$name.'.'.$ext;

                $image = new ProjectImage();
                $image->project_id = $project->id;
                $image->img_path = $file_path;
                $image->img_url = asset($file_path);
                $image->save();
            }

            if ($request->hasFile('image_4')) {
                # code...
                $ext = $request->image_4->extension();
                $name = $request->file('image_4')->getClientOriginalName();
                $request->file('image_4')->move(public_path('images/project/'.$project->id.'/'), $name.'.'.$ext);
                $file_path = 'images/project/'.$project->id.'/'.$name.'.'.$ext;

                $image = new ProjectImage();
                $image->project_id = $project->id;
                $image->img_path = $file_path;
                $image->img_url = asset($file_path);
                $image->save();
            }
            
            if ($request->hasFile('image_5')) {
                # code...
                $ext = $request->image_5->extension();
                $name = $request->file('image_5')->getClientOriginalName();
                $request->file('image_5')->move(public_path('images/project/'.$project->id.'/'), $name.'.'.$ext);
                $file_path = 'images/project/'.$project->id.'/'.$name.'.'.$ext;

                $image = new ProjectImage();
                $image->project_id = $project->id;
                $image->img_path = $file_path;
                $image->img_url = asset($file_path);
                $image->save();
            }

            return response()->json(true);
        }        
    }

    /**
     * show selected Project
     */
    public function edit($id){
        $project = Project::find($id);
        $images = $project->images;
        return view('backend.project.projectedit', ['project'=>$project, 'images'=>$images]);
    }

    /**
     * update selected Project
     */
    public function update(Request $request, $id){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            'page_url' => 'required',
            'page_url_ar' => 'required',
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
            $project = Project::find($id);
            $project->meta_title = $request->meta_title;
            $project->meta_keys = $request->meta_keys;
            $project->meta_desc = $request->meta_desc;
            
            $project->page_url = $request->page_url;
            $project->page_url_ar = $request->page_url_ar;
            $project->status = $request->status;
            $project->img_alt = $request->img_alt;
            $project->img_alt_ar = $request->img_alt_ar;
            
            $project->name = $request->name;
            $project->name_ar = $request->name_ar;
            $project->desc = $request->desc;
            $project->desc_ar = $request->desc_ar;
            $project->save();
            
            if ($request->hasFile('image_1')) {
                # code...
                $ext = $request->image_1->extension();
                $name = $request->file('image_1')->getClientOriginalName();
                $request->file('image_1')->move(public_path('images/project/'.$project->id.'/'), $name.'.'.$ext);
                $file_path = 'images/project/'.$project->id.'/'.$name.'.'.$ext;

                $image = ProjectImage::find($request->image_1_id);
                if($image){
                    File::delete(publich_path($image->img_path));
                }else{
                    $image = new ProjectImage();
                }                
                $image->project_id = $id;
                $image->img_path = $file_path;
                $image->img_url = asset($file_path);
                $image->save();
            }
            if ($request->hasFile('image_2')) {
                # code...
                $ext = $request->image_2->extension();
                $name = $request->file('image_2')->getClientOriginalName();
                $request->file('image_2')->move(public_path('images/project/'.$project->id.'/'), $name.'.'.$ext);
                $file_path = 'images/project/'.$project->id.'/'.$name.'.'.$ext;

                $image = ProjectImage::find($request->image_2_id);
                if($image){
                    File::delete(publich_path($image->img_path));
                }else{
                    $image = new ProjectImage();
                }                
                $image->project_id = $id;
                $image->img_path = $file_path;
                $image->img_url = asset($file_path);
                $image->save();
            }
            if ($request->hasFile('image_3')) {
                # code...
                $ext = $request->image_3->extension();
                $name = $request->file('image_3')->getClientOriginalName();
                $request->file('image_3')->move(public_path('images/project/'.$project->id.'/'), $name.'.'.$ext);
                $file_path = 'images/project/'.$project->id.'/'.$name.'.'.$ext;

                $image = ProjectImage::find($request->image_3_id);
                if($image){
                    File::delete(publich_path($image->img_path));
                }else{
                    $image = new ProjectImage();
                }                
                $image->project_id = $id;
                $image->img_path = $file_path;
                $image->img_url = asset($file_path);
                $image->save();
            }
            if ($request->hasFile('image_4')) {
                # code...
                $ext = $request->image_4->extension();
                $name = $request->file('image_4')->getClientOriginalName();
                $request->file('image_4')->move(public_path('images/project/'.$project->id.'/'), $name.'.'.$ext);
                $file_path = 'images/project/'.$project->id.'/'.$name.'.'.$ext;

                $image = ProjectImage::find($request->image_4_id);
                if($image){
                    File::delete(publich_path($image->img_path));
                }else{
                    $image = new ProjectImage();
                }
                $image->project_id = $id;
                $image->img_path = $file_path;
                $image->img_url = asset($file_path);
                $image->save();
            }
            if ($request->hasFile('image_5')) {
                # code...
                $ext = $request->image_5->extension();
                $name = $request->file('image_5')->getClientOriginalName();
                $request->file('image_5')->move(public_path('images/project/'.$project->id.'/'), $name.'.'.$ext);
                $file_path = 'images/project/'.$project->id.'/'.$name.'.'.$ext;

                $image = ProjectImage::find($request->image_5_id);
                if($image){
                    File::delete(publich_path($image->img_path));
                }else{
                    $image = new ProjectImage();
                }                
                $image->project_id = $id;
                $image->img_path = $file_path;
                $image->img_url = asset($file_path);
                $image->save();
            }

            return response()->json(true);
        }          
    }

    /**
     * show all projects
     */
    public function show(){
        $projects = Project::all();
        foreach ($projects as $key => $project) {
            # code...
            $project->image = $project->images;
        }

        return view('backend.project.projectview', ['projects'=> $projects]);
    }
    /**
     * destroy project
     */
    public function destroy($id){

        $project = Project::find($id);
        foreach ($project->images as $key => $image) {
            # code...
            File::delete(public_path($image->img_path));
            $image->delete();
        }
        $project->delete(); 

        return response()->json('true');
    }
}
