<?php

namespace App\Document;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Faker\Factory as Faker;
use Auth;
use Flysystem;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable = ['user_id', 'mime', 'path', 'code'];
    protected $faker;

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->type = static::class;
        $this->faker = Faker::create();
        $this->code = static::generateCode();
    }

    public static function generateCode($length = 6) {
        $faker = Faker::create();
        $letters = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
        return implode($faker->randomElements($letters, $length));
    }

    public static function findByCode($code) {
        $type = self::whereCode($code)->value('type');

        return (new $type)->whereCode($code)->first();
    }

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public  static function generateRandomPath($filename) {
        $faker = Faker::create();
        $dir1 = $faker->randomLetter();
        $dir2 = $faker->randomLetter();
        // $dir1 = Document::generateCode(2);
        // $dir2 = Document::generateCode(2);

        return "$dir1/$dir2/$filename";
    }

    public static function createDocument($file) {
        $stream = fopen($file->getRealPath(), 'r+');
        $path = Document::generateRandomPath($file->getClientOriginalName());
        Flysystem::writeStream('uploads/' . $path , $stream);
        fclose($stream);

        $mime = $file->getClientMimeType();

        $attributes = [
            'path' => $path,
            'mime' => $mime,
            'user_id' => Auth::user()->id,
        ];

        $model = config('documents.mimes')[$mime];

        return (new $model)->create($attributes);
        // $document = Document::createDocumentByMimeType(
        //     $file->getClientMimeType(),
        //     ['path' => $path]);
    }

    // public static function createDocumentByMimeType($mime, $attributes) {
    //     $model = config('documents.mimes')[$mime];
    //     $attributes = array_merge($attributes, [
    //        'mime' => $mime,
    //        'user_id' => Auth::user()->id,
    //     ]);
    //     return (new $model)->create($attributes);
    // }

    public function getRouteKeyName() {
        return 'code';
    }

    public function makeResponse() {}

    public function getThumbnailURL() {
        return "/img/document.png";
    }

    public function getDocument() {

        //return settype($this, $this->type);
        //return $this->type::cast($this);
        return Document::findByCode($this->code);
    }

    public function removeDocment() {

    }
}
