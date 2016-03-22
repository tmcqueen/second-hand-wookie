<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

Use Carbon\Carbon;

use App\Event;

use Auth;

class EventsController extends Controller
{

    public function __construct() {

        $this->middleware('auth', ['except' => ['index', 'show']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {

            $events = Event::where('start', '>', $request->start)
                ->where('end', '<=', $request->end)
                ->get();


            return response()->json($events);
        }

        return view('events.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today = Carbon::today();

        return view('events.create', [
            'start' => $today->format('m/d/Y g:i A'),
            'end' => $today->addDay()->format('m/d/Y g:i A'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->input();
        // dd($input);
        $start_orig = Carbon::parse($input['start']);
        $start = $start_orig;
        $end = '';

        if ($request->allday) {
            // Seconds since midnight
            $s = $start_orig->secondsSinceMidnight();
            $start = $start_orig->subSeconds($s)->toAtomString();
            $end = $start_orig->addSeconds(86399)->toAtomString();
        }
        else {
            $end = Carbon::parse($input['end'])->toAtomString();
        }
        $input['start'] = $start;
        $input['end'] = $end;

        $input['organizer'] = Auth::user()->id;

        Event::create($input);

        return view('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.show', ['event' => $event]);
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
