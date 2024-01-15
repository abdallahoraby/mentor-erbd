<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInquiryRequest;
use App\Models\CustomField;
use App\Models\Inquiry;
use App\Models\Site;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
        $site = Site::where('url',url()->current())->first();
        $custom_fields = CustomField::where('site_id',$site->id)->get();
		return view('themes.theme'.$site->theme_id.'.home',compact('site','custom_fields'));
	}

    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            App::setLocale($lang);
            session()->has('lang') ? session()->forget('lang') : '';
            session()->put('lang', $lang);

            if ($lang == 'ar')
                $dir = 'rtl';
            else
                $dir = 'ltr';
            session()->has('dir') ? session()->forget('dir') : '';
            session()->put('dir', $dir);

            \app()->setLocale($lang);
        }
        return Redirect::back();
    }

    public function send_inquiry(CreateInquiryRequest $request)
    {
        $site = Site::where('url',$request->current_url)->first();
        $custom_fields = CustomField::where('site_id',$site->id)->get();

        $input = $request->all();

        $input['ip_address'] = $request->ip();
        $input['url'] = $request->current_url;
        $input['site_id'] = $site->id;

        $saved_data = [];
        foreach ($custom_fields as $field) {
            $saved_data[$field->name] = $input[$field->name] ?? '';
        }
        $input['saved_data'] = json_encode($saved_data);

        $inquiry = Inquiry::create($input);

        return redirect('/sent');
    }

    public function sent() {
        return view('themes.theme2.sent');
    }


}
