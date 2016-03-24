<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SettingsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        return view('profile.index', ['user' => $request->user()]);
    }

    public function show(Request $request, $section = 'basic')
    {
        //dd($request->user());
        return view('settings.index', ['user' => $request->user(), 'section' => $section]);
    }

    public function update(Request $request)
    {
        if ($this->updateProfilePhoto($request)) return back();

        $input = $request->only(['name', 'username', 'email']);
        $request->user()->update($input);

        return redirect()->route('me');
    }

    public function updateProfilePhoto(Request $request) {
        if ($request->hasFile('file') && $request->imageType == 'profile photo') {

            // save image
            $file = $request->user()->attachFile($request->file);
            dd($file);
            // set image as default profile photo

            return true;
        }
        return false;
    }
}
