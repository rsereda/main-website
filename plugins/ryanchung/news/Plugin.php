<?php namespace RyanChung\News;

use System\Classes\PluginBase;
use Backend;
/**
 * Curriculum Plugin Information File
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
            'name'        => 'News',
            'description' => 'Plugin for news management',
            'author'      => 'Ryan Chung',
            'icon'        => 'icon-newspaper-o'
        ];
    }

    public function registerComponents()
    {
        return [
            'RyanChung\News\Components\Newslist' => 'Newslist',
            'RyanChung\News\Components\Start' => 'StartNewsList'
        ];
    }


    public function registerPermissions()
    {
        return [
            'ryanchung.news.edit_news'       => ['label' => 'Edit News']
        ];
    }


    public function registerNavigation()
{
    return [

        'News' => [
            'label'       => 'News',
            'url'         => Backend::url('ryanchung/news/articles'),
            'icon'        => 'icon-newspaper-o',
            'permissions' => ['ryanchung.news.*'],
            'order'       => 600,

            'sideMenu' => [
                'articles' => [
                    'label'       => 'Articles',
                    'icon'        => 'icon-newspaper-o',
                    'url'         => Backend::url('ryanchung/news/articles'),
                    'permissions' => ['ryanchung.news.*']
                ]
            ]
        ]
    ];
}

}
