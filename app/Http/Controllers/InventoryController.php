<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Asset;
use App\Document\Document;
use Flysystem;

class InventoryController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => [
            'index','show'
        ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = Asset::paginate(10);

        return view('inventory.index', ['inventory' => $inventory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asset = Asset::create([
            'name' => $request->name,
            'make' => $request->make,
            'model' => $request->model,
            'cost' => $request->cost,
            'donation_id' => 0,
            'in_inventory' => !! $request->in_inventory == 'on'
        ]);
        return view('inventory.show', ['asset' => $asset]);
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $asset)
    {
        //dd($asset->getAttributes());
        return view('inventory.show', ['asset' => Asset::find($asset)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($asset)
    {
        return view('inventory.edit', ['asset' => Asset::find($asset)]);
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
        $asset = Asset::find($id);

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $stream = fopen($file->getRealPath(), 'r+');
            $path = 'uploads/' . $file->getClientOriginalName();
            Flysystem::writeStream($path , $stream);
            fclose($stream);
            $document = Document::createDocumentByMimeType(
                $file->getClientMimeType(),
                ['path' => $path]);
            $asset->documents()->attach($document);
        }

        $asset->update($request->input());

        return back();
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
