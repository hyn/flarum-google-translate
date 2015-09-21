<?php namespace Hyn\GoogleTranslate\Listeners;

use Illuminate\Events\Dispatcher;
use Flarum\Events\BuildClientView;
use Flarum\Forum\Actions\ClientAction as ForumClientAction;

class Extension extends \Flarum\Support\Extension {
    public function listen(Dispatcher $events) {
        $events->subscribe(Listeners\AddTranslateJs::class);
    }
}