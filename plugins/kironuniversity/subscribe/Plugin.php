<?php namespace Kironuniversity\Subscribe;

use Backend;
use System\Classes\PluginBase;
use Symfony\Component\Console\Output\ConsoleOutput;
/**
* subscribe Plugin Information File
*/
class Plugin extends PluginBase
{

  /**
  * Returns information about this plugin.
  *
  * @return array
  */
  public function pluginDetails()
  {
    return [
      'name'        => 'Subscribe',
      'description' => 'Plugin to manage SnedGrid Newsletter Subscribers',
      'author'      => 'kironuniversity',
      'icon'        => 'icon-mail'
    ];
  }

  public function register()
  {
    set_exception_handler([$this, 'handleException']);
    $this->registerConsoleCommand('kironuniversity.upsg', 'Kironuniversity\Subscribe\Console\UpdateSendGrid');
  }

  public function handleException($e)
  {
    if (! $e instanceof Exception) {
      $e = new \Symfony\Component\Debug\Exception\FatalThrowableError($e);
    }

    $handler = $this->app->make('Illuminate\Contracts\Debug\ExceptionHandler');
    $handler->report($e);

    if ($this->app->runningInConsole()) {
      $handler->renderForConsole(new ConsoleOutput, $e);
    } else {
      $handler->render($this->app['request'], $e)->send();
    }
  }

  /**
  * Registers any front-end components implemented in this plugin.
  *
  * @return array
  */
  public function registerComponents()
  {

    return [
      'Kironuniversity\Subscribe\Components\SubscribeForm' => 'SubscribeForm',
    ];
  }

  /**
  * Registers any back-end permissions used by this plugin.
  *
  * @return array
  */
  public function registerPermissions()
  {
    return []; // Remove this line to activate

    return [
      'kironuniversity.subscribe.some_permission' => [
        'tab' => 'subscribe',
        'label' => 'Some permission'
      ],
    ];
  }


  /**
  * Registers back-end navigation items for this plugin.
  *
  * @return array
  */
  public function registerNavigation()
  {
    return []; // Remove this line to activate

    return [
      'subscribe' => [
        'label'       => 'subscribe',
        'url'         => Backend::url('kironuniversity/subscribe/mycontroller'),
        'icon'        => 'icon-leaf',
        'permissions' => ['kironuniversity.subscribe.*'],
        'order'       => 500,
      ],
    ];
  }

  public function registerMailTemplates()
  {
    return [
      'kironuniversity.subscribe::mail.confirm' => 'Activation mail sent to subscribers.',
    ];
  }

}
