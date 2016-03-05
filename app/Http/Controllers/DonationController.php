<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Asset;
use App\Donation;

class DonationController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
                    'index'
                ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request);

        if (Auth::check()) {
            return view('donation.test');
        }
        return redirect()->route('donation.create');
        return view('donation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $donation = Donation::create(['user_id' => 1]);

        foreach ($request->items as $index => $item) {
            $test[] = ['name' => 'placeholder', 'description' => $item, 'cost' => $request->costs[$index]];
            Asset::create([
                'name' => 'placeholder',
                'description' => $item,
                'cost' => $request->costs[$index],
                'user_id' => 1,
                'donation_id' => $donation->id,
            ]);
        }



        dd($test);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
