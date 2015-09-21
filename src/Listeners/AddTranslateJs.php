<?php namespace Hyn\GoogleTranslate\Listeners;

use Flarum\Events\RegisterLocales;
use Flarum\Events\BuildClientView;
use Illuminate\Contracts\Events\Dispatcher;
use Flarum\Core\Settings\SettingsRepository;
use Flarum\Forum\Actions\ClientAction as ForumClientAction;

class AddTranslateJs
{
    /**
     * @var SettingsRepository
     */
    protected $settings;


    public function __construct(SettingsRepository $settings) {
        $this->settings = $settings;
    }

    public function subscribe(Dispatcher $events)
    {
//        $events->listen(RegisterLocales::class, [$this, 'addLocale']);
        $events->listen(BuildClientView::class, [$this, 'addAssets']);
    }

    public function addAssets(BuildClientView $event)
    {
        if($event->action instanceof ForumClientAction) {
            if($this->settings->get('default_locale')) {
                $rawJs = file_get_contents(realpath(__DIR__ . '/../../assets/js/google-translate.js'));
                $js    = str_replace("%%DEFAULT_LOCAL%%", $this->settings->get('default_locale'), $rawJs);
                $event->view->getAssets()->addJs(function() use ($js) { return $js; });
            }
        }
    }
}
