<?php

namespace App\Http\Middleware;
use Closure;
use App\Service;
use App\Setting;
use App\News;
use App\Banner;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('locale')) {
            # code...
            \App::setLocale($request->session()->get('locale'));
        }
        if (\App::getLocale() == 'en') {
                $services = Service::select(['page_url', 'name', 'img_url'])->where('status', 1)->get();
                $request->session()->put('services', $services);
                $latest_news = News::select(['id', 'name', 'page_url', 'desc', 'featured_img_url', 'img_alt_ar as img_alt', 'created_at'])->where('status', 1)->orderBy('created_at', 'desc')->limit(2)->get();        
                $request->session()->put('setting', Setting::select(['address', 'email', 'office_tel', 'fax', 'facebook', 'twitter', 'linkedin', 'instagram', 'logo_url', 'cursor_effect', 'logo_title'])->first());   
                $request->session()->put('latest_news', $latest_news);
        }else{
                $services = Service::select(['page_url', 'name_ar as name', 'img_url'])->where('status', 1)->get();
                $request->session()->put('services_ar', $services);
                $latest_news = News::select(['id', 'name_ar as name', 'page_url', 'desc_ar as desc', 'featured_img_url', 'img_alt_ar as img_alt', 'created_at'])->where('status', 1)->orderBy('created_at', 'desc')->limit(2)->get();        
                $request->session()->put('latest_news_ar', $latest_news);
                $request->session()->put('setting', Setting::select(['address', 'email', 'office_tel', 'fax', 'facebook', 'twitter', 'linkedin', 'instagram', 'logo_url', 'cursor_effect', 'logo_title_ar as logo_title'])->first());   
        }
        $request->session()->put('banner_url', Banner::inRandomOrder()->first()->img_url);
        return $next($request);
    }
}
