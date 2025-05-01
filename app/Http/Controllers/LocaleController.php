<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LocaleController extends Controller
{
    public function swap($locale)
    {
        Session::put('locale', $locale);
        return redirect()->back();
        // $supportedLocales = ['en', 'id'];
        // if (in_array($locale, $supportedLocales)) {
        //     App::setLocale($locale);
        //     Session::put('locale', $locale);
        // }

        // return Redirect::back();
    }
}
