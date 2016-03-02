<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index(Request $request) {
        return view('home')
            ->with('uri', $request->route()->uri());
    }

    public function about(Request $request) {
        //dd($request->route()->uri());
        return view('about')
            ->with('uri', $request->route()->uri());
    }

    public function contact(Request $request) {
        return view('contact')
            ->with('uri', $request->route()->uri());
    }

    public function events(Request $request) {
        return view('events')
            ->with('uri', $request->route()->uri());
    }
}
