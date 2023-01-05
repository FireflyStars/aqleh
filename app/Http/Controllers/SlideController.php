<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Slide;
use File;
class SlideController extends Controller
{
    public function __construt(){
        $this->middleware('admin')->except(['index']);
    }
    /**
     * show adding Slide form
     */
    public function showAddForm(){
        return view('backend.slide.slideadd');
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
            $slide = new Slide();
            if ($request->hasFile('image')) {
                # code...
                $name = $request->file('image')->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                $request->file('image')->move(public_path('images/slide/'), $name);
                $file_path = 'images/slide/'.$name;
                $slide->img_path = $file_path;
                $slide->img_url = asset($file_path);
            }

            $slide->save();
            return response()->json(true);
        }
    }

    /**
     * show selected service
     */
    public function edit(Request $request, $id){
        $slide = Slide::find($id);
        return view('backend.slide.slideedit', ['slide'=> $slide]);
    }

    /**
     * update a service
     */
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $slide = Slide::find($id);
            if ($request->hasFile('image')) {
                # code...
                // delte original file
                File::delete(public_path($client->img_path));

                //get image extension
                $name = $request->file('image')->getClientOriginalName();
                $name = str_replace(' ', '-', $name);

                $request->file('image')->move(public_path('images/slide/'), $name);
                $file_path = 'images/slide/'.$name;
                
                $slide->img_path = $file_path;
                $slide->img_url = asset($file_path);
            }
            $slide->save();
            return response()->json(true);
        }        
    }

    /**
     * show all Slides
     */
    public function show(){
        return view('backend.slide.slideview' , ['slides'=> Slide::paginate(16)]);
    }
    /**
     * destroy slide
     */
    public function destroy($id){
        $slide = Slide::find($id);
        File::delete(public_path($slide->img_path));
        $slide->delete();
        return response()->json(true);
    }        
}
