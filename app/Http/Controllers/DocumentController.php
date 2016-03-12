<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document\Document;
use App\Http\Requests;

class DocumentController extends Controller
{
    public function show(Request $request, $code) {
        //dd();
        $document = Document::findByCode($code);
        return $document->makeResponse();
    }
}
