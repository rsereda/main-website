<?php namespace Kironuniversity\Git;

use Backend;
use System\Classes\PluginBase;

/**
* Git Plugin Information File
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
      'name'        => 'Git Deploy',
      'description' => 'Used to d eploy the code to the live page',
      'author'      => 'Kironuniversity',
      'icon'        => 'icon-git'
    ];
  }

  /**
  * Register method, called when the plugin is first registered.
  *
  * @return void
  */
  public function register()
  {

  }

  /**
  * Boot method, called right before the request route.
  *
  * @return array
  */
  public function boot()
  {

  }

  /**
  * Registers any front-end components implemented in this plugin.
  *
  * @return array
  */
  public function registerComponents()
  {
    return []; // Remove this line to activate

    return [
      'Kironuniversity\Git\Components\MyComponent' => 'myComponent',
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
      'kironuniversity.git.some_permission' => [
        'tab' => 'Git',
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
    return [
      'git' => [
        'label'       => 'Deploy',
        'url'         => Backend::url('kironuniversity/git/deploy'),
        'icon'        => 'icon-upload',
        'permissions' => ['kironuniversity.git.*'],
        'order'       => 700,

        'sideMenu' => [
          'deploy' => [
            'label'       => 'Deploy',
            'url'         => Backend::url('kironuniversity/git/deploy'),
            'icon'        => 'icon-upload',
            'permissions' => ['kironuniversity.git.*'],
          ]
        ]
      ],


    ];
  }

}
