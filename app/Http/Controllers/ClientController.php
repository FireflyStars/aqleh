<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Client;
use App\RequestManager;
use File;
class ClientController extends Controller
{
    public function __construt(){
        $this->middleware('admin')->except(['index']);
    }

    public function index(){
        $clients = Client::paginate(12);
        if (app()->getLocale() == 'en') {
            $manager = RequestManager::select(['id', 'title', 'role', 'email', 'img_url'])->where('type', 'client')->first();

        }else{
            $manager = RequestManager::select(['id', 'title_ar as title', 'role_ar as role', 'email', 'img_url'])->where('type', 'client')->first();            
        }
        return view('frontend.client.clients' , ['clients'=> $clients, 'manager'=>$manager]);
    }
    /**
     * show adding Client form
     */
    public function showAddForm(){
        return view('backend.client.clientadd');
    }

    /**
     * create new service
     */
    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $client = new Client();
            if ($request->hasFile('image')) {
                # code...
                $ext = $request->image->extension();
                $name = $request->file('image')->getClientOriginalName();
                $name = str_replace(' ', '-', $name);
                $request->file('image')->move(public_path('images/client/'), $name.'.'.$ext);
                $file_path = 'images/client/'.$name.'.'.$ext;
                $client->img_path = $file_path;
                $client->img_url = asset($file_path);
            }

            $client->name = $request->name;
            $client->save();
            return response()->json(true);
        }
    }

    /**
     * show selected service
     */
    public function edit(Request $request, $id){
        $client = Client::find($id);
        return view('backend.client.clientedit', ['client'=> $client]);
    }

    /**
     * update a service
     */
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $client = Client::find($id);
            if ($request->hasFile('image')) {
                # code...
                // delte original file
                File::delete(public_path($client->img_path));

                //get image extension
                $ext = $request->image->extension();
                $name = $request->file('image')->getClientOriginalName();
                $name = str_replace(' ', '-', $name);

                $request->file('image')->move(public_path('images/client/'), $name.'.'.$ext);
                $file_path = 'images/client/'.$name.'.'.$ext;
                
                $client->img_path = $file_path;
                $client->img_url = asset($file_path);
            }
            $client->name = $request->name;
            $client->save();
            return response()->json(true);
        }        
    }

    /**
     * show all services
     */
    public function show(){
        return view('backend.client.clientview' , ['clients'=> Client::paginate(16)]);
    }
    /**
     * destroy service
     */
    public function destroy($id){
        $client = Client::find($id);
        File::delete(public_path($client->img_path));
        $client->delete();
        return response()->json(true);
    }        
}
