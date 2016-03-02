<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class PublicProfileController extends Controller
{
    public function index(Request $request, User $user) {

        return view('profile.index')->with('user', $user);
    }
}