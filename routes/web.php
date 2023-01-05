<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
})->name('setLocale');
Route::get('/ckeditor', function (){
    return view('ckeditor');
});
/**
* Defining Frontend Routes
*Here is where you register frontend routes for your application
*/

/**
 * Set Google tracking middleware to frontend routes
 */
Route::middleware(['track.measurementProtocol'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/search', 'HomeController@showSearchResult')->name('show-search');
    //news
    Route::get('/news', 'NewsController@index')->name('show-all-news');
    Route::get('/news/search', 'NewsController@searchNews')->name('search-news');
    Route::get('/news/{uri}', 'NewsController@showSingleNews')->name('show-single-news');
    // Projects
    Route::get('/projects', 'ProjectController@index')->name('show-all-project');
    Route::get('/project/{uri}', 'ProjectController@showSingleProject')->name('show-single-project');
    // Services
    Route::get('/service/{uri}', 'ServiceController@showSingleService')->name('show-single-service');
    // Clients
    Route::get('/clients', 'ClientController@index')->name('show-all-client');
    // Contact Us routes
    Route::get('/contact-us', 'ContactController@index')->name('show-contact-us');
    Route::get('/about-aec', 'AboutUsController@showAboutAEC')->name('about-aec');
    Route::get('/word-from-director', 'AboutUsController@showWordFromDirector')->name('word-from-director');
    Route::get('/our-values', 'AboutUsController@showOurValues')->name('our-values');
    Route::get('/corporate-approach', 'AboutUsController@showCorporateApproach')->name('corporate-approach');
    Route::get('/meet-our-team', 'AboutUsController@showMeetOurTeam')->name('meet-our-team');
    Route::get('/meet-our-team/{name}', 'LeaderController@showSingleLeader')->name('show-single-leader');
    Route::get('company-profile', 'AboutUsController@showCompanyProfile')->name('company-profile');
    Route::get('company-capability', 'AboutUsController@showCompanyCapability')->name('company-capability');
    // privacy routes
    Route::get('/privacy-policy', 'AboutUsController@showPrivacyPolicy')->name('privacy-policy');
    Route::get('/accessbility-statement', 'AboutUsController@showAccessbilityStatement')->name('accessbility-statement');
    Route::get('/cookie-policy', 'AboutUsController@showCookiePolicy')->name('cookie-policy');
    Route::get('/terms-and-condition', 'AboutUsController@showTermsCondition')->name('temrs-condition');
    Route::get('/sitemap', 'AboutUsController@showSiteMap')->name('sitemap');
});
Route::post('/login', 'AdminController@doLogin')->name('do-login');
Route::get('/logout', 'AdminController@logout')->name('logout');
Route::get('/aqleh-admin', 'AdminController@login')->name('show-login');
Route::get('/request-password-reset', 'AdminController@showRequestResetPasswordForm')->name('show-request-password-reset');
Route::post('/request-password-reset', 'AdminController@sendRequestResetPassword')->name('send-request-reset-password');
Route::get('/password-reset/{token}', 'AdminController@showPasswordReset')->name('show-reset-password');
Route::post('/password-reset', 'AdminController@doPasswordReset')->name('do-reset-password');

/**
* Backend Route
 * Here is where you can register backend routes for your application
 */
Route::get('dashboard', 'AdminController@showDashboard')->name('dashboard');

// Setting Routes
Route::get('admin/setting', 'SettingController@showSettingPage')->name('show-setting-page');
Route::get('admin/history', 'SettingController@showHistoryPage')->name('show-history');
Route::post('admin/history', 'SettingController@updateHistory')->name('update-history');
Route::post('admin/setting/other', 'SettingController@updateOtherInfo')->name('update-other-info');
Route::post('admin/setting/update-password', 'SettingController@updatePassword')->name('update-password');
Route::post('admin/setting/update-avatar', 'SettingController@updateAvatar')->name('update-avatar');
Route::post('admin/setting/update-logo', 'SettingController@updateLogo')->name('update-logo');
Route::post('admin/setting/update-cursor', 'SettingController@updateCursor')->name('update-cursor');
Route::post('admin/setting/meta', 'SettingController@updateMetaInfo')->name('update-meta-info');

// Banner Routes
Route::get('admin/banner/create', 'BannerController@showAddForm')->name('add-banner');
Route::post('admin/banner/create', 'BannerController@create')->name('add-post-banner');
Route::get('admin/banner/edit/{id}', 'BannerController@edit')->name('edit-banner');
Route::post('admin/banner/edit/{id}', 'BannerController@update')->name('update-banner');
Route::get('admin/banner', 'BannerController@show')->name('show-banner');
Route::get('admin/banner/delete/{id}', 'BannerController@destroy')->name('delete-banner');

