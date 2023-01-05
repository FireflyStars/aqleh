<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Project;
use App\Service;
use App\Client;
use App\RequestManager;

class RequestManagerController extends Controller
{
    /**
     * show adding news form
     */
    public function showAddForm(){
        $services = Service::all();
        return view('backend.contact_notification.notificationadd', ['services'=> $services]);
    }

    /**
     * create new project
     */
    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'title_ar' => 'required',
            'role' => 'required',
            'role_ar' => 'required',
            'email' => 'required|email',
            'image' => 'required|file',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $manager = new RequestManager();
            if($request->type == 'project'){
                $manager->assigned_id = -2;
            }else if($request->type == 'service'){
                $manager->assigned_id = $request->service_id;
            }else if($request->type == 'client'){
                $manager->assigned_id = -1;
            }else{
                $manager->assigned_id = 0;
            }
            $manager->type = $request->type;
            $manager->title = $request->title;
            $manager->title_ar = $request->title_ar;
            $manager->role = $request->role;
            $manager->role_ar = $request->role_ar;
            $manager->email = $request->email;
            if ($request->hasFile('image')) {
                # code...
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('images/request_dealer/'.$request->project_id.'/'), $name);
                $file_path = 'images/request_dealer/'.$request->project_id.'/'.$name;
                $manager->img_path = $file_path;
                $manager->img_url = asset($file_path);
            }
            $manager->save();
            return response()->json(true);
        }        
    }

    /**
     * show selected Project
     */
    public function edit($id){
        $manager = RequestManager::find($id);
        $services = Service::all();
        return view('backend.contact_notification.notificationedit', ['manager'=>$manager , 'services'=> $services]);
    }

    /**
     * update selected Project
     */
    public function update(Request $request, $id){
        
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'title' => 'required',
            'title_ar' => 'required',
            'role' => 'required',
            'role_ar' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $manager = RequestManager::find($id);
            if($request->type == 'project'){
                $manager->assigned_id = -2;
            }else if($request->type == 'service'){
                $manager->assigned_id = $request->service_id;
            }else if($request->type == 'client'){
                $manager->assigned_id = -1;
            }else{
                $manager->assigned_id = 0;
            }
            $manager->type = $request->type;            
            $manager->title = $request->title;
            $manager->title_ar = $request->title_ar;
            $manager->role = $request->role;
            $manager->role_ar = $request->role_ar;
            $manager->email = $request->email;
            if ($request->hasFile('image')) {
                # code...
                File::delete(public_path($manager->img_path));
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('images/request_dealer/'.$request->project_id.'/'), $name);
                $file_path = 'images/request_dealer/'.$request->project_id.'/'.$name;
                $manager->img_path = $file_path;
                $manager->img_url = asset($file_path);
            }
            $manager->save();
            return response()->json(true);
        }            
    }

    /**
     * show all projects
     */
    public function show(){
        $managers = RequestManager::all();
        foreach($managers as $manager){
            if($manager->type == "project"){
                $manager->assigned_name = 'project';
            }else if($manager->type == "service"){
                $manager->assigned_name = Service::where('id', $manager->assigned_id)->first()->name;
            }else if($manager->type == "client"){
                $manager->assigned_name = 'client';
            }else{
                $manager->assigned_name = 'About Us';
            }
        }
        return view('backend.contact_notification.notification', ['managers'=> $managers]);
    }
    /**
     * destroy project
     */
    public function destroy($id){

        $manager = RequestManager::find($id);
        File::delete(public_path($manager->img_path));
        $manager->delete(); 
        return response()->json('true');
    }
}
