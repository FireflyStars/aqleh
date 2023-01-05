<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\AboutAec;
use App\AccessbilityStatement;
use App\CompanyProfile;
use App\CompanyCapability;
use App\MeetOurTeam;
use App\OurValue;
use App\PrivacyPolicy;
use App\CookiePolicy;
use App\TermsCondition;
use App\WordFromDirector;
use App\CorporateApproach;
use App\Sitemap;
use File;

class StaticPageController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
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
            $request->file('upload')->move(public_path('images/static/'), $filenametostore);
    
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/static/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
    
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }        
    }
    /**
     * Upload company capability files
     */
    public function uploadComoanyCapability(Request $request){
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
            $request->file('upload')->move(public_path('company_capability/'), $filenametostore);
    
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('company_capability/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
    
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }        
    }
    /**
     * About AEC Page
     */
    public function editAboutAEC(){
        $page = AboutAec::find(1);
        return view('backend.static.about_aec', ['page'=> $page]);
    }

    /**
     * update about aec Page
     */
    public function updateAboutAEC(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            // 'page_url' => 'required',
            // 'page_url_ar' => 'required',
            'desc' => 'required',
            'desc_ar' => 'required',
            // 'meta_title' => 'required',
            // 'meta_keys' => 'required',
            // 'meta_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $static = AboutAec::find(1);
            $static->meta_title = $request->meta_title;
            $static->meta_keys = $request->meta_keys;
            $static->meta_desc = $request->meta_desc;
            
            $static->name = $request->name;
            $static->name_ar = $request->name_ar;

            if($request->desc !=''){
                $static->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $static->desc_ar = $request->desc_ar;
            }

            $static->save();
            return response()->json(true);
        }              
    }

    /**
     * Accessbility Statement
     */
    public function editAccessbilityStatement(){
        // dd("ok");
        $page = AccessbilityStatement::find(1);
        return view('backend.static.accessbility_statement', ['page'=> $page]);
    }

    /**
     * update about aec Page
     */
    public function updateAccessbilityStatement(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            // 'page_url' => 'required',
            // 'page_url_ar' => 'required',
            'desc' => 'required',
            'desc_ar' => 'required',
            // 'meta_title' => 'required',
            // 'meta_keys' => 'required',
            // 'meta_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $static = AccessbilityStatement::find(1);
            $static->meta_title = $request->meta_title;
            $static->meta_keys = $request->meta_keys;
            $static->meta_desc = $request->meta_desc;
            
            $static->name = $request->name;
            $static->name_ar = $request->name;
            
            if($request->desc !=''){
                $static->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $static->desc_ar = $request->desc_ar;
            }

            $static->save();
            return response()->json(true);
        }              
    }

    /**
     * About AEC Page
     */
    public function editCookiePolicy(){
        $page = CookiePolicy::find(1);
        return view('backend.static.cookie_policy', ['page'=> $page]);
    }

    /**
     * update about aec Page
     */
    public function updateCookiePolicy(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            // 'page_url' => 'required',
            // 'page_url_ar' => 'required',
            'desc' => 'required',
            'desc_ar' => 'required',
            // 'meta_title' => 'required',
            // 'meta_keys' => 'required',
            // 'meta_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $static = CookiePolicy::find(1);
            $static->meta_title = $request->meta_title;
            $static->meta_keys = $request->meta_keys;
            $static->meta_desc = $request->meta_desc;
            
            $static->name = $request->name;
            $static->name_ar = $request->name;
            
            if($request->desc !=''){
                $static->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $static->desc_ar = $request->desc_ar;
            }

            $static->save();
            return response()->json(true);
        }              
    }

    /**
     * Company profile Page
     */
    public function editCompanyProfile(){
        $page = CompanyProfile::find(1);
        return view('backend.static.company_profile', ['page'=> $page]);
    }

    /**
     * update company profile Page
     */
    public function updateCompanyProfile(Request $request){
        $validator = Validator::make($request->all(), [
            // 'file' => 'required | file',
            // 'meta_title' => 'required',
            // 'meta_keys' => 'required',
            // 'meta_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $static = CompanyProfile::find(1);
            if($request->desc !=''){
                $static->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $static->desc_ar = $request->desc_ar;
            }
            $static->meta_title = $request->meta_title;
            $static->meta_keys = $request->meta_keys;
            $static->meta_desc = $request->meta_desc;

            if ($request->hasFile('file')) {
                # code...
                File::delete(public_path($static->file_path));
                $ext = $request->file->extension();
                $name = $request->file('file')->getClientOriginalName();
                $request->file('file')->move(public_path('company-profile/'), $name.'.'.$ext);
                $file_path = 'company-profile/'.$name.'.'.$ext;
                $static->file_path = $file_path;
                $static->file_url = asset($file_path);
            }            

            $static->save();
            return response()->json(true);
        }              
    }
    /**
     * Company capability Page
     */
    public function editCompanyCapability(){
        $page = CompanyCapability::find(1);
        return view('backend.static.company_capability', ['page'=> $page]);
    }

    /**
     * update company capability Page
     */
    public function updateCompanyCapability(Request $request){
        $validator = Validator::make($request->all(), [
            // 'file' => 'required | file',
            // 'meta_title' => 'required',
            // 'meta_keys' => 'required',
            // 'meta_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $static = CompanyCapability::find(1);
            $static->name = $request->name;
            $static->name_ar = $request->name;            
            if($request->desc !=''){
                $static->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $static->desc_ar = $request->desc_ar;
            }
            $static->meta_title = $request->meta_title;
            $static->meta_keys = $request->meta_keys;
            $static->meta_desc = $request->meta_desc;         

            $static->save();
            return response()->json(true);
        }              
    }

    /**
     * About AEC Page
     */
    public function editCorporateApproach(){
        $page = CorporateApproach::find(1);
        return view('backend.static.corporate_approach', ['page'=> $page]);
    }

    /**
     * update about aec Page
     */
    public function updateCorporateApproach(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            'desc' => 'required',
            'desc_ar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $static = CorporateApproach::find(1);
            $static->meta_title = $request->meta_title;
            $static->meta_keys = $request->meta_keys;
            $static->meta_desc = $request->meta_desc;
            
            $static->name = $request->name;
            $static->name_ar = $request->name;
            
            if($request->desc !=''){
                $static->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $static->desc_ar = $request->desc_ar;
            }

            $static->save();
            return response()->json(true);
        }              
    }

    /**
     * Meet Our Team Page
     */
    public function editMeetOurTeam(){
        $page = MeetOurTeam::find(1);
        return view('backend.static.meet_our_team', ['page'=> $page]);
    }

    /**
     * update about aec Page
     */
    public function updateMeetOurTeam(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            'desc' => 'required',
            'desc_ar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $static = MeetOurTeam::find(1);
            $static->meta_title = $request->meta_title;
            $static->meta_keys = $request->meta_keys;
            $static->meta_desc = $request->meta_desc;
            
            $static->name = $request->name;
            $static->name_ar = $request->name;
            
            if($request->desc !=''){
                $static->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $static->desc_ar = $request->desc_ar;
            }

            $static->save();
            return response()->json(true);
        }              
    }

    /**
     * About AEC Page
     */
    public function editOurValues(){
        $page = OurValue::find(1);
        return view('backend.static.our_values', ['page'=> $page]);
    }

    /**
     * update about aec Page
     */
    public function updateOurValues(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            'desc' => 'required',
            'desc_ar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $static = OurValue::find(1);
            $static->meta_title = $request->meta_title;
            $static->meta_keys = $request->meta_keys;
            $static->meta_desc = $request->meta_desc;
            
            $static->name = $request->name;
            $static->name_ar = $request->name;
            
            if($request->desc !=''){
                $static->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $static->desc_ar = $request->desc_ar;
            }

            $static->save();
            return response()->json(true);
        }              
    }

    /**
     * About AEC Page
     */
    public function editPrivacyPolicy(){
        $page = PrivacyPolicy::find(1);
        return view('backend.static.privacy_policy', ['page'=> $page]);
    }

    /**
     * update about aec Page
     */
    public function updatePrivacyPolicy(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            'desc' => 'required',
            'desc_ar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $static = PrivacyPolicy::find(1);
            $static->meta_title = $request->meta_title;
            $static->meta_keys = $request->meta_keys;
            $static->meta_desc = $request->meta_desc;
            
            $static->name = $request->name;
            $static->name_ar = $request->name;
            
            if($request->desc !=''){
                $static->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $static->desc_ar = $request->desc_ar;
            }            

            $static->save();
            return response()->json(true);
        }              
    }

    /**
     * Site Map Page
     */
    public function editSiteMap(){
        $page = Sitemap::find(1);
        return view('backend.static.sitemap', ['page'=> $page]);
    }

    /**
     * update about aec Page
     */
    public function updateSiteMap(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            'desc' => 'required',
            'desc_ar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $static = Sitemap::find(1);
            $static->meta_title = $request->meta_title;
            $static->meta_keys = $request->meta_keys;
            $static->meta_desc = $request->meta_desc;
            
            $static->name = $request->name;
            $static->name_ar = $request->name;
            
            if($request->desc !=''){
                $static->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $static->desc_ar = $request->desc_ar;
            }
            $static->save();
            return response()->json(true);
        }              
    }

    /**
     * About AEC Page
     */
    public function editTermsCondition(){
        $page = TermsCondition::find(1);
        return view('backend.static.terms_condition', ['page'=> $page]);
    }

    /**
     * update about aec Page
     */
    public function updateTermsCondition(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            'desc' => 'required',
            'desc_ar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $static = TermsCondition::find(1);
            $static->meta_title = $request->meta_title;
            $static->meta_keys = $request->meta_keys;
            $static->meta_desc = $request->meta_desc;
            
            $static->name = $request->name;
            $static->name_ar = $request->name;
            
            if($request->desc !=''){
                $static->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $static->desc_ar = $request->desc_ar;
            }
            $static->save();
            return response()->json(true);
        }              
    }

    /**
     * About AEC Page
     */
    public function editWordFromDirector(){
        $page = WordFromDirector::find(1);
        return view('backend.static.word_from_director', ['page'=> $page]);
    }

    /**
     * update about aec Page
     */
    public function updateWordFromDirector(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ar' => 'required',
            'desc' => 'required',
            'desc_ar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $static = WordFromDirector::find(1);
            $static->meta_title = $request->meta_title;
            $static->meta_keys = $request->meta_keys;
            $static->meta_desc = $request->meta_desc;
            
            $static->name = $request->name;
            $static->name_ar = $request->name;

            if($request->desc !=''){
                $static->desc = $request->desc;
            }
            if($request->desc_ar !=''){
                $static->desc_ar = $request->desc_ar;
            }
            
            $static->save();
            return response()->json(true);
        }              
    }

}
