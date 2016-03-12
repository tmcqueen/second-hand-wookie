<?php

namespace App\Listeners;

use Storage;

use App\Events\ImageWasDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemoveDocumentFromDirectory
{
    public function __construct()
    {
        //
    }
    public function removeImage(ImageWasDeleted $event)
    {
        $event->image->removeDocument();
        //Storage::disk('local')->put('test.log', var_dump($event));
    }

    public function subscribe($events) {

        $events->listen(
            ImageWasDeleted::class,
            'App\Listeners\RemoveDocumentFromDirectory@removeImage'
        );
    }
}
