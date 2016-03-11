<?php

namespace App\Document;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Faker\Factory as Faker;
use Auth;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable = ['user_id', 'mime', 'path', 'code'];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->type = static::class;
        $faker = Faker::create();
        $this->code = static::generateCode();
    }

    public static function generateCode($length = 6) {
        $letters = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
        $faker = Faker::create();
        return implode($faker->randomElements($letters, $length));
    }

    public function findByCode($code) {
        $type = self::whereCode($code)->value('type');

        return (new $type)->whereCode($code)->first();
    }

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function createDocumentByMimeType($mime, $attributes) {
        $model = config('documents.mimes')[$mime];
        $attributes = array_merge($attributes, [
           'mime' => $mime,
           'user_id' => Auth::user()->id,
        ]);
        return (new $model)->create($attributes);
    }
}
