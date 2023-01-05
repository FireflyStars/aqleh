<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Translation;

class TranslatorController extends Controller
{
    public function show(){
        $translations = Translation::find(1);
        return view('backend.trans.trans', ['trans'=>$translations]);        
    }

    /**
    *   update password
    */
    public function update(Request $request){
        $trans = Translation::find(1);
        $trans->services_summary = $request->services_summary;
        $trans->services_summary_ar = $request->services_summary_ar;
        // $trans->home_bottom_title = $request->home_bottom_title;
        // $trans->home_bottom_title_ar = $request->home_bottom_title_ar;
        $trans->projects_summary = $request->projects_summary;
        $trans->projects_summary_ar = $request->projects_summary_ar;
        $trans->clients_summary = $request->clients_summary;
        $trans->clients_summary_ar = $request->clients_summary_ar;
        $trans->news_summary = $request->news_summary;
        $trans->news_summary_ar = $request->news_summary_ar;
        $trans->leaders_summary = $request->leaders_summary;
        $trans->leaders_summary_ar = $request->leaders_summary_ar;
        // $trans->aec_summary = $request->aec_summary;
        // $trans->aec_summary_ar = $request->aec_summary_ar;
        $trans->save();
        return response()->json(true);
    }    
}
