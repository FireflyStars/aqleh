<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Project;
use App\Service;
use App\Client;
use App\AboutAec;
use App\WordFromDirector;
use App\MeetOurTeam;
use App\OurValue;
use App\CorporateApproach;
use App\CompanyProfile;
use App\CompanyCapability;
use App\Leader;
use App\Setting;
use App\History;
use App\Slide;
use App\Translation;

class HomeController extends Controller
{
    public function __constrcut(){

    }
    /**
    * show home page
    */
    public function index(){
        $clients = Client::all();
        $slides = Slide::all();
        $leaders = Leader::all();
        $history = History::find(1);
        $trans = Translation::find(1);
        if(app()->getLocale() == 'en'){
            $latest_projects = Project::select(['id', 'name', 'page_url', 'img_alt' , 'created_at'])->where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();
            foreach ($latest_projects as $key => $item) {
                $item->image = $item->images->first();
            }     
            $latest_news = News::select(['id', 'name', 'page_url', 'desc', 'featured_img_url', 'img_alt', 'created_at'])
                          ->where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();     
            $about_aec = AboutAec::find(1)->desc;
            $word_from_director = WordFromDirector::find(1)->desc;
            $meet_our_team = MeetOurTeam::find(1)->desc;
            $our_value = OurValue::find(1)->desc;
            $corporate_approach = CorporateApproach::find(1)->desc;
            $company_profile = CompanyProfile::find(1)->desc;
            $company_capability = CompanyCapability::find(1)->desc;
                          
        }else{
            $latest_projects = Project::select(['id', 'name_ar as name', 'page_url_ar as page_url', 'img_alt_ar as img_alt', 'created_at'])->where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();
            foreach ($latest_projects as $key => $item) {
                $item->image = $item->images->first();
            }                
            $latest_news = News::select(['id', 'name_ar as name', 'page_url_ar as page_url', 'desc_ar as desc', 'featured_img_url', 'img_alt_ar as img_alt', 'created_at'])
            ->where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();        
            $about_aec = AboutAec::find(1)->desc_ar;
            $word_from_director = WordFromDirector::find(1)->desc_ar;
            $meet_our_team = MeetOurTeam::find(1)->desc_ar;
            $our_value = OurValue::find(1)->desc_ar;
            $corporate_approach = CorporateApproach::find(1)->desc_ar;
            $company_profile = CompanyProfile::find(1)->desc_ar;
            $company_capability = CompanyCapability::find(1)->desc_ar;
        }
        return view('frontend.home', 
                                [
                                    'latest_projects'=> $latest_projects, 
                                    'latest_news'=>  $latest_news, 
                                    'clients'=>  $clients, 
                                    'slides'=>  $slides, 
                                    'leaders'=>  $leaders, 
                                    'about_aec'=> $about_aec,
                                    'word_from_director'=> $word_from_director,
                                    'meet_our_team'=> $meet_our_team,
                                    'company_profile'=> $company_profile,
                                    'company_capability'=> $company_capability,
                                    'corporate_approach'=> $corporate_approach,
                                    'our_value'=> $our_value,
                                    'history'=> $history,
                                    'trans'=> $trans,
                                ]
                    );
    }

    public function showSearchResult(Request $request){
        $query = $request->search_str;
        if (app()->getLocale() == 'en') {
                $news = News::select([
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
                            ->get();
                $projects = Project::select([
                                'id', 
                                'name', 
                                'page_url', 
                                'desc', 
                                'img_alt', 
                                'created_at'
                            ])->where('status', 1)
                            ->where('name', 'like', '%'.$query.'%')
                            ->orWhere('desc', 'like', '%'.$query.'%')
                            ->orderBy('created_at', 'desc')
                            ->get();
                $services = Service::select([
                                'name', 
                                'page_url', 
                                'desc', 
                                'img_url', 
                                'img_alt', 
                                'created_at'
                            ])->where('status', 1)
                            ->where('name', 'like', '%'.$query.'%')
                            ->orWhere('desc', 'like', '%'.$query.'%')
                            ->orderBy('created_at', 'desc')
                            ->get();

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
                                    ->get();
                $projects = Project::select([   
                                        'id', 
                                        'name_ar as name', 
                                        'page_url_ar as page_url', 
                                        'desc_ar as desc', 
                                        'img_alt_ar as img_alt', 
                                        'created_at'
                                    ])->where('status', 1)
                                    ->where('name', 'like', '%'.$query.'%')
                                    ->orWhere('desc', 'like', '%'.$query.'%')                                
                                    ->orderBy('created_at', 'desc')
                                    ->get();
                $services = Service::select([   
                                        'name_ar as name', 
                                        'page_url_ar as page_url', 
                                        'img_url', 
                                        'desc_ar as desc', 
                                        'img_alt_ar as img_alt', 
                                        'created_at'
                                    ])->where('status', 1)
                                    ->where('name', 'like', '%'.$query.'%')
                                    ->orWhere('desc', 'like', '%'.$query.'%')                                
                                    ->orderBy('created_at', 'desc')
                                    ->get();
            } // endif
            foreach ($projects as $key => $item) {
                $item->image = $item->images->first();
            }
            return view('frontend.searchresult', ['services'=> $services, 'news'=> $news, 'projects'=> $projects]);
        }
}