// Project Routes
Route::get('admin/project/create', 'ProjectController@showAddForm')->name('add-project');
Route::post('admin/project/create', 'ProjectController@create')->name('add-post-project');
Route::get('admin/project/edit/{id}', 'ProjectController@edit')->name('edit-project');
Route::post('admin/project/edit/{id}', 'ProjectController@update')->name('update-project');
Route::get('admin/projects', 'ProjectController@show')->name('show-project');
Route::get('admin/project/delete/{id}', 'ProjectController@destroy')->name('delete-project');
Route::post('admin/project/upload/desc-image', 'ProjectController@uploadDescImage')->name('upload-project-desc-image');

// Contact Notification Routes
Route::get('admin/contact-notification/create', 'RequestManagerController@showAddForm')->name('add-contact-notification');
Route::post('admin/contact-notification/create', 'RequestManagerController@create')->name('add-post-contact-notification');
Route::get('admin/contact-notification/edit/{id}', 'RequestManagerController@edit')->name('edit-contact-notification');
Route::post('admin/contact-notification/edit/{id}', 'RequestManagerController@update')->name('update-contact-notification');
Route::get('admin/contact-notification', 'RequestManagerController@show')->name('show-contact-notification');
Route::get('admin/contact-notification/delete/{id}', 'RequestManagerController@destroy')->name('delete-contact-notification');

// Service Routes
Route::get('admin/service/create', 'ServiceController@showAddForm')->name('add-service');
Route::post('admin/service/create', 'ServiceController@create')->name('add-post-service');
Route::get('admin/service/edit/{id}', 'ServiceController@edit')->name('edit-service');
Route::post('admin/service/edit/{id}', 'ServiceController@update')->name('update-service');
Route::get('admin/services', 'ServiceController@show')->name('show-service');
Route::get('admin/service/delete/{id}', 'ServiceController@destroy')->name('delete-service');
Route::post('admin/service/upload/desc-image', 'ServiceController@uploadDescImage')->name('upload-service-desc-image');

// Service Routes
Route::get('admin/leader/create', 'LeaderController@showAddForm')->name('add-leader');
Route::post('admin/leader/create', 'LeaderController@create')->name('add-post-leader');
Route::get('admin/leader/edit/{id}', 'LeaderController@edit')->name('edit-leader');
Route::post('admin/leader/edit/{id}', 'LeaderController@update')->name('update-leader');
Route::get('admin/leader', 'LeaderController@show')->name('show-leader');
Route::get('admin/leader/delete/{id}', 'LeaderController@destroy')->name('delete-leader');
Route::post('admin/leader/upload/desc-image', 'LeaderController@uploadDescImage')->name('upload-leader-desc-image');

// News Routes
Route::get('admin/news/create', 'NewsController@showAddForm')->name('add-news');
Route::post('admin/news/create', 'NewsController@create')->name('add-post-news');
Route::get('admin/news/edit/{id}', 'NewsController@edit')->name('edit-news');
Route::post('admin/news/edit/{id}', 'NewsController@update')->name('update-news');
Route::get('admin/news', 'NewsController@show')->name('show-news');
Route::get('admin/news/delete/{id}', 'NewsController@destroy')->name('delete-news');
Route::post('admin/news/upload/desc-image', 'NewsController@uploadDescImage')->name('upload-news-desc-image');

// News Gallery Routes
Route::get('admin/news/{news_id}/gallery', 'NewsController@showNewsGallery')->name('show-news-gallery');
Route::get('admin/news/{news_id}/gallery/add', 'NewsController@showNewsGalleryAddForm')->name('show-news-gallery-add-form');
Route::post('admin/news/{news_id}/gallery/add', 'NewsController@addNewsGallery')->name('add-news-gallery');
Route::get('admin/news/gallery/edit/{galler_id}', 'NewsController@showNewsGalleryEditForm')->name('show-news-gallery-edit-form');
Route::post('admin/news/gallery/edit/{gallery_id}', 'NewsController@updateNewsGallery')->name('update-news-gallery');
Route::get('admin/news/gallery/delete/{gallery_id}', 'NewsController@deleteGallery')->name('delete-news-gallery');

