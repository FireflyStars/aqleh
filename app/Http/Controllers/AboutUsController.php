<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutAec;
use App\CompanyProfile;
use App\CompanyCapability;
use App\MeetOurTeam;
use App\Leader;
use App\OurValue;
use App\WordFromDirector;
use App\CorporateApproach;

use App\PrivacyPolicy;
use App\AccessbilityStatement;
use App\TermsCondition;
use App\CookiePolicy;
use App\Sitemap;

class AboutUsController extends Controller
{

    /**
    * Show About AEC page
    */
    public function showAboutAEC(){
        if (app()->getLocale() == 'en') {
            $page = AboutAec::select([ 'name','desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }else{
            $page = AboutAec::select([ 'name_ar','desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }
        return view('frontend.static.about_aec', ['page'=> $page]);
    }

    /**
    * show Word From Director page
    */
    public function showWordFromDirector(){
        if (app()->getLocale() == 'en') {
            $page = WordFromDirector::select([ 'name','desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }else{
            $page = WordFromDirector::select([ 'name_ar','desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }       
        return view('frontend.static.word_from_director', ['page'=> $page]);
    }

    /**
    * show Our Values page
    */
    public function showOurValues(){
        if (app()->getLocale() == 'en') {
            $page = OurValue::select([ 'name','desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }else{
            $page = OurValue::select([ 'name_ar','desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }   
        return view('frontend.static.our_values', ['page'=> $page]);
    }

    /**
    * show Corporate Approach page
    */
    public function showCorporateApproach(){
        if (app()->getLocale() == 'en') {
            $page = CorporateApproach::select([ 'name','desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }else{
            $page = CorporateApproach::select([ 'name_ar','desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }      
        return view('frontend.static.corporate_approach', ['page'=> $page]);
    }

    /**
    * show Meet Our Team page
    */
    public function showMeetOurTeam(){
        if (app()->getLocale() == 'en') {
            $leaders = Leader::select(['name', 'role', 'desc', 'img_url'])->get();
            $page = MeetOurTeam::select([ 'name','desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }else{
            $leaders = Leader::select(['name_ar as name', 'role_ar as role', 'desc_ar as desc', 'img_url'])->get();
            $page = MeetOurTeam::select([ 'name_ar','desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }
        return view('frontend.static.meet_our_team', ['page'=> $page, 'leaders'=>$leaders]);
    }

    /**
    * show Company Profile page
    */
    public function showCompanyProfile(){
        $page = CompanyProfile::select([ 'file_url', 'desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        // dd($page);
        return view('frontend.static.company_profile', ['page' => $page]);
    }

    /**
    * show Company capability page
    */
    public function showCompanyCapability(){
        if (app()->getLocale() == 'en') {
            $page = CompanyCapability::select([ 'desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }else{
            $page = CompanyCapability::select([ 'desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }           
        // dd($page);
        return view('frontend.static.company_capability', ['page' => $page]);
    }

    /**
    * show Privacy Policy page
    */
    public function showPrivacyPolicy(){
        if (app()->getLocale() == 'en') {
            $page = PrivacyPolicy::select([ 'name','desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }else{
            $page = PrivacyPolicy::select([ 'name_ar','desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }      
        return view('frontend.static.privacy_policy', ['page' => $page]);
    }

    /**
    * show Privacy Policy page
    */
    public function showTermsCondition(){
        if (app()->getLocale() == 'en') {
            $page = TermsCondition::select([ 'name','desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }else{
            $page = TermsCondition::select([ 'name_ar','desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }      
        return view('frontend.static.terms_condition', ['page' => $page]);
    }

    /**
    * show Privacy Policy page
    */
    public function showAccessbilityStatement(){
        if (app()->getLocale() == 'en') {
            $page = AccessbilityStatement::select([ 'name','desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }else{
            $page = AccessbilityStatement::select([ 'name_ar','desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }      
        return view('frontend.static.accessbility_statement', ['page' => $page]);
    }

    /**
    * show Privacy Policy page
    */
    public function showCookiePolicy(){
        if (app()->getLocale() == 'en') {
            $page = CookiePolicy::select([ 'name','desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }else{
            $page = CookiePolicy::select([ 'name_ar','desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }      
        return view('frontend.static.cookie_policy', ['page' => $page]);
    }

    /**
    * show Privacy Policy page
    */
    public function showSiteMap(){
        if (app()->getLocale() == 'en') {
            $page = Sitemap::select([ 'name','desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }else{
            $page = Sitemap::select([ 'name_ar','desc_ar as desc', 'meta_title', 'meta_keys', 'meta_desc'])->first();
        }      
        return view('frontend.static.sitemap', ['page' => $page]);
    }

}
