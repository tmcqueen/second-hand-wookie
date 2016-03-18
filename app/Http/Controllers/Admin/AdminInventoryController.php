<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Asset;
use App\Document\Document;

use Auth;

class AdminInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = Asset::withTrashed()->paginate();

        return view('admin.inventory.index', ['assets' => $assets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $asset)
    {
        $asset = Asset::whereTag($asset)->withTrashed()->first();

        if ($request->has('action')) {
            return $this->handleAction($asset, $request->action);
        }
        return view('admin.inventory.show', ['asset' => $asset]);
    }

    public function handleAction(Asset $asset, $action) {
        switch ($action) {
            case 'disable':
                $asset->in_inventory = false;
                $asset->save();
                break;
            case 'enable':
                $asset->in_inventory = true;
                $asset->save();
                break;
            case 'delete':
                $asset->in_inventory = false;
                $asset->save();
                $asset->delete();
                break;
            case 'undelete':
                $asset->restore();
                break;
            case 'force-delete':
                $asset->forceDelete();
                break;
        }
        return back();
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
    public function update(Request $request, Asset $asset)
    {
        $this->attachFiles($request, $asset);

        return back();

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