// Client Routes
Route::get('admin/client/create', 'ClientController@showAddForm')->name('add-client');
Route::post('admin/client/create', 'ClientController@create')->name('add-post-client');
Route::get('admin/client/edit/{id}', 'ClientController@edit')->name('edit-client');
Route::post('admin/client/edit/{id}', 'ClientController@update')->name('update-client');
Route::get('admin/client', 'ClientController@show')->name('show-client');
Route::get('admin/client/delete/{id}', 'ClientController@destroy')->name('delete-client');

// Client Routes
Route::get('admin/slide/create', 'SlideController@showAddForm')->name('add-slide');
Route::post('admin/slide/create', 'SlideController@create')->name('add-post-slide');
Route::get('admin/slide/edit/{id}', 'SlideController@edit')->name('edit-slide');
Route::post('admin/slide/edit/{id}', 'SlideController@update')->name('update-slide');
Route::get('admin/slide', 'SlideController@show')->name('show-slide');
Route::get('admin/slide/delete/{id}', 'SlideController@destroy')->name('delete-slide');

// Static Routes
Route::get('admin/staticpage/about-aec', 'StaticPageController@editAboutAEC')->name('edit-about-aec');
Route::post('admin/staticpage/about-aec', 'StaticPageController@updateAboutAEC')->name('update-about-aec');

Route::get('admin/staticpage/accessbility-statement', 'StaticPageController@editAccessbilityStatement')->name('edit-accessbility-statement');
Route::post('admin/staticpage/accessbility-statement', 'StaticPageController@updateAccessbilityStatement')->name('update-accessbility-statement');

Route::get('admin/staticpage/company-profile', 'StaticPageController@editCompanyProfile')->name('edit-company-profile');
Route::post('admin/staticpage/company-profile', 'StaticPageController@updateCompanyProfile')->name('update-company-profile');

Route::get('admin/staticpage/company-capability', 'StaticPageController@editCompanyCapability')->name('edit-company-capability');
Route::post('admin/staticpage/company-capability', 'StaticPageController@updateCompanyCapability')->name('update-company-capability');

Route::get('admin/staticpage/cookie-policy', 'StaticPageController@editCookiePolicy')->name('edit-cookie-policy');
Route::post('admin/staticpage/cookie-policy', 'StaticPageController@updateCookiePolicy')->name('update-cookie-policy');

Route::get('admin/staticpage/corporate-approach', 'StaticPageController@editCorporateApproach')->name('edit-corporate-approach');
Route::post('admin/staticpage/corporate-approach', 'StaticPageController@updateCorporateApproach')->name('update-corporate-approach');

Route::get('admin/staticpage/meet-our-team', 'StaticPageController@editMeetOurTeam')->name('edit-meet-our-team');
Route::post('admin/staticpage/meet-our-team', 'StaticPageController@updateMeetOurTeam')->name('update-meet-our-team');

Route::get('admin/staticpage/our-values', 'StaticPageController@editOurValues')->name('edit-our-values');
Route::post('admin/staticpage/our-values', 'StaticPageController@updateOurValues')->name('update-our-values');

Route::get('admin/staticpage/privacy-policy', 'StaticPageController@editPrivacyPolicy')->name('edit-privacy-policy');
Route::post('admin/staticpage/privacy-policy', 'StaticPageController@updatePrivacyPolicy')->name('update-privacy-policy');

Route::get('admin/staticpage/sitemap', 'StaticPageController@editSiteMap')->name('edit-sitemap');
Route::post('admin/staticpage/sitemap', 'StaticPageController@updateSiteMap')->name('update-sitemap');

Route::get('admin/staticpage/terms-condition', 'StaticPageController@editTermsCondition')->name('edit-terms-condition');
Route::post('admin/staticpage/terms-condition', 'StaticPageController@updateTermsCondition')->name('update-terms-condition');

Route::get('admin/staticpage/word-from-director', 'StaticPageController@editWordFromDirector')->name('edit-word-from-director');
Route::post('admin/staticpage/word-from-director', 'StaticPageController@updateWordFromDirector')->name('update-word-from-director');
Route::post('admin/staticpage/upload/desc-image', 'StaticPageController@uploadDescImage')->name('upload-static-desc-image');
Route::post('admin/staticpage/upload/company-capability', 'StaticPageController@uploadComoanyCapability')->name('upload-company-capability');

// Manage Requested contacts
Route::get('admin/contacts', 'ContactController@show')->name('show-contact');
Route::post('admin/contact/delete/{id}', 'ContactController@destroy')->name('delete-contact');
// translations
Route::get('admin/translations', 'TranslatorController@show')->name('show-translation');
Route::post('admin/translations', 'TranslatorController@update')->name('update-translation');
/**
/**
*End Backend Routs
*/
