<?php

return [

    'mimes' => [

        'image/jpg' => App\Document\Image::class,
        'image/jpeg' => App\Document\Image::class,
        'image/png' => App\Document\Image::class,
        'image/gif' => App\Document\Image::class,
        'image/bmp' => App\Document\Image::class,
        'image/tiff' => App\Document\Image::class,
        'image/dd' => App\Document\Image::class,
        'application/pdf' => App\Document\PDF::class,
        'application/x-pdf' => App\Document\PDF::class,

    ]



];