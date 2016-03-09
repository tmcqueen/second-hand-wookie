<?php

namespace App\Document;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Document extends Model
{
    protected $table = 'documents';

    public function __construct() {
        parent::__construct();
        $this->type = static::class;
    }

    public function findByCode($code) {
        $type = self::whereCode($code)->value('type');

        return (new $type)->whereCode($code)->first();
    }

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
