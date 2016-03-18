<?php

namespace App;

use LaravelArdent\Ardent\Ardent;
use Faker\Factory as Faker;
use Auth;
use App\User;
use App\Document\Document;
use App\Document\Image;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Asset extends Ardent implements HasMediaConversions
{
    use HasMediaTrait;

    use SoftDeletes;

    protected $fillable = [
        'name', 'make', 'model', 'cost', 'description', 'user_id', 'donation_id', 'in_inventory'
    ];

    public static $rules = [
      'name'        => 'required|between:3,80',
    ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $faker = Faker::create();
        $letters = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $this->tag = implode($faker->randomElements($letters, 6));
        //$this->user_id = Auth::user()->id;
    }

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
             ->setManipulations([
                 'w'  => 140,
                 'h'  => 140,
                 'fm' => 'png'])
             ->performOnCollections('images', 'documents')
             ->nonQueued();
    }

    public function getRouteKeyName() {
        return 'tag';
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function donation() {
        return $this->belongsTo(Donation::class);
    }

    public function getAttriutes() {
        return $this->attributes;
    }

    public function documents() {
        return $this->morphToMany(Document::class, 'documentable');
    }

    public function defaultImage() {
        return $this->belongsTo(Image::class, 'default_image_id');
    }
}
