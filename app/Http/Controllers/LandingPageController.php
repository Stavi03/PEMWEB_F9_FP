<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{

    public function homepage() {
        return view('landing-page.landing',[
            "title" => "home"
        ]
        );
    }

    public function sampahor() {
        return view('landing-page.sampahor',[
            "title" => "LimbahKu"
        ]
        );
    }
    public function sampahpl() {
        return view('landing-page.sampahpl',[
            "title" => "LimbahKu"
        ]
        );
    }
    public function sampahkc() {
        return view('landing-page.sampahkc',[
            "title" => "LimbahKu"
        ]
        );
    }
}
