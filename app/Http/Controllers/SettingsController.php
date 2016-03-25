<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Spatie\Menu\Laravel\Link;
use Menu;

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

        $menu = $this->makeMenu($section);

        return view('settings.index', [
            'user' => $request->user(),
            'section' => $section,
            'menu' => $menu,
        ]);
    }

    public function update(Request $request)
    {
        $this->updateProfilePhoto($request);

        $input = $request->only(['name', 'username', 'email']);
        $request->user()->update($input);

        if ($request->wantsJson()) {
            return response()->json(['success']);
        }
        return redirect()->route('me');
    }

    public function updateProfilePhoto(Request $request) {
        if ($request->hasFile('file') && $request->imageType == 'profile photo') {
            $file = $request->user()->attachFile($request->file);
            $request->user()->avatar_id = $file->id;
            $request->user()->save();
        }
    }

    private function makeMenu($active_section) {
        return Menu::new()
            ->addClass('nav')
            ->addClass('navbar-nav')
            ->prefixLinks('/me/settings')
            ->link('basic','Basic')
            ->link('password', 'Password')
            ->link('avatar', 'Profile Photo')
            ->setActive(route('me.settings', ['section' => $active_section]));
            // ->setActive(function (Link $link, $active_section) {
            //     return true; ///$link->segment(1) === $active_section;
            // });
    }
}
