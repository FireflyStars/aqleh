<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\News;
use App\NewsGallery;
use File;

class NewsController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->except(['index', 'searchNews', 'showSingleNews']);
    }
    
    /**
     * show all news in frontend
     */
    public function index(){
        if (app()->getLocale() == 'en') {
            $news = News::select(['id', 'name', 'page_url', 'desc', 'featured_img_url', 'img_alt', 'created_at'])
                          ->where('status', 1)->orderBy('created_at', 'desc')->paginate(8);

            $latest_news = News::select(['id', 'name', 'page_url', 'desc', 'featured_img_url', 'img_alt', 'created_at'])
                          ->where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();

            }else{
            $news = News::select(['id', 'name_ar as name', 'page_url', 'desc_ar as desc', 'featured_img_url', 'img_alt_ar as img_alt', 'created_at'])
                            ->where('status', 1)->orderBy('created_at', 'desc')->paginate(8);
            $latest_news = News::select(['id', 'name_ar as name', 'page_url', 'desc_ar as desc', 'featured_img_url', 'img_alt_ar as img_alt', 'created_at'])
                            ->where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();
        }
        return view('frontend.news.allnews', ['news'=>$news, 'latest_news'=> $latest_news]);
    }

    /**
     * show all news in frontend
     */
    public function searchNews(Request $request){
        $query = $request->search_str;
        if (app()->getLocale() == 'en') {
            $news = News::select([
                            'id', 
                            'name', 
                            'page_url', 
                            'desc', 
                            'featured_img_url', 
                            'img_alt', 
                            'created_at'
                        ])->where('status', 1)
                          ->where('name', 'like', '%'.$query.'%')
                          ->orWhere('desc', 'like', '%'.$query.'%')
                          ->orderBy('created_at', 'desc')
                          ->paginate(8);
            $latest_news = News::select(['id', 'name', 'page_url', 'desc', 'featured_img_url', 'img_alt', 'created_at'])
                          ->where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();

            }else{
            $news = News::select([   
                                    'id', 
                                    'name_ar as name', 
                                    'page_url_ar as page_url', 
                                    'desc_ar as desc', 
                                    'featured_img_url', 
                                    'img_alt_ar as img_alt', 
                                    'created_at'
                                ])->where('status', 1)
                                ->where('name', 'like', '%'.$query.'%')
                                ->orWhere('desc', 'like', '%'.$query.'%')                                
                                ->orderBy('created_at', 'desc')
                                ->paginate(8);
            $latest_news = News::select(['id', 'name_ar as name', 'page_url', 'desc_ar as desc', 'featured_img_url', 'img_alt_ar as img_alt', 'created_at'])
                            ->where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();
        }
        return view('frontend.news.searchnews', ['news'=>$news, 'latest_news'=> $latest_news]);
    }

    /**
     * show single news in frontend
     */
    public function showSingleNews($uri){
        if(app()->getLocale() == 'en'){
            $news = News::select(['id', 'name', 'page_url', 'desc', 'img_alt', 'featured_img_url', 'created_at'])->where('page_url', $uri)->first();
            $latest_news = News::select(['id', 'name', 'page_url', 'desc', 'featured_img_url', 'img_alt', 'created_at'])
                          ->where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();            
        }else{
            $news = News::select(['id', 'name_ar as name', 'page_url', 'desc_ar as desc', 'img_alt_ar as img_alt', 'featured_img_url', 'created_at'])->where('page_url', $uri)->first();
            $latest_news = News::select(['id', 'name_ar as name', 'page_url', 'desc_ar as desc', 'featured_img_url', 'img_alt_ar as img_alt', 'created_at'])
                            ->where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();            
        }
        // dd($news);
        return view('frontend.news.singlenews', ['news'=>$news, 'gallery'=> $news->gallery, 'latest_news'=> $latest_news]);
    }


    /**
     * show adding news form
     */
    public function showAddForm(){
        return view('backend.news.newsadd');
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
            $request->file('upload')->move(public_path('images/news/desc/'), $filenametostore);
    
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/news/desc/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
    
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }        
    }
    /**
     * create news
     */
    public function create(Request $request){
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
            $news = new News();
            $news->meta_title = $request->meta_title;
            $news->meta_keys = $request->meta_keys;
            $news->meta_desc = $request->meta_desc;
            
            $news->page_url = $request->page_url;
            $news->page_url_ar = $request->page_url_ar;

            $news->img_alt = $request->img_alt;
            $news->img_alt_ar = $request->img_alt_ar;

            $news->name = $request->name;
            $news->name_ar = $request->name;

            $news->desc = $request->desc;
            $news->desc_ar = $request->desc_ar;

            $news->status = $request->status;
            
            $news->save();
                        
            if ($request->hasFile('featured_img')) {
                # code...
                $ext = $request->featured_img->extension();
                $name = $request->file('featured_img')->getClientOriginalName();
                $request->file('featured_img')->move(public_path('images/news/'.$news->id.'/'), $name.'.'.$ext);
                $file_path = 'images/news/'.$news->id.'/'.$name.'.'.$ext;

                $news->featured_img_path = $file_path;
                $news->featured_img_url = asset($file_path);
                $news->save();
            }
            return response()->json(true);
        }          
    }

    /**
     * show selected news
     */
    public function edit($id){
        $news = News::find($id);
        return view('backend.news.newsedit', ['news'=> $news]);
    }

    /**
     * update selected news
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
            $news = News::find($id);
            $news->meta_title = $request->meta_title;
            $news->meta_keys = $request->meta_keys;
            $news->meta_desc = $request->meta_desc;
            
            $news->page_url = $request->page_url;
            $news->page_url_ar = $request->page_url_ar;

            $news->img_alt = $request->img_alt;
            $news->img_alt_ar = $request->img_alt_ar;

            $news->name = $request->name;
            $news->name_ar = $request->name_ar;

            if($request->desc != ''){
                $news->desc = $request->desc;
            }
            if($request->desc_ar != ''){
                $news->desc_ar = $request->desc_ar;
            }

            $news->status = $request->status;
            
            $news->save();
                        
            if ($request->hasFile('featured_img')) {
                # code...
                File::delete(public_path($news->featured_img_path));
                $ext = $request->featured_img->extension();
                $name = $request->file('featured_img')->getClientOriginalName();
                $request->file('featured_img')->move(public_path('images/news/'.$news->id.'/'), $name.'.'.$ext);
                $file_path = 'images/news/'.$news->id.'/'.$name.'.'.$ext;
                $news->featured_img_path = $file_path;
                $news->featured_img_url = asset($file_path);
                $news->save();
            }
            return response()->json(true);
        }           
    }

    /**
     * show all news
     */
    public function show(){
        $news = News::all();
        return view('backend.news.newsview', ['news'=> $news]);
    }
    /**
     * destroy news
     */
    public function destroy($id){
        $news = News::find($id);
        $galleries = $news->gallery;
        foreach($galleries as $gallery){
            $gallery->delete();
        }
        File::deleteDirectory(public_path('images/news/'.$news->id));
        $news->delete();
        return response()->json(true);
    }  
    
    public function showNewsGallery($news_id){
        $galleries = NewsGallery::where('news_id', $news_id)->paginate(15);
        return view('backend.news.gallery', ['galleries'=> $galleries, 'news_id'=> $news_id]);
    }
    
    public function showNewsGalleryAddForm($news_id){
        return view('backend.news.galleryadd', ['news_id'=> $news_id]);
    }

    public function addNewsGallery(Request $request, $news_id){
        if($request->hasfile('images')){
            $name = '';
            foreach($request->file('images') as $file){
                $name=$file->getClientOriginalName();
                $file->move(public_path('images/news/'.$news_id.'/gallery'), $name);  
                $gallery = new NewsGallery();
                $gallery->news_id = $news_id;
                $gallery->img_path = 'images/news/'.$news_id.'/gallery/'.$name;
                $gallery->img_url = asset('images/news/'.$news_id.'/gallery/'.$name);
                $gallery->save();
            }
            return response()->json(true);
         }else{
             return response()->json(false);
         }
    }

    public function showNewsGalleryEditForm($gallery_id){
        $gallery = NewsGallery::find($gallery_id);
        return view('backend.news.galleryedit', ['gallery'=> $gallery]);
    }

    public function updateNewsGallery( Request $request, $gallery_id){
        if($request->hasfile('image')){
            $gallery = NewsGallery::find($gallery_id);
            File::delete(public_path($gallery->img_path));
            $news_id = $gallery->news->id;
            $name=$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/news/'.$news_id.'/gallery'), $name);  
            $gallery->img_path = 'images/news/'.$news_id.'/gallery/'.$name;
            $gallery->img_url = asset('images/news/'.$news_id.'/gallery/'.$name);
            $gallery->save();
        }
        return response()->json(true);
    }

    public function deleteGallery($gallery_id){
        $gallery  = NewsGallery::find($gallery_id);
        File::delete(public_path($gallery->img_path));
        $gallery->delete();
        return response()->json(true);
    }

    public function deleteAllGallery($news_id){
        $galleries  = News::find($news_id)->gallery;
        foreach($galleries as $item){
            File::delete(public_path($item->img_path));
            $item->delete();
        }
        return redirect()->back();
    }
}
