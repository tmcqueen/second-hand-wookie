<?php

namespace App;

use Spatie\MediaLibrary\PathGenerator\PathGenerator;
use Spatie\MediaLibrary\Media;

class HashPathGenerator implements PathGenerator {

    public function getPath(Media $media) {
        if (!! $media->short_url) {
            return $media->short_url . '/';
        }

        else {
            $shortUrl = bin2hex(random_bytes(3));
            $media->short_url = $shortUrl;
            $media->save();
            return $shortUrl . '/';
        }
    }

    public function getPathForConversions(Media $media) {
        return $media->short_url . '/c/';
    }


}