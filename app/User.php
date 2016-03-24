<?php

namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Http\UploadedFile;
use LaravelArdent\Ardent\Ardent;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use App\Jobs\SaveUserHistory;
use Auth;

class User extends Ardent implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    HasMediaConversions
{
    use Authenticatable, Authorizable, CanResetPassword,
        HasRoles, HasMediaTrait;

    protected $fillable = [
        'name', 'email', 'password', 'username',
        'address1', 'address2', 'city', 'state', 'zip',
    ];

    public static $rules = [
      'name'        => 'required|between:3,80',
      'email'       => 'required|email|unique:users',
      'username'    => 'required|between:3,15|alpha_dot|unique:users',
      'password'    => 'required|min:6',
    ];

    public static $relationsData = [
      'avatar' => [self::BELONGS_TO, Media::class, 'avatar_id'],
    ];

    public static $passwordAttributes = ['password'];
    public $autoHashPasswordAttributes = true;

    protected $hidden = [
        'password', 'remember_token',
    ];

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

    public function attachFile(UploadedFile $file) {
        $mime = $file->getClientMimeType();
        return $this->addMedia($file)
            ->withCustomProperties(['mime-type' => $mime])
            ->toCollection('avatars');
    }

    public function getRouteKeyName() {
        return 'username';
    }

    private function queueHistoryMessage($message) {
        if (! Auth::user()) return; // ToDo: Make this better
        $description = sprintf($message, $this->name);
        dispatch(new SaveUserHistory(Auth::user(), $description));
    }

    public function afterSave() {
        $this->queueHistoryMessage("%s's profile was saved");
    }

    public function afterCreate() {
        $this->queueHistoryMessage("%s's profile was created");
    }

    public function afterUpdate() {
        $this->queueHistoryMessage("%s's profile was updated");
    }

    public function afterDelete() {
        $this->queueHistoryMessage("%s's profile was deleted");
    }
}
