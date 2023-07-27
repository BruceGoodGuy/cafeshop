<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {
        $title = 'Trang chủ';
        return view('front.home', ['title' => $title]);
    }

    public function about() {
        $title = 'Về chúng tôi';
        return view('front.about', ['title' => $title]);
    }

    public function contact() {
        $title = 'Liên hệ với chúng tôi';
        return view('front.contact', ['title' => $title]);
    }
}
