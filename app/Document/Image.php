<?php

namespace App\Document;

use Illuminate\Database\Eloquent\Model;
use InImage;
use Storage;
use Flysystem;
use League\Glide\ServerFactory;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use League\Glide\Responses\LaravelResponseFactory;

class Image extends Document
{
    protected $server;
    protected $uploads;
    protected $cache;

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);

        $this->uploads = new Local('../storage/files/uploads');
        $this->cache = new Local('../storage/files/cache');

        $this->server = ServerFactory::create([
            'source' => new FileSystem($this->uploads),
            'cache'  => new FileSystem($this->cache),
            'response' => new LaravelResponseFactory(),
        ]);
    }

    public function makeResponse() {
        //dd(new Local('../storage/files/uploads'));
        // $image = InImage::make(Flysystem::read($this->path));
        // return $image->response();
        return $this->server->getImageResponse($this->path, $_GET);
    }

    public function getUrl() {
        return "/d/$this->code";
    }

    public function getThumbnailURL($width=140, $height=140) {
        return $this->getUrl() . "?w=$width&h=$height";
    }

    public function removeDocument() {
        $this->uploads->delete($this->path);
        $this->cache->deleteDir($this->path);
    }

}
