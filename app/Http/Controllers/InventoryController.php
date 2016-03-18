<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Asset;
use App\Document\Document;
use Flysystem;
use Alert;

use App\Events\ImageWasDeleted;

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
    public function show(Request $request, Asset $asset)
    {
        return view('inventory.show', ['asset' => $asset]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Asset $asset)
    {
        return view('inventory.edit', ['asset' => $asset]);
    }

    private function removeDocuments($request, $asset) {
        if ($request->has('documents')) {
            $input = $request->all();
            array_walk($input, function(&$item, $key, $asset) {
                if (strstr($key, 'remove-document')) {
                    $document = Document::findByCode($item);
                    $asset->documents()->detach($document);
                    event(new ImageWasDeleted($document));
                    $document->delete();
                }
            }, $asset);
        }
    }

    private function setDefaultImage($request, $asset) {
        if($request->has('default-image')) {
            $image = Document::findByCode($request->input('default-image'));
            $asset->defaultImage()->associate($image);
        }
    }

    private function attachFiles($request, $asset) {

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $mime = $file->getClientMimeType();
            if (!! strstr($mime, 'image')) {
                $asset->addMedia($file)->toCollection('images');
            }
            else {
                $asset->addMedia($file)
                      ->withCustomProperties(['mime-type' => $mime])
                      ->toCollection('documents');
            }
        }
    }

    public function update(Request $request, Asset $asset)
    {
        $this->removeDocuments($request, $asset);

        $this->setDefaultImage($request, $asset);

        $this->attachFiles($request, $asset);

        $asset->update($request->input());

        Alert::success('Changes saved.')
            ->persistent('OK');

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
