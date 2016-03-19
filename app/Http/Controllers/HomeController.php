<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index(Request $request) {
        return view('home');
    }

    public function about(Request $request) {
        return view('about');
    }

    public function contact(Request $request) {
        return view('contact');
    }
}
