<?php namespace Kironuniversity\Redirect;

use Backend;
use System\Classes\PluginBase;

/**
 * redirect Plugin Information File
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
            'name'        => 'redirect',
            'description' => 'No description provided yet...',
            'author'      => 'kironuniversity',
            'icon'        => 'icon-leaf'
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
            'Kironuniversity\Redirect\Components\MyComponent' => 'myComponent',
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
            'kironuniversity.redirect.some_permission' => [
                'tab' => 'redirect',
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
            'redirect' => [
                'label'       => 'redirect',
                'url'         => Backend::url('kironuniversity/redirect/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['kironuniversity.redirect.*'],
                'order'       => 500,
            ],
        ];
    }

}
