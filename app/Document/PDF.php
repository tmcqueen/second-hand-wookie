<?php

namespace App\Document;

use Illuminate\Database\Eloquent\Model;
use Flysystem;

class PDF extends Document
{
    public function makeResponse() {

        // $file = Flysystem::get('uploads/' . $this->path);
        // dd($file);

        $root = config('filesystems.disks.local.root');
        return response()->file($root . '/uploads/' . $this->path);
    }

    public function getThumbnailURL() {
        return "/img/pdf.png";
    }
}
